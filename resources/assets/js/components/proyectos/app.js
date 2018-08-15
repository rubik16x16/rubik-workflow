require('../bootstrap');

window.Vue= require('vue');

Vue.component('proyectos-table', require('./table'));
Vue.component('tipo-herramientas-create', require('./tipoHerramientas/create'));

new Vue({
  el: '#app'
});
