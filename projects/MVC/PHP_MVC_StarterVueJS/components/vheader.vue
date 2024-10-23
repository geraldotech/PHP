<template>
  <header>
    <h1>{{ message }}</h1>
  </header>
</template>
<script>
export default {
  data() {
    return {
      message: 'Blogger',
    }
  },
  methods: {},
}
</script>
<style scoped>
* {
  margin: 0;
  padding: 0;
}
header {
  background: rgb(57, 70, 82);
  padding-block: 4px;
  text-align: center;
}
</style>
