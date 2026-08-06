import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
  server: {
      host: '0.0.0.0',
      allowedHosts: true,
      proxy: {
          '/api': {
              target: process.env.VITE_API_PROXY_TARGET || 'http://localhost:8081',
              changeOrigin: true
          }
      }
  }
})
