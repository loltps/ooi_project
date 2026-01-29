import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/scss/index.scss',
        'resources/scss/home.scss',
        'resources/scss/about_us.scss',
        'resources/scss/contact.scss',
      ],
      buildDirectory: 'build',
      refresh: true,
    }),
  ],
  build: {
    manifest: 'manifest.json',
    outDir: resolve(__dirname, 'public/build'),
    emptyOutDir: true,
    rollupOptions: {
      output: {
        assetFileNames: 'assets/[name].[hash][extname]',
        chunkFileNames: 'assets/[name].[hash].js',
        entryFileNames: 'assets/[name].[hash].js',
      },
    },
  },
});
