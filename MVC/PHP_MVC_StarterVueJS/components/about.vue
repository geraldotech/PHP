<template>
  <div>
    <p>About component {{ message }}</p>
    <button @click="hello()">Hello</button>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  methods:{
    hello(){
      console.log(`ok`)
    }
  }
}
</script>
