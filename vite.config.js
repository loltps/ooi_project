import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
        'resources/css/app.css',
        'resources/css/index.scss',
        'resources/scss/home.scss',
        'resources/scss/about.scss',
        'resources/scss/contact.scss',
      ],
      buildDirectory: 'build', // ensures plugin helpers expect public/build
      refresh: true,
    }),
  ],
  build: {
    outDir: resolve(__dirname, 'public/build'), // <- write to public/build
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
