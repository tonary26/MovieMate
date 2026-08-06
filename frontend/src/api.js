import axios from "axios"

const api = axios.create({
    baseURL: '/api/v1',
    headers: {
        'Accept': 'application/json',
        'Content-Type' : 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('token')}`
    },
    timeout: 5000
})

export default api