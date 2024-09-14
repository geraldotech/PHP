<template>
 <div>
   <button @click="download">{{btnname}}</button>
 </div>
</template>

<script>
export default {
  data(){
    return {
      btnname: 'Rock in Rio',
    }
  },
  methods:{
    download(){
      console.log(`ok`)
    }
  }
} 
</script>

<style>

</style>