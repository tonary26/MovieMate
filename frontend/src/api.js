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

api.interceptors.request.use((config) => {
    const token = localStorage.getItem('token')
    if (token) {
        config.headers.Authorization = `Bearer ${token}`
    }
    return config
})

export default api