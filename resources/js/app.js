import { createApp } from 'vue';
import App from './App.vue';
import router from './routes.js';
import store from './store'; // Import Vuex store

const app = createApp(App);

app.use(router);
app.use(store); // Sử dụng Vuex store
app.mount("#app");
