<template lang="html">
<div class="form-row clientes-field">
	<div class="form-group col-md-5">
		<label for="cliente">Cliente</label>
		<select class="form-control" name="nrocta_cliente" id="nrocta_cliente">
      <option value="0" selected>Seleccione</option>
			<template v-for="(cliente, index) in clientes">
				 <option v-if="clienteSelected(cliente)" :value="cliente.VTMCLH_NROCTA" @click="cambiarCliente(cliente)" selected>{{ cliente.VTMCLH_NOMBRE }}</option>
				<option v-else :value="cliente.VTMCLH_NROCTA" @click="cambiarCliente(cliente)">{{ cliente.VTMCLH_NOMBRE }}</option>
			</template>
    </select>
	</div>
	<div class="form-group col-md-3">
		<label for="locacion">Locación</label>
		<select class="form-control locaciones" name="idlocacion" id="idlocacion">
      <option value="0" selected>Seleccione</option>
			<template v-for="(locacion, index) in locaciones">
				<option v-if="locacionSelected(locacion)" :value="locacion.id" @click="cambiarLocacion(locacion)" selected>{{ locacion.nombre }}</option>
				<option v-else :value="locacion.id" @click="cambiarLocacion(locacion)">{{ locacion.nombre }}</option>
			</template>
    </select>
	</div>
	<div class="form-group col-md-2">
		<label for="n_pozo">Nro Pozo</label>
		<select class="form-control pozos" name="idpozo" id="idpozo">
      <option value="0" selected>Seleccione</option>
			<template v-for="pozo in pozos">
				<option v-if="pozoSelected(pozo)" :value="pozo.USR_FCTPZO_CODIGO" selected>{{ pozo.USR_FCTPZO_DESCRP }}</option>
				<option v-else :value="pozo.USR_FCTPZO_CODIGO">{{ pozo.USR_FCTPZO_DESCRP }}</option>
			</template>
    </select>
	</div>
<div class="form-group col-md-2">
		<label for="idlistaprecios">Lista Precios</label>
		<select class="form-control listasdeprecios" name="idlistaprecios" id="idlistaprecios">
      <option value="0" selected>Seleccione</option>
			<template v-for="precio in listasdeprecios">
				<option v-if="precioSelected(precio)" :value="precio.STTLPR_CODLIS" selected>
				{{ precio.STTLPR_DESCRP }}</option>
				<option v-else :value="precio.STTLPR_CODLIS">{{ precio.STTLPR_DESCRP }}</option>
			</template>
    </select>
	</div>	
</div>
</template>

<script>
export default {
  props: ['clientes', 'proyecto'],
  data(){
    return{
      clienteActual: null,
      locacionActual: null,
			update: false,
			reset: []
    }
  },
  computed: {
    locaciones(){
      return this.clienteActual != null ? this.clienteActual.locaciones : [];
    },
    listasdeprecios(){
      return this.clienteActual != null ? this.clienteActual.listasdeprecios : [];
    },
    pozos(){
      return this.locacionActual != null ? this.locacionActual.pozos : [];
    }
  },
	created(){
		if(typeof this.proyecto != 'undefined'){
			this.clienteActual= this.proyecto.cliente;
			this.locacionActual= this.proyecto.locacion;
			}
	},
	updated(){
		for(let i = 0 ; i < this.reset.length; i++){
			this.$el.getElementsByClassName(this.reset[i])[0].selectedIndex= 0;
		}
		this.reset= [];
	},
	methods:{
		cambiarCliente(cliente){
			this.clienteActual= cliente;
			this.locacionActual= null;
			this.reset= ['locaciones', 'pozos','listasdeprecios'];
		},
		cambiarLocacion(locacion){
			this.locacionActual= locacion;
			this.reset= ['pozos'];
		},
		clienteSelected(cliente){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.cliente.VTMCLH_NROCTA == cliente.VTMCLH_NROCTA ? true : false;
			}
			return false;
		},
		pozoSelected(pozo){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.pozo.USR_FCTPZO_CODIGO == pozo.USR_FCTPZO_CODIGO ? true : false;
			}
			return false;
		},
		locacionSelected(locacion){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.locacion.id == locacion.id ? true : false;
			}
			return false;
		},
		precioSelected(precio){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.idlistaprecios == precio.STTLPR_CODLIS ? true : false;
			}
			return false;
		},
	}
}
</script>

<style lang="css">
</style>
