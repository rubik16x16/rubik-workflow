<template lang="html">
  <div class="edit-operadores">
    <operadores-table :operadores="operadores" :routes="routes.operadores" :form="form"></operadores-table>
  </div>
</template>

<script>

export default {
  props: ['operadores','routes'],
  computed: {
    form(){
      return {
        action: this.routes.operadores.update,
        method: 'PUT'
      }
    }
  }
}
</script>

<style lang="css">
</style>
