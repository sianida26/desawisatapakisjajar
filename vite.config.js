import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // config: false,
            input: [
                'resources/js/app.js',
                'resources/js/landingPage.ts',
                // 'resources/js/admin/index.tsx',
                'resources/css/app.css', 
                'resources/css/landingPage.css', 
                'resources/css/bootstrapIcons.css'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@' : 'resources/js/admin',
        }
    }
});
