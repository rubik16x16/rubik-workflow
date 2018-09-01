require('../../bootstrap');

window.Vue= require('vue');

Vue.component('create-herramientas', require('./create'));

const app= new Vue({
  el: "#herramientas-app"
})
