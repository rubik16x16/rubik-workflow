require('../../bootstrap');

window.Vue= require('vue');

Vue.component('operadores-table', require('./table.vue'));
Vue.component('create-operadores', require('./create.vue'));
Vue.component('edit-operadores', require('./edit.vue'));

const app= new Vue({
  el: "#operadores-app"
})
