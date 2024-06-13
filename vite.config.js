import { defineConfig } from 'vite';
import { nodePolyfills } from 'vite-plugin-node-polyfills'
import dotenv from 'dotenv';

dotenv.config({ path: '../../../.env' });

export default defineConfig({
  plugins: [
    nodePolyfills(),
  ],
  define: {
    'process.env': {
      VITE_PUSHER_APP_KEY: process.env.VITE_PUSHER_APP_KEY,
      VITE_PUSHER_APP_CLUSTER: process.env.VITE_PUSHER_APP_CLUSTER,
    },
  },
  build: {
    manifest: true,
    sourcemap: true,
    outDir: 'dist',
    rollupOptions: {
      input: {
        app: 'resources/js/app.js'
      },
      output: {
        assetFileNames: 'assets/[name]-[hash][extname]',
        chunkFileNames: 'assets/[name]-[hash].js',
        entryFileNames: 'assets/[name]-[hash].js',
      }
    }
  }
});
