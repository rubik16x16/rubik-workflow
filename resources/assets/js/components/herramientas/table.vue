<template lang="html">
  <div class="herramientas-table">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>tipo</th>
          <th>color</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tr v-for="(herramienta, index) in listHerramientas">
        <td>{{ herramienta.id }}</td>
        <td>{{ herramienta.tipo.nombre }}</td>
        <td>{{ herramienta.color }}</td>
        <td>
          <a class="btn btn-warning" :href="urlEdit(herramienta.id)">Editar</a>
          <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(herramienta.id), index)">Eliminar</a>
        </td>
      </tr>
    </table>
    <a class="btn btn-primary" :href="routes.create">Nueva herramienta</a>
  </div>
</template>

<script>

export default {
  props: ['herramientas', 'routes'],
  data (){
    return {
      listHerramientas: null
    }
  },
  mounted(){
    this.listHerramientas= this.herramientas;
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

      return this.listHerramientas.splice(index, 1);
    }
  }
}
</script>

<style lang="css">
</style>
