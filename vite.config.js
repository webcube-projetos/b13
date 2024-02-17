import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/scss/app.scss',
                'soft-ui-dashboard.scss',
                'resources/js/app.js',
                'resources/views/**/*.blade.php'
            ],
            refresh: true,
        }),
    ],
});
