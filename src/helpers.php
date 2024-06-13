<?php

if (!function_exists('vite_asset')) {
  function vite_asset($path, $css = false)
  {
    $manifestPath = public_path('vendor/webrtc-sdk/manifest.json');
    if (!file_exists($manifestPath)) {
      throw new Exception('The Vite manifest file does not exist. Please run `npm run build`.');
    }
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (!isset($manifest[$path])) {
      throw new Exception("The asset '{$path}' does not exist in the Vite manifest.");
    }

    if ($css) return asset('vendor/webrtc-sdk/' . $manifest[$path]['css'][0]);
    return asset('vendor/webrtc-sdk/' . $manifest[$path]['file']);
  }
}
