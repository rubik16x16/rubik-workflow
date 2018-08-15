<template lang="html">
  <div class="operadores-disponibles">
    <form :action="form.action" id="operadores" method="post">
      <input type="hidden" name="_method" :value="form.method">
      <input type="hidden" name="_token" :value="csrfToken">
      <input type="hidden" name="operadores" v-model="operadoresIds">
    </form>

    <div class="operadores-asignados">
      <span v-for="(operador, index) in listaAsignados">{{ operador.email }} <button type="button" @click="quitarOperador(index)">quitar</button></span>
    </div>
    <input type="text" name="email" id="email" v-model="operador.email">
    <label for="email">Email</label>
    <button type="button" name="button" @click="filtrar">filtrar</button>
    <table>
      <thead>
        <th>Correo</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        <tr v-for="(operador, index) in listaOperadores">
          <td>{{ operador.email }}</td>
          <td><button type="button" @click="agregarOperador(operador)">Agregar</button></td>
        </tr>
      </tbody>
    </table>
    <button type="submit" name="button" form="operadores">Guardar</button>
  </div>
</template>

<script>
export default {
  props:['operadores', 'routes', 'form'],
  data(){
    return {
      listaAsignados: [],
      listaOperadores: null,
      operador: {
        email: null
      }
    }
  },
  mounted(){
    this.listaOperadores= this.operadores.disponibles;
    this.listaAsignados= this.operadores.asignados;
  },
  methods:{
    agregarOperador(operador){
      var asignable= this.listaAsignados.find(element => {
        return element.email == operador.email;
      });

      if(typeof asignable !== 'undefined'){
        return alert('este operador ya esta asignado')
      }
      this.listaAsignados.push(operador);
    },
    quitarOperador(index){
      this.listaAsignados.splice(index, 1);
    },
    filtrar(){
      axios({
        method: 'GET',
        url: this.routes.get,
        params: this.operador,
        responseType:'json'
      }).then(response => {
        this.listaOperadores= response.data.operadores;
      }).catch(e => {
        console.log(e);
      });
    }
  },
  computed: {
    operadoresIds(){
      var ids = '';
      this.listaAsignados.forEach(function(operador){
        ids+= operador.id + ':';
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
