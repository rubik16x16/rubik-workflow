<template lang="html">
  <div class="proyectos-table">
    <table class="table">
      <thead>
        <tr>
          <th>nombre</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tr v-for="(proyecto, index) in listProyectos">
        <td>{{ proyecto.nombre }}</td>
        <td>
          <a class="btn btn-warning" :href="urlEdit(proyecto.id)">Editar</a>
          <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(proyecto.id), index)">Eliminar</a>
					<a class="btn btn-success" :href="urlHerramientasCreate(proyecto.id)" v-if="proyecto.herramientas.length == 0">Asignar herramientas</a>
					<a class="btn btn-success" :href="urlHerramientasEdit(proyecto.id)" v-if="proyecto.herramientas.length > 0">Editar herramientas</a>
        </td>
      </tr>
    </table>
    <a class="btn btn-primary" :href="routes.create">Nuevo proyecto</a>
  </div>
</template>

<script>

export default {
  props: ['proyectos', 'routes'],
  data (){
    return {
      listProyectos: null
    }
  },
  mounted(){
    this.listProyectos= this.proyectos;
  },
  methods:{
    urlEdit (id){
      return this.routes.edit.replace('id', id);
    },
    urlDestroy(id){
      return this.routes.destroy.replace('id', id);
    },
		urlHerramientasCreate(id){
			return this.routes.herramientas.create.replace('id', id);
		},
		urlHerramientasEdit(id){
			return this.routes.herramientas.edit.replace('id', id);
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
    }
  }
}
</script>

<style lang="css">
</style>
