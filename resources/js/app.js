require('./bootstrap');
import { createApp } from 'vue';
import App from './components/App.vue';
import { createRouter, createWebHistory } from 'vue-router';
import { routes } from './routes';

import axios from 'axios';
import VueAxios from 'vue-axios';

const app = createApp(App);

app.use(VueAxios, axios);

const router = createRouter({
  history: createWebHistory(),
  routes: routes
});

app.use(router);

app.mount('#app');
