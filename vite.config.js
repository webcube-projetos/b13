import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/scss/app.scss',
                'resources/js/selectComponent.js',
                'resources/js/app.js',
                'resources/js/listagens.js',
                'resources/js/addLines.js',
                'resources/js/doublePage.js',
            ],
            refresh: true,
        }),
    ],
});
