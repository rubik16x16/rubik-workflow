<template lang="html">
  <div class="proyectos-table">
    <div class="card text-center">
      <div class="card-header">
        <a class="btn btn-primary" :href="routes.create" v-if="permiso('agregar')">Nuevo proyecto</a>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-borderless">
          <thead class="thead-dark">
            <tr>
          <th>Previsto Para</th>
          <th>Cliente</th>
              <th>estado</th>
              <th>acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(proyecto, index) in listProyectos">
              <td>{{ proyecto.previstopara }}</td>
              <td>{{ proyecto.cliente.VTMCLH_NOMBRE }}</td>
              <td v-if="proyecto.estado==1"><span class="badge badge-success">Ing</span></td>
              <td v-if="proyecto.estado==2"><span class="badge badge-success">JT</span></td>
              <td v-if="proyecto.estado==3"><span class="badge badge-success">Oper</span></td>
              <td v-if="proyecto.estado==4"><span class="badge badge-success">Loc</span></td>
              <td v-if="proyecto.estado==5"><span class="badge badge-success">Vue</span></td>
              <td v-if="proyecto.estado==6"><span class="badge badge-success">Arch</span></td>
              <td v-if="proyecto.estado==7"><span class="badge badge-success">Canc</span></td>
              <td>
      					<a class="btn btn-warning" :href="urlEdit(proyecto.id)" v-if="permiso('editar')"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger" href="#" @click.prevent="destroy(urlDestroy(proyecto.id), index)" v-if="permiso('eliminar')"><i class="fas fa-trash-alt"></i></a>

                <template v-if="proyecto.tipo_herramientas.length < 1">
                  <a title="Diseñar BHA" class="btn btn-primary" :href="routes.tipoHerramientas.create.replace('id', proyecto.id)"><i class="fas fa-layer-group"></i></a>
                </template>

                <template v-else>
                  <a title="Editar BHA" class="btn btn-primary" :href="routes.tipoHerramientas.edit.replace('id', proyecto.id)"><i class="fas fa-layer-group"></i></a>

                  <a title="Asignar Herramientas" class="btn btn-success" :href="urlHerramientasCreate(proyecto.id)" v-if="proyecto.herramientas.length == 0 && permiso('asignarHerramientas')"><i class="fas fa-wrench"></i></a>
        					<a title="Editar Herramientas" class="btn btn-success" :href="urlHerramientasEdit(proyecto.id)" v-else="proyecto.herramientas.length > 0 && permiso('editarHerramientas')"><i class="fas fa-wrench"></i></a>
                </template>

                <a title="Asignar Operadores" class="btn btn-success" :href="routes.operadores.create.replace('id', proyecto.id)" v-if="proyecto.operadores.length == 0"><i class="fas fa-users"></i></a>
       					<a title="Editar Operadores" class="btn btn-success" :href="routes.operadores.edit.replace('id', proyecto.id)" v-else><i class="fas fa-users"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
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
