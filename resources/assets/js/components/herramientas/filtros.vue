<template lang="html">

  <div class="filtros">

    <label for="tipo-herramienta">tipo de herramienta</label>
    <input type="text" v-model="tipoHerramienta.tipo_herramienta" id="tipo-herramienta">

    <label for="od-herramienta">od de herramienta</label>
    <input type="text" v-model="tipoHerramienta.od" id="od-herramienta">

    <label for="lg-herramienta">lg de herramienta</label>
    <input type="text" v-model="tipoHerramienta.lg" id="lg-herramienta">

    <label for="sub-tipo-herramienta">sub-tipo de herramienta</label>
    <input type="text" v-model="tipoHerramienta.sub_tipo_herramienta" id="sub-tipo-herramienta">

    <label for="descripcion-herramienta">descripcion de herramienta</label>
    <input type="text" v-model="tipoHerramienta.descripcion" id="descripcion-herramienta">

    <label for="top-connection">top connection</label>
    <input type="text" v-model="tipoHerramienta.top_connection" id="top-connection">

    <label for="bottom-connection">bottom connection</label>
    <input type="text" v-model="tipoHerramienta.bottom_connection" id="bottom-connection">

    <button type="button" name="filtrar" @click="filtrar">Filtrar</button>

  </div>

</template>

<script>
export default {
  data(){
    return{
      tipoHerramienta: {
        tipo_herramienta: null,
        od: null,
        lg: null,
        sub_tipo_herramienta: null,
        descripcion: null,
        top_connection: null,
        bottom_connection: null
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
