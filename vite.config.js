import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';          // ← add this import

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                `resources/css/app.css`,
                'resources/css/index.scss',
                'resources/scss/home.scss',
                'resources/scss/about.scss',
                'resources/scss/contact.scss',
            ],
            buildDirectory: 'dist',
            refresh: true,
        }),
    ],

    // THIS IS THE ONLY THING THAT WAS MISSING
    build: {
        outDir: resolve(__dirname, 'public/dist'),   // forces output to public/dist
        emptyOutDir: true,
        manifest: true,       // Laravel needs this
        rollupOptions: {
            output: {
                // optional: nicer file names
                assetFileNames: 'assets/[name].[hash][extname]',
                chunkFileNames: 'assets/[name].[hash].js',
                entryFileNames: 'assets/[name].[hash].js',
            },
        },
    },
});