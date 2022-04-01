import {createRouter, createWebHistory} from 'vue-router';
import Home from "./components/pages/Home";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'home',
            path: '/',
            component: Home,
        },
    ],
});

export default router;