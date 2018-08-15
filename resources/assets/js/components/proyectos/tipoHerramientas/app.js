require('../../bootstrap');

window.Vue= require('vue');

Vue.component('tipo-herramientas-table', require('./table'));
Vue.component('tipo-herramientas-create', require('./create'));
Vue.component('tipo-herramientas-edit', require('./edit'));

const app= new Vue({
  el: '#tipo-herramientas-app'
});
