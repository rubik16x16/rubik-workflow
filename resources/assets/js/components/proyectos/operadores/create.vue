<template lang="html">
  <div class="create-operadores">
    <operadores-table :operadores="operadores" :routes="routes.operadores" :form="form"></operadores-table>
  </div>
</template>

<script>
export default {
  props: ['operadores','routes'],
  computed: {
    form(){
      return {
        action: this.routes.operadores.store,
        method: 'PUT'
      }
    }
  }
}
</script>

<style lang="css">
</style>
