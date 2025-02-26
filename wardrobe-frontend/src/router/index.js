import { createRouter, createWebHistory } from 'vue-router';
import Login from '@/components/Login.vue'; 
import ClothingList from '@/components/ClothingList.vue';

const routes = [
    {path: '/', component: Login },
    { path: '/clothing-list', component: ClothingList },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
