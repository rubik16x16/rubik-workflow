<template lang="html">
  <div class="tipo-herramientas-table">
    <table class="table">
      <thead>
        <tr>
          <th>nombre</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tr v-for="(tipoHerramienta, index) in listTipoHerramientas">
        <td>{{ tipoHerramienta.nombre }}</td>
        <td>
          <a class="btn btn-warning" :href="urlEdit(tipoHerramienta.id)">Editar</a>
          <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(tipoHerramienta.id), index)">Eliminar</a>
        </td>
      </tr>
    </table>
    <a class="btn btn-primary" :href="routes.create">Nueva herramienta</a>
  </div>
</template>

<script>

export default {
  props: ['tipoherramientas', 'routes'],
  data (){
    return {
      listTipoHerramientas: null
    }
  },
  mounted(){
    this.listTipoHerramientas= this.tipoherramientas;
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

      return this.listTipoHerramientas.splice(index, 1);
    }
  }
}
</script>

<style lang="css">
</style>
