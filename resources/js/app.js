import '../css/app.css';

const startButton = document.getElementById('startButton');
const hangupButton = document.getElementById('hangupButton');
hangupButton.disabled = true;

const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');

let peerConnection = null;
let localStream = null;

// Pusher configuration
import Pusher from 'pusher-js';
const PUSHER_APP_KEY = import.meta.env.VITE_PUSHER_APP_KEY;
const PUSHER_APP_CLUSTER = import.meta.env.VITE_PUSHER_APP_CLUSTER;
if (!PUSHER_APP_KEY || !PUSHER_APP_CLUSTER) {
  throw new Error('PUSHER_APP_KEY and PUSHER_APP_CLUSTER must be set');
}
const pusher = new Pusher(PUSHER_APP_KEY, {
  cluster: PUSHER_APP_CLUSTER,
  encrypted: true,
  forceTLS: true,
  authEndpoint: '/webrtc-sdk/auth'
});

const channel = pusher.subscribe('private-video-call');

channel.bind('client-webrtc', e => {
  if (!localStream) {
    console.log('not ready yet');
    return;
  }
  switch (e.type) {
    case 'offer':
      handleOffer(e);
      break;
    case 'answer':
      handleAnswer(e);
      break;
    case 'candidate':
      handleCandidate(e);
      break;
    case 'ready':
      if (peerConnection) {
        console.log('already in call, ignoring');
        return;
      }
      makeCall();
      break;
    case 'bye':
      if (peerConnection) {
        hangup();
      }
      break;
    default:
      console.log('unhandled', e);
      break;
  }
});

startButton.onclick = async () => {
  localStream = await navigator.mediaDevices.getUserMedia({audio: true, video: true});
  localVideo.srcObject = localStream;

  startButton.disabled = true;
  hangupButton.disabled = false;

  channel.trigger('client-webrtc', {type: 'ready'});
};

hangupButton.onclick = async () => {
  hangup();
  channel.trigger('client-webrtc', {type: 'bye'});
};

async function hangup() {
  if (peerConnection) {
    peerConnection.close();
    peerConnection = null;
  }
  localStream.getTracks().forEach(track => track.stop());
  localStream = null;
  startButton.disabled = false;
  hangupButton.disabled = true;
};

function createPeerConnection() {
  peerConnection = new RTCPeerConnection();
  peerConnection.onicecandidate = e => {
    const message = {
      type: 'candidate',
      candidate: null,
    };
    if (e.candidate) {
      message.candidate = e.candidate.candidate;
      message.sdpMid = e.candidate.sdpMid;
      message.sdpMLineIndex = e.candidate.sdpMLineIndex;
    }
    channel.trigger('client-webrtc', message);
  };
  peerConnection.ontrack = e => remoteVideo.srcObject = e.streams[0];
  localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));
}

async function makeCall() {
  await createPeerConnection();

  const offer = await peerConnection.createOffer();
  channel.trigger('client-webrtc', {type: 'offer', sdp: offer.sdp});
  await peerConnection.setLocalDescription(offer);
}

async function handleOffer(offer) {
  if (peerConnection) {
    console.error('existing peerconnection');
    return;
  }
  await createPeerConnection();
  await peerConnection.setRemoteDescription(new RTCSessionDescription(offer));

  const answer = await peerConnection.createAnswer();
  channel.trigger('client-webrtc', {type: 'answer', sdp: answer.sdp});
  await peerConnection.setLocalDescription(answer);
}

async function handleAnswer(answer) {
  if (!peerConnection) {
    console.error('no peerconnection');
    return;
  }
  await peerConnection.setRemoteDescription(new RTCSessionDescription(answer));
}

async function handleCandidate(candidate) {
  if (!peerConnection) {
    console.error('no peerconnection');
    return;
  }
  if (!candidate.candidate) {
    await peerConnection.addIceCandidate(null);
  } else {
    await peerConnection.addIceCandidate(new RTCIceCandidate(candidate));
  }
}
