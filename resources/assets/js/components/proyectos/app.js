require('../bootstrap');

window.Vue= require('vue');

Vue.component('proyectos-table', require('./table'));

const app= new Vue({
  el: '#proyectos-app'
});
