<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{ vite_asset('resources/js/app.js', true) }}">
</head>

<body>
  <div id="container">
    <video id="localVideo" playsinline autoplay muted></video>
    <video id="remoteVideo" playsinline autoplay></video>

    <div class="box">
      <button id="startButton">Start</button>
      <button id="hangupButton">Hang Up</button>
    </div>
  </div>

  <script type="module" src="{{ vite_asset('resources/js/app.js') }}"></script>
</body>

</html>
