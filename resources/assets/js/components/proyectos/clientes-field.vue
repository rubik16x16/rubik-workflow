<template lang="html">
<div class="form-row">
	<div class="form-group col-md-5">
		<label for="cliente">Cliente</label>
		<select class="form-control" name="nrocta_cliente" id="nrocta_cliente">
      <option value="0">Seleccione</option>
      <option v-for="(cliente, index) in clientes" :value="cliente.VTMCLH_NOMBRE" @click="clienteActual= index">{{ cliente.VTMCLH_NOMBRE }}</option>
    </select>
	</div>
	<div class="form-group col-md-4">
		<label for="locacion">Locación</label>
		<select class="form-control" name="idlocacion" id="idlocacion">
      <option value="0">Seleccione</option>
      <option v-for="(locacion, index) in locaciones" :value="locacion.nombre" @click="locacionActual= index">{{ locacion.nombre }}</option>
    </select>
	</div>
	<div class="form-group col-md-2">
		<label for="n_pozo">Nro Pozo</label>
		<select class="form-control" name="idpozo" id="idpozo">
      <option value="0">Seleccione</option>
      <option v-for="pozo in pozos" :value="pozo.USR_FCTPZO_CODIGO">{{ pozo.USR_FCTPZO_CODIGO }}</option>
    </select>
	</div>
</div>
</template>

<script>
export default {
  props: ['clientes'],
  data(){
    return{
      clienteActual: null,
      locacionActual: null
    }
  },
  computed: {
    locaciones(){
      return this.clienteActual != null ? this.clientes[this.clienteActual].locaciones : [];
    },
    pozos(){
      let cliente= this.clientes[this.clienteActual];
      return this.locacionActual != null ? cliente.locaciones[this.locacionActual].pozos : [];
    }
  }
}
</script>

<style lang="css">
</style>
