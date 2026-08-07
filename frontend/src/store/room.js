import { defineStore } from 'pinia'
import api from "@/api.js"

export const useRoomStore = defineStore('room', {
    state: () => ({
        rooms: []
    }),

    getters: {
        hasRooms: (state) => state.rooms.length > 0
    },

    actions: {
        async getRooms() {
            try {
                const { data } = await api.get('/rooms')
                this.rooms = data.rooms
            }
            catch(error) {
                alert(error.message)
            }
        }
    },
})