<template lang="html">
  <tipo-herramientas-table :form="form" :routes="routes" :asignados="asignados"></tipo-herramientas-table>
</template>

<script>

Vue.component('tipo-herramientas-table', require('./table'));

export default {
  props: ['routes', 'asignados'],
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
