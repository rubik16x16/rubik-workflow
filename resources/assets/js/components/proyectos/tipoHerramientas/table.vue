<template lang="html">
  <div class="tipo-herramientas-table">
    <div class="card text-center">
      <div class="card-header">
        Tipos de herramientas
      </div>
      <div class="card-body table-responsive">
        <form :action="form.action" id="tipoHerramientas" method="post">
          <input type="hidden" name="_method" :value="form.method">
          <input type="hidden" name="_token" :value="csrfToken">
          <input type="hidden" name="tipoHerramientas" v-model="tipoHerramientasIds">
        </form>

        <div class="tipoHerramientas-asignadas">
          <table class="table table-striped table-borderless">
            <thead class="thead-dark">
              <th>Tool</th>
              <th>OD</th>
              <th>LG</th>
              <th>Type</th>
              <th>Descripción</th>
              <th>top connec</th>
              <th>bottom connec</th>
              <th>Acciones</th>
            </thead>
            <tbody>
              <tr v-for="(tipoHerramienta, index) in listaAsignados">
                <td>{{ tipoHerramienta.tool }}</td>
                <td>{{ tipoHerramienta.od }}</td>
                <td>{{ tipoHerramienta.largo }}</td>
                <td>{{ tipoHerramienta.type }}</td>
                <td>{{ tipoHerramienta.descrip }}</td>
                <td>{{ tipoHerramienta.top_conec }}</td>
                <td>{{ tipoHerramienta.bottom_conec }}</td>
                <td><button class="btn btn-danger" type="button" @click="quitarTipoHerramienta(index)">quitar</button></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h4>Filtros</h4>

        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
              <th>Tool</th>
              <th>OD</th>
              <th>LG</th>
              <th>Type</th>
              <th>Descripción</th>
              <th>top connec</th>
              <th>bottom connec</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tipo-herramientas-filtros @filtrar="filtrar"></tipo-herramientas-filtros>
            <tr v-for="(herramienta, index) in tipoHerramientas">
              <td>{{ herramienta.tool }}</td>
              <td>{{ herramienta.od }}</td>
              <td>{{ herramienta.largo }}</td>
              <td>{{ herramienta.type }}</td>
              <td>{{ herramienta.descrip }}</td>
              <td>{{ herramienta.top_conec }}</td>
              <td>{{ herramienta.bottom_conec }}</td>
              <td>
                <button class="btn btn-success" type="button" name="button" @click="agregarTipoHerramienta(herramienta)">Agregar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        <button class="btn btn-primary" type="submit" name="button" form="tipoHerramientas">Guardar</button>
      </div>
    </div>
  </div>
</template>

<script>

Vue.component('tipo-herramientas-filtros', require('./filtros'));

export default {
  props: ['routes', 'form', 'asignados'],
  data (){
    return {
      tipoHerramientas: null,
      listaAsignados: [],
      tipoHerramienta: null,
    }
  },
  mounted(){

    this.listaAsignados= (typeof this.asignados !== 'undefined') ? this.asignados : [];
    this.getData();

  },
  methods:{
    agregarTipoHerramienta(tipoHerramienta){
      this.listaAsignados.push(tipoHerramienta);
    },
    quitarTipoHerramienta(index){
      this.listaAsignados.splice(index, 1);
    },
    getData(){
      axios({
        method: 'GET',
        url: this.routes.get,
        params: {
          tipoHerramienta: this.tipoHerramienta
        },
        responseType:'json'
      }).then(response => {
        this.tipoHerramientas= response.data.tipoHerramientas;
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
  },
  computed:{
    tipoHerramientasIds(){
      var ids = '';
      this.listaAsignados.forEach(function(tipoHerramienta){
        ids+= tipoHerramienta.id + ':';
      });
      return ids.substr(0, ids.length -1);
    },
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
