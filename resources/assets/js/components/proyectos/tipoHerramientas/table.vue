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
          <input type="hidden" name="tipoHerramientas" v-model="tipoHerramientasPns">
        </form>

        <div class="tipoHerramientas-asignadas">
          <span v-for="(tipoHerramienta, index) in listaAsignados">{{ tipoHerramienta.tipo_herramienta }} <button type="button" @click="quitarTipoHerramienta(index)">quitar</button></span>
        </div>
        <h4>Filtros</h4>

        <tipo-herramientas-filtros @filtrar="filtrar"></tipo-herramientas-filtros>

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
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(herramienta, index) in tipoHerramientas">
              <td>{{ herramienta.tipo_herramienta }}</td>
              <td>{{ herramienta.od }}</td>
              <td>{{ herramienta.lg }}</td>
              <td>{{ herramienta.sub_tipo_herramienta }}</td>
              <td>{{ herramienta.descripcion }}</td>
              <td>{{ herramienta.top_connection }}</td>
              <td>{{ herramienta.bottom_connection }}</td>
              <td>
                <button type="button" name="button" @click="agregarTipoHerramienta(herramienta)">Agregar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" name="button" form="tipoHerramientas">Guardar</button>
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
      var asignable= this.listaAsignados.find(element => {
        return element.pn == tipoHerramienta.pn;
      });

      if(typeof asignable !== 'undefined'){
        return alert('este tipoHerramienta ya esta asignado')
      }
      this.listaAsignados.push(tipoHerramienta);
    },
    quitarTipoHerramienta(index){
      this.listaAsignados.splice(index, 1);
    },
    getData(){
      axios({
        method: 'GET',
        url: this.routes.index,
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
    tipoHerramientasPns(){
      var pns = '';
      this.listaAsignados.forEach(function(tipoHerramienta){
        pns+= tipoHerramienta.pn + ':';
      });
      return pns.substr(0, pns.length -1);
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
