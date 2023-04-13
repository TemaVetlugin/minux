
import './bootstrap';
import { createApp } from 'vue';
import Auth from './components/Admin/Auth.vue'
import Index from './components/Index.vue'
import router from "./router.js"


createApp(Index).use(router).mount('#app') //подключение роутера опционально
createApp(Auth).use(router).mount('#auth') //подключение роутера опционально


