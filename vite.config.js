import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  plugins: [],
  build: {
    outDir: 'dist',
    rollupOptions: {
      input: {
        app: 'resources/js/app.js'
      }
    }
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js')
    }
  }
});
