<template lang="html">
  <div class="tipo-herramientas-table">
    <div class="card text-center">
      <div class="card-header">
        Tipos de herramientas
      </div>
      <div class="card-body table-responsive">
        <h4>Filtros</h4>

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
        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>tipo_herramienta</th>
              <th>od</th>
              <th>lg</th>
              <th>subtipo herramienta</th>
              <th>descripcion</th>
              <th>top connection</th>
              <th>bottom connection</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(tipoHerramienta, index) in tipoHerramientas">
              <td>{{ tipoHerramienta.tipo_herramienta }}</td>
              <td>{{ tipoHerramienta.od }}</td>
              <td>{{ tipoHerramienta.lg }}</td>
              <td>{{ tipoHerramienta.sub_tipo_herramienta }}</td>
              <td>{{ tipoHerramienta.descripcion }}</td>
              <td>{{ tipoHerramienta.top_connection }}</td>
              <td>{{ tipoHerramienta.bottom_connection }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        <paginado :cant-registros="cantRegistros" :registros-por-pagina="registrosPorPagina" @page-click="cambiarVista"></paginado>
      </div>
    </div>
  </div>
</template>

<script>

Vue.component('paginado', require('./paginado'));

export default {
  props: ['routes'],
  data (){
    return {
      tipoHerramientas: null,
      pagina: 1,
      registrosPorPagina: 25,
      cantRegistros: null,
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
  mounted(){

    this.getData();

  },
  methods:{
    getData(){
      axios({
        method: 'GET',
        url: this.routes.index,
        params: {
          pagina: this.pagina,
          registrosPorPagina: this.registrosPorPagina,
          tipoHerramienta: this.tipoHerramienta
        },
        responseType:'json'
      }).then(response => {
        this.tipoHerramientas= response.data.tipoHerramientas;
        this.cantRegistros= response.data.cantRegistros;
      }).catch(e => {
        console.log(e);
      });
    },
    cambiarVista(pagina){
      this.pagina= pagina;
      this.getData();
    },
    filtrar(){
      this.getData();
      alert('filtrar');
    }
  }
}
</script>

<style lang="css">
</style>
