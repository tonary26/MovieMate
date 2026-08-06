import { defineStore } from 'pinia'
import api from "@/api.js"

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        token: localStorage.getItem('token') || null,
    }),

    getters: {
        isAuthenticated: (state) => !!state.token && !!state.user,
    },

    actions: {
        async authenticate(){
            const tg = window.Telegram?.WebApp

            if (!tg || !tg.initData) {
                return
            }

            tg.ready()
            tg.expand()

            try {
                const { data } = await api.post('/auth', { initData: tg.initData })

                this.user = data.user
                this.token = data.token

                localStorage.setItem('token', data.token)
                api.defaults.headers.common['Authorization'] = `Bearer ${data.token}`
            }
            catch(error) {
                alert(error.message)
            }
        }
    },
})