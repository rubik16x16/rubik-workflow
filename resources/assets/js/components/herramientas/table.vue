<template lang="html">
  <div class="tipo-herramientas-table">
    <div class="card text-center">
      <div class="card-header">
        Tipos de herramientas
      </div>
      <div class="card-body table-responsive">
        <h4>Filtros</h4>

        <herramientas-filtros @filtrar="filtrar"></herramientas-filtros>

        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>tipo de herramienta</th>
              <th>od</th>
              <th>lg</th>
              <th>subtipo de herramienta</th>
              <th>descripcion</th>
              <th>top connection</th>
              <th>bottom connection</th>
              <th>pn</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(herramienta, index) in herramientas">
              <td>{{ herramienta.tipo_herramienta }}</td>
              <td>{{ herramienta.od }}</td>
              <td>{{ herramienta.lg }}</td>
              <td>{{ herramienta.sub_tipo_herramienta }}</td>
              <td>{{ herramienta.descripcion }}</td>
              <td>{{ herramienta.top_connection }}</td>
              <td>{{ herramienta.bottom_connection }}</td>
              <td>{{ herramienta.pn }}</td>
              <td>
                <a class="btn btn-warning" :href="urlEdit(herramienta.pn)"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(herramienta.pn), index)"><i class="fas fa-trash-alt"></i></a>
              </td>
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

Vue.component('paginado', require('../paginado/paginado'));
Vue.component('herramientas-filtros', require('./filtros'));

export default {
  props: ['routes'],
  data (){
    return {
      herramientas: null,
      pagina: 1,
      registrosPorPagina: 25,
      cantRegistros: null,
      tipoHerramienta: null
    }
  },
  mounted(){

    this.getData();

  },
  methods:{
    urlEdit (id){
      return this.routes.edit.replace('id', id);
    },
    urlDestroy(id){
      return this.routes.destroy.replace('id', id);
    },
    destroy(route, index){

      axios({
        method: 'DELETE',
        url: route,
      }).then(response => {
        console.log(response.data);
      }).catch(e => {
        console.log(e);
      });

      return this.listProyectos.splice(index, 1);
    },
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
        this.herramientas= response.data.herramientas;
        this.cantRegistros= response.data.cantRegistros;
      }).catch(e => {
        console.log(e);
      });
    },
    cambiarVista(pagina){
      this.pagina= pagina;
      this.getData();
    },
    filtrar(tipoHerramienta){
      this.tipoHerramienta= tipoHerramienta;
      this.getData();
      alert('filtrar');
    }
  }
}
</script>

<style lang="css">
</style>
