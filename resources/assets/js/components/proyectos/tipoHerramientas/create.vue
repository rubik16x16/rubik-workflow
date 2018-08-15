<template lang="html">
  <tipo-herramientas-table :form="form" :routes="routes"></tipo-herramientas-table>
</template>

<script>

Vue.component('tipo-herramientas-table', require('./table'));

export default {
  props: ['routes'],
  computed: {
    form(){
      return {
        action: this.routes.store,
        method: 'POST'
      }
    }
  }
}
</script>

<style lang="css">
</style>
