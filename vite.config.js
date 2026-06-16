import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'super-umbrella-97wp9p6j5prpc7gwr-8081.app.github.dev',
            protocol: 'wss',
        },
    },
});
