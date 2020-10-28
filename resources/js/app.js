require('./bootstrap');
import Vue from 'vue'
import ApiService from "./common/api.service";
import 'bootstrap/dist/css/bootstrap.css'
const moment = require('vue-moment');

Vue.use(moment);

ApiService.init();

/*
**  Components
*/
Vue.component(
    'customer-list',
    require('./components/CustomerList.vue').default
);
Vue.component(
    'customer-detail',
    require('./components/CustomerDetail.vue').default
);

const app = new Vue({
    el: '#app',
});
