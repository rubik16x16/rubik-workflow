require('../bootstrap');

window.Vue= require('vue');

Vue.component('tabla-lista-herramientas', require('./agregar_a_lista'));

new Vue({
  el: '#listaherramientasApp'
});
