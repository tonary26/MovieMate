import { createWebHistory } from "vue-router"
import { createRouter } from "vue-router"

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('@/view/Dashboard.vue')
        }
    ]
})

export default router