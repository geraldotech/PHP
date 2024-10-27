<template>
  <div>
    <p>app.vue</p>
   <!--  <MyCustomBtn/>  -->
  </div>
</template>

<script setup lang="jsx">

module.exports = {
   props: ['phpcontent'],
  data: function () {
    return {};
  },
  components: {
    Myheader: Vue.defineAsyncComponent(() =>
      loadModule(`${url}/components/vheader.vue`, options)
    ),
    // MyCustomBtn: Vue.defineAsyncComponent(() =>
    //   loadModule("./components/vbutton.vue", options)
    // ),
  },
  methods: {
    change() {
      document.querySelector("p").style.color = "red";
    },
  },
}; 
</script>