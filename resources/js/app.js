import './bootstrap';
import router from "./router";
import {createApp} from 'vue';

import App from "./App.vue";


const app = createApp({});

app.component('App', App)
    .use(router)
    .mount('#app');
