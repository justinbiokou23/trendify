import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  server: {
    host: '127.0.0.1',
    port: 5176,        // point de départ
    strictPort: false, // <-- important: si 5176 est pris, Vite choisit 5177, 5178, ...
    hmr: {
      host: '127.0.0.1',
      protocol: 'ws',
      // pas besoin de fixer le port HMR si strictPort=false
    },
  },
})
