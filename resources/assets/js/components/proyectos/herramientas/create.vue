<template lang="html">

  <div class="herramientas-create">

    <form :action="routes.store" method="post">
      <input type="hidden" name="_token" :value="csrfToken">

    	<h4 class="text-center">Asignar herramientas</h4>

        <div class="row text-center" v-for="(tipoHerramienta, tipoHerramientaIndex) in tipoHerramientas" :key="tipoHerramienta.id">
          <div class="col-6">
            <table class="table table-striped table-borderless">
              <thead class="thead-dark">
                <th colspan="2">tipo de herramienta posicion {{ tipoHerramienta.posicion }}</th>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">tool</th>
                  <td>{{ tipoHerramienta.herramienta.tool }}</td>
                </tr>
                <tr>
                  <th scope="row">od</th>
                  <td>{{ tipoHerramienta.herramienta.od }}</td>
                </tr>
                <tr>
                  <th scope="row">largo</th>
                  <td>{{ tipoHerramienta.herramienta.largo }}</td>
                </tr>
                <tr>
                  <th scope="row">type</th>
                  <td>{{ tipoHerramienta.herramienta.type }}</td>
                </tr>
                <tr>
                  <th scope="row">descripcion</th>
                  <td>{{ tipoHerramienta.herramienta.descrip }}</td>
                </tr>
                <tr>
                  <th scope="row">top connection</th>
                  <td>{{ tipoHerramienta.herramienta.top_conec }}</td>
                </tr>
                <tr>
                  <th scope="row">bottom connection</th>
                  <td>{{ tipoHerramienta.herramienta.bottom_conec }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-6">
            <h4>Herramientas disponibles</h4>
            <table class="table table-striped table-borderless">
              <thead class="thead-dark">
                <th>#</th>
                <th>pn</th>
                <th>sn</th>
                <th>usar</th>
              </thead>
              <tbody>
                <tr v-for="(herramienta, herramientaIndex) in tipoHerramienta.herramientas" :key="herramienta.id">
                  <td>{{ herramienta.id }}</td>
                  <td>{{ herramienta.pn }}</td>
                  <td>{{ herramienta.sn }}</td>
                  <td>
                    <input type="radio" v-if="disponible(herramienta, tipoHerramienta)" :name="'herramienta-' + tipoHerramienta.id" :value="herramienta.id + '-' + tipoHerramienta.posicion" @change="asignarHerramienta">
                    <input type="radio" v-else :name="'herramienta-' + tipoHerramienta.id" :value="herramienta.id + '-' + tipoHerramienta.posicion" @change="asignarHerramienta" disabled>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">Ninguno</td>
                  <td>
                    <input type="radio" :name="'herramienta-' + tipoHerramienta.id" :value="null" @change="asignarHerramienta">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

  </div>

</template>

<script>
export default {
  props: ['tipoHerramientasProp', 'routes'],
  data(){
    return {
      asignados: [],
      tipoHerramientas: null
    }
  },
  mounted(){

    this.tipoHerramientas= this.tipoHerramientasProp;
    for(let i = 0; i < this.tipoHerramientas.length; i++){
      let tipoHerramienta= this.tipoHerramientas[i];
      for(let i= 0; i < tipoHerramienta.herramientas.length; i++){
        let herramienta= tipoHerramienta.herramientas[i];
        herramienta.visible= true;
        herramienta.checked= false;
      }
    }

  },
  methods: {
    asignarHerramienta(){

      let inputs= document.getElementsByTagName('input');
      let herramientas= [];
      for(let i= 0; i < inputs.length; i ++){
        if(inputs[i].getAttribute('type')){
          herramientas.push(inputs[i]);
        }
      }

      let asignados= [];

      for(let i= 0; i < herramientas.length; i++){
        if(herramientas[i].checked && herramientas[i].getAttribute('value') != ''){
          asignados.push(herramientas[i].getAttribute('value'));
        }
      }

      for(let i= 0; i < herramientas.length; i++){
        let asignado= asignados.indexOf(herramientas[i].getAttribute('value'));
        if(asignado < 0 && !herramientas[i].checked){
          let herramienta= herramientas[i].getAttribute('value')
        }
      }

      this.asignados= asignados;

    },
    disponible(herramienta, tipoHerramienta){

      for(let i= 0; i < this.asignados.length; i++){
        let asignado= this.asignados[i];
        let info= asignado.split('-');
        let herramientaId= info[0];
        let tipoHerramientaPosicion= info[1];

        if(herramienta.id == herramientaId && tipoHerramienta.posicion != tipoHerramientaPosicion){
          return false;
        }

      }

      return true;

    }
  },
  computed: {
    csrfToken(){
      let token = document.head.querySelector('meta[name="csrf-token"]');

      if(token){
        return  token.content;
      }else{
        return console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
      }
    }
  }
}
</script>

<style lang="css">
</style>
