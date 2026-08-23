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
                console.log(data.rooms)
                this.rooms = data.rooms
            }
            catch(error) {
                alert(error.message)
            }
        },

        async addRoom(formData) {
            try {
                await api.post('/rooms', formData)
            }
            catch(error) {
                alert(error.message)
            }
        }
    },
})