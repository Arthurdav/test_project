import Vue from 'vue'

//Main pages
import App from './views/app.vue'
import ElementUI from 'element-ui';

import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en'
Vue.use(ElementUI,{locale})
const app = new Vue({
    el: '#app',
    components: { App }
});