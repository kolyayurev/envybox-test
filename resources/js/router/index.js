import { createWebHistory, createRouter } from 'vue-router'
const Layout = () => import('@/components/layouts/Main.vue')

const routes = [
    {
        path: "/",
        component: Layout,
        children: [
            {
                name: "dashboard",
                path: '/',
                component: import('@/components/pages/Dashboard.vue'),
                meta: {
                    title: `Dashboard`
                }
            },
            {
                name: "list",
                path: '/list',
                component: import('@/components/pages/List.vue'),
                meta: {
                    title: `List`
                }
            }
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})

export default router
