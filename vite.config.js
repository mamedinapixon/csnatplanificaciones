import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
                'app/Forms/Components/**',
                'app/Tables/Columns/**',
            ],
        }),
    ],
    build: {
        outDir: "public_html/build",
      },
});
