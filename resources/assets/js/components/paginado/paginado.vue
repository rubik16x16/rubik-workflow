<template lang="html">
  <ul class="paginado">
    <li class="mypage"><a class="page-link" href="#" @click.prevent="pageClick(1)">1..</a></li>
    <li class="mypage" v-for="pagina in range(min, max)"><a class="page-link" href="#" @click.prevent="pageClick(pagina)">{{ pagina }}</a></li>
    <li class="mypage"><a class="page-link" href="#" @click.prevent="pageClick(paginas)">..{{ paginas }}</a></li>
  </ul>
</template>

<script>
export default {
  props: ['cantRegistros', 'registrosPorPagina'],
  data(){
    return {
      paginaActual: 1
    }
  },
  computed: {
    min(){
      var min = this.paginaActual - 5;
      return (min <= 0)? 1 : min;
    },
    max(){
      var max= this.paginaActual + 5;
      return (max > this.paginas) ? this.paginas : max;
    },
    paginas(){
      return Math.ceil(this.cantRegistros / this.registrosPorPagina);
    }
  },
  methods:{
    pageClick(pagina){
      this.paginaActual= pagina;
      this.$emit('page-click', pagina);
    },
    range: function(min,max){
      var array = [],
      j = 0;
      for(var i = min; i <= max; i++){
        array[j] = i;
        j++;
      }
      return array;
    }
  }
}
</script>

<style lang="css">

  .paginado{
    list-style: none;
  }

  .mypage{
    float: left;
  }

</style>
