require('../bootstrap');

window.Vue= require('vue');

Vue.component('herramientas-table', require('./table'));

new Vue({
  el: '#app'
});
