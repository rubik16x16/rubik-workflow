<template lang="html">

  <tr class="filtros" @keyup.enter="filtrar">
    <td><input class="form-control" type="text" v-model="tipoHerramienta.tool" id="tipo-herramienta"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.od" id="od-herramienta"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.largo" id="lg-herramienta"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.type" id="sub-tipo-herramienta"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.descrip" id="descripcion-herramienta"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.top_conec" id="top-connection"></td>
    <td><input class="form-control" type="text" v-model="tipoHerramienta.bottom_conec" id="bottom-connection"></td>
    <td></td>
  </tr>

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
