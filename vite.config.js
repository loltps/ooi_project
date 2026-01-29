import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/css/app.css',             // keep if you actually have this
        // corrected paths below (use resources/scss)
        'resources/scss/index.scss',
        'resources/scss/home.scss',
        'resources/scss/about.scss',
        'resources/scss/contact.scss',
      ],
      buildDirectory: 'build',
      refresh: true,
    }),
  ],
  build: {
    outDir: resolve(__dirname, 'public/build'),
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      output: {
        assetFileNames: 'assets/[name].[hash][extname]',
        chunkFileNames: 'assets/[name].[hash].js',
        entryFileNames: 'assets/[name].[hash].js',
      },
    },
  },
});
