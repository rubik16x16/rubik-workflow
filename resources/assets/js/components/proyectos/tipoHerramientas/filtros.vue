<template lang="html">

  <div class="filtros">

    <label for="tipo-herramienta">Tool</label>
    <input type="text" v-model="tipoHerramienta.tool" id="tipo-herramienta">

    <label for="od-herramienta">OD</label>
    <input type="text" v-model="tipoHerramienta.od" id="od-herramienta">

    <label for="lg-herramienta">LG</label>
    <input type="text" v-model="tipoHerramienta.largo" id="lg-herramienta">

    <label for="sub-tipo-herramienta">Type</label>
    <input type="text" v-model="tipoHerramienta.type" id="sub-tipo-herramienta">

    <label for="descripcion-herramienta">Descripción</label>
    <input type="text" v-model="tipoHerramienta.descrip" id="descripcion-herramienta">

    <label for="top-connection">top connec</label>
    <input type="text" v-model="tipoHerramienta.top_conec" id="top-connection">

    <label for="bottom-connection">bottom connec</label>
    <input type="text" v-model="tipoHerramienta.bottom_conec" id="bottom-connection">

    <button type="button" name="filtrar" @click="filtrar">Filtrar</button>

  </div>

</template>

<script>
export default {
  data(){
    return{
      tipoHerramienta: {
        tool: null,
        od: null,
        largo: null,
        type: null,
        descrip: null,
        top_conec: null,
        bottom_conec: null
      }
    }
  },
  methods:{
    filtrar(){
      this.$emit('filtrar', this.tipoHerramienta);
    }
  }
}
</script>

<style lang="css">
</style>
