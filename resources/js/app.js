/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from "vue";
import App from "./components/App.vue";
import Antd from 'ant-design-vue';
import 'ant-design-vue/lib/col/style/css';
import 'ant-design-vue/lib/row/style/css';
// import 'ant-design-vue/dist/antd.css';
import router from "./router";
import VueClipboard from 'vue-clipboard2'

Vue.use(VueClipboard)
Vue.use(Antd);

Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
