require('../bootstrap');

window.Vue= require('vue');

Vue.component('proyectos-table', require('./table'));
Vue.component('tipo-herramientas-create', require('./tipoHerramientas/create'));
Vue.component('tipo-herramientas-edit', require('./tipoHerramientas/edit'));

const app= new Vue({
  el: '#proyectos-app'
});
