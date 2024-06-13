# Veniseactivation WebRTC SDK

This package provides a WebRTC SDK for Veniseactivation. It allows you to integrate WebRTC functionality into your applications seamlessly.

## Installation

To install the Veniseactivation WebRTC SDK, follow these steps:

1. Install the package using Composer by running the following command:

    ```shell
    composer require veniseactivation/webrtc-sdk
    ```

2. Create a Pusher account and obtain the necessary credentials.

3. Add the Pusher credentials to your environment file (`env`), replacing the placeholders with your actual credentials:

    ```shell
    PUSHER_APP_ID="your_pusher_app_id"
    PUSHER_APP_KEY="your_pusher_app_key"
    PUSHER_APP_SECRET="your_pusher_app_secret"
    PUSHER_APP_CLUSTER="your_pusher_app_cluster"
    PUSHER_APP_ENCRYPTED="your_pusher_app_encrypted"
    VITE_PUSHER_APP_KEY="your_pusher_app_key"
    VITE_PUSHER_APP_CLUSTER="your_pusher_app_cluster"
    ```

4. Publish the package assets by running the following command:

    ```shell
    php artisan vendor:publish --provider="Veniseactivation\WebRTCSDK\WebRTCSDKServiceProvider" --tag=public --force
    ```

That's it! You have successfully installed the Veniseactivation WebRTC SDK, added the Pusher credentials to your environment file, and published the necessary assets.

For more information on how to use the SDK and integrate WebRTC functionality into your applications, please refer to the documentation provided with the package.

