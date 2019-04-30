import VueRouter from 'vue-router';
import HomePageComponent from './pages/HomePageComponent';

const routes = [
    {
        path: '',
        component: HomePageComponent
    }
];

const router = new VueRouter({routes});

export default router;
