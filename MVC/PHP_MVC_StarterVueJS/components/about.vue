<template>
  <div>
    <h1>About component {{ message }}</h1>
    <Vbutton message="Rock in"></Vbutton>
    <Vbutton message="Rio"></Vbutton>
  </div>
</template>

<script>
export default {
    components: {
    Vbutton: Vue.defineAsyncComponent(() => loadModule(`${url}/components/button.vue`, options)),
  },
  data() {
    return {}
  },
  methods:{
    hello(){
      console.log(url)
    }
  }
}
</script>
