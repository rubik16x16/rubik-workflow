require('../bootstrap');

window.Vue= require('vue');

Vue.component('proyectos-table', require('./table'));

new Vue({
  el: '#app'
});
