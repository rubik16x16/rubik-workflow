require('../bootstrap');

window.Vue= require('vue');

Vue.component('proyectos-table', require('./table'));
Vue.component('clientes-field', require('./clientes-field'));
Vue.component('casing-field', require('./casing-field'));

const app= new Vue({
  el: '#proyectos-app'
});
