<template lang="html">
  <div class="proyectos-table">
    <table class="table">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tr v-for="(proyecto, index) in listProyectos">
        <td>{{ proyecto.fecha }}</td>
        <td>{{ proyecto.nrocta_cliente }}</td>
        <td>
					<a class="btn btn-secondary" :href="urlShow(proyecto.id)" v-if="permiso('ver')">Ver</a>
          <a class="btn btn-warning" :href="urlEdit(proyecto.id)" v-if="permiso('editar')">Editar</a>
          <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(proyecto.id), index)" v-if="permiso('eliminar')">Eliminar</a>
					<a class="btn btn-success" :href="urlHerramientasCreate(proyecto.id)" v-if="proyecto.herramientas.length == 0 && permiso('asignarHerramientas')">Asignar herramientas</a>
					<a class="btn btn-success" :href="urlHerramientasEdit(proyecto.id)" v-if="proyecto.herramientas.length > 0 && permiso('editarHerramientas')">Editar herramientas</a>
        </td>
      </tr>
    </table>
    <a class="btn btn-primary" :href="routes.create" v-if="permiso('agregar')">Nuevo proyecto</a>
  </div>
</template>

<script>

export default {
  props: ['proyectos', 'routes', 'permisos'],
  data (){
    return {
      listProyectos: null,
			seccion: 'proyectos'
    }
  },
  mounted(){
    this.listProyectos= this.proyectos;
  },
  methods:{
		urlShow(id){
			return this.routes.show.replace('id', id);
		},
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
    },
		permiso(accion){
			var seccion= this.seccion;
			var found= this.permisos.find(function(permiso){
				return (permiso.seccion.nombre == seccion && permiso.accion.nombre == accion);
			});
			if (typeof found !== 'undefined') {
				return true;
			}
			return false;
		}
  }
}
</script>

<style lang="css">
</style>
