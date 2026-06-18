import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const appUrl = process.env.APP_URL || 'http://localhost:5173';
let origin = appUrl;
let hostname = 'localhost';
let hmrProtocol = 'ws';
let hmrPort = 5173;
try {
    const parsed = new URL(appUrl);
    origin = parsed.origin;
    hostname = parsed.hostname;
    hmrProtocol = parsed.protocol === 'https:' ? 'wss' : 'ws';
    hmrPort = parsed.protocol === 'https:' ? 443 : 5173;
} catch (e) {
    // keep defaults
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        origin: origin,
        hmr: {
            protocol: hmrProtocol,
            host: hostname,
            port: hmrPort,
        },
    },
});
