import { createApp } from 'vue';
import App from './App.vue';
import router from './routes.js';
import store from './store'; // Import Vuex store
import { createVuetify } from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
});
const app = createApp(App);

app.use(vuetify);
app.use(router);
app.use(store); // Sử dụng Vuex store
app.mount("#app");
