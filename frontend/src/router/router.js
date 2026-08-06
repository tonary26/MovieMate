import { createWebHistory } from "vue-router"
import { createRouter } from "vue-router"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('@/view/Dashboard.vue'),
            name: 'dashboard'
        },
        {
            path: '/user/profile',
            component: () => import('@/view/Profile.vue'),
            name: 'user.profile'
        }
    ]
})

export default router