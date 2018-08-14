require('../bootstrap');

window.Vue= require('vue');

Vue.component('operadores-table', require('./table.vue'));

const app= new Vue({
  el: "#operadores-app"
})
