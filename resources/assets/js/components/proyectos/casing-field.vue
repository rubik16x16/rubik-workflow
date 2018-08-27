<template lang="html">
<div class="form-row casing-field">
	<div class="form-group col-md-2">
		<label for="id_siam_casing">Diam.Casing</label>
		<select class="form-control" name="id_siam_casing" id="id_siam_casing">
      <option value="0" selected>Seleccione</option>
			<template v-for="(cadacasing, index) in casing">
				 <option v-if="casingSelected(cadacasing)" :value="cadacasing.id" @click="cambiarCasing(cadacasing)" selected>{{ cadacasing.valor }}</option>
				<option v-else :value="cadacasing.id" @click="cambiarCasing(cadacasing)">{{ cadacasing.valor }}</option>
			</template>
    </select>
	</div>
	<div class="form-group col-md-2">
		<label for="id_libraje">Libraje</label>
		<select class="form-control casingdatos" name="id_libraje" id="id_libraje">
      <option value="0" selected>Seleccione</option>
			<template v-for="(cadadato, index) in casingdatos">
				 <option v-if="casingdatosSelected(cadadato)" :value="cadadato.id" @click="cambiarCasingDatos(cadadato)" selected>{{ cadadato.libraje }}</option>
				<option v-else :value="cadadato.id" @click="cambiarCasingDatos(cadadato)">{{ cadadato.libraje }}</option>
			</template>
    </select>
	</div>
	<div class="form-group col-md-2">
		<label for="drift">Drift</label>
		<input type="text" class="form-control" name="drift" id="drift">
	</div>
	</div>
</template>

<script>
export default {
  props: ['casing', 'proyecto'],
  data(){
    return{
      casingActual: null,
      casingDatosActual : null,
    		update: false,
			reset: []
    }
  },
  computed: {
    casingdatos(){
      return this.casingActual != null ? this.casingActual.casingdatos : [];
    },
    
  },
	created(){
		if(typeof this.proyecto != 'undefined'){
			this.casingActual= this.proyecto.id_siam_casing;
			this.casingDatosActual = this.proyecto.casingdatos;
		}
	},
	updated(){
		for(let i = 0 ; i < this.reset.length; i++){
			this.$el.getElementsByClassName(this.reset[i])[0].selectedIndex= 0;
		}
		this.reset= [];
	},
	methods:{
		cambiarCasing(cadacasing){
			this.casingActual= cadacasing;
			this.casingDatosActual = this.casingActual.casingdatos;
			this.reset= ['casingdatos'];
		},

		cambiarCasingDatos(cadadato){
			this.casingdatosActual= cadadato;
		},
		

		casingSelected(cadacasing){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.casing.id == cadacasing.id ? true : false;
			}
			return false;
		},
		casingdatosSelected(cadadato){
			if(typeof this.proyecto != 'undefined'){
				return this.proyecto.casing.id == cadadato.id ? true : false;
			}
			return false;
		},
	}
}
</script>

<style lang="css">
</style>
