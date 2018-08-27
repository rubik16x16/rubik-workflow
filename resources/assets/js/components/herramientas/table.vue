<template lang="html">
  <div class="tipo-herramientas-table">
    <div class="card text-center">
      <div class="card-header">
        Tipos de herramientas
      </div>
      <div class="card-body table-responsive">
        <h4>Filtros</h4>

        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <th>Tool</th>
            <th>OD</th>
            <th>LG</th>
            <th>Type</th>
            <th>Descripcion</th>
            <th>top connec</th>
            <th>bottom connec</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            <herramientas-filtros @filtrar="filtrar"></herramientas-filtros>
            <tr v-for="(herramienta, index) in herramientas">
              <td>{{ herramienta.tool }}</td>
              <td>{{ herramienta.od }}</td>
              <td>{{ herramienta.largo }}</td>
              <td>{{ herramienta.type }}</td>
              <td>{{ herramienta.descrip }}</td>
              <td>{{ herramienta.top_conec }}</td>
              <td>{{ herramienta.bottom_conec }}</td>
              <td>
                <a class="btn btn-warning" :href="urlEdit(herramienta.id)"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(herramienta.id), index)"><i class="fas fa-trash-alt"></i></a>
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
