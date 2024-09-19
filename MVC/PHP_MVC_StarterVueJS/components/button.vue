<script>
export default {
  name: 'button',
  props: {
    message: {
      type: String,
      required: true,
    },
  },
  setup(props) {

     const btnname = 'Rock in Rio'
     const costa = Vue.ref('Geraldo');
     let counter = Vue.ref(0);

     function download(){
    console.log(counter.value++)
     }
 
   return { btnname, costa, download, counter };
  }
}; 


// DataAPI
/* export default {
  data(){
    return {
      btnname: 'Rock in Rio',
      name: '',
      counter: 0
    }
  },
  methods:{
    download(){
      console.log(this.counter++)
    }
  }
}   */
</script>
<template>
 <div>
   <button @click="download">{{message}} - {{counter}}</button>
 </div>
</template>



<style scoped>
div{
  text-align: center;
}
  button {
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 10px;
    text-align: center;
    margin-block: 10px;
    &:hover{
      background: #777;
    }
  }
</style>