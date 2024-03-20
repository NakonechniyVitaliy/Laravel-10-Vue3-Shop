import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index.js'
import axios from "axios";
import store from './store/store.js'

const app = createApp(App).use(store);

app.use(router)

app.config.globalProperties.axios = axios
app.mount('#app')

