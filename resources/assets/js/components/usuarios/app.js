require('../bootstrap');

window.Vue = require('vue');

Vue.component('usuarios-table', require('./table'));

new Vue({
  el: '#app'
});
