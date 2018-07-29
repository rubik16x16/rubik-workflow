require('../bootstrap');

window.Vue= require('vue');

Vue.component('tipo-herramientas-table', require('./table'));

new Vue({
  el: '#app'
});
