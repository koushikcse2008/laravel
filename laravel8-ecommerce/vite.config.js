import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'public/vite/css/app.css',
            'public/vite/js/app.js',
        ]),
    ],
});
