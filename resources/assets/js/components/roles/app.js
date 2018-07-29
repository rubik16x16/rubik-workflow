require('../bootstrap');

window.Vue= require('vue');

Vue.component('roles-table', require('./table'));

new Vue({
  el: '#app'
});
