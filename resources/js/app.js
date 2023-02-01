import './bootstrap';
import router from "./router";
import store from "./store";
import {createApp} from 'vue';

import App from "./App.vue";


const app = createApp({});

app.component('App', App);
app.use(router);
app.use(store);
app.mount('#app');
