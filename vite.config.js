import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    // Split out node_modules into separate chunks
                    if (id.includes('node_modules')) {
                        const moduleName = id.split('node_modules/')[1].split('/')[0];
                        if (moduleName === 'tinymce') {
                            return 'tinymce'; // Create a chunk specifically for TinyMCE
                        }
                        return moduleName;
                    }
                },
            },
        },
        chunkSizeWarningLimit: 600, // Adjust this value if necessary
    },
});
