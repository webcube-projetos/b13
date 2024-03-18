import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    config: {
        base: '/your-project-url/',
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/listagens.js',
                'resources/js/addLines.js',
            ],
            refresh: true,
        }),
    ],
});
