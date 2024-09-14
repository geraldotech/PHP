<template>
  <div>
     <MyHeader/>  
    <p>app.vue</p>
    <MyCustomBtn/> 
  </div>
</template>

<script>
module.exports = {
   props: ['phpcontent'],
  data: function () {
    return {};
  },
  components: {
    MyHeader: Vue.defineAsyncComponent(() =>
      loadModule("./components/myHeader.vue", options)
    ),
    MyCustomBtn: Vue.defineAsyncComponent(() =>
      loadModule("./components/button.vue", options)
    ),
  },
  methods: {
    change() {
      document.querySelector("p").style.color = "red";
    },
  },
}; 
</script>