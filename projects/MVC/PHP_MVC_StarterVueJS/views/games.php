<div id="games">
  <div>
    <h1>{{str}}</h1>
    <Mheader></Mheader>
    <About></About>    
    <Vfooter message="My Footer"></Vfooter>
  </div>
</div>
<script>
  Vue.createApp({
  data() {
    return {
      str: 'Games.php from vuejs',
    }
  },
  components: {
    Mheader: Vue.defineAsyncComponent(() => loadModule(`${url}/components/vheader.vue`, options)),
    About: Vue.defineAsyncComponent(() => loadModule(`<?= URL?>/components/about.vue`, options)),
    // menos verboso e mais fácil de importar components
    Vfooter: autoimports('footer'), 
  },
  /* template: `
  <h1>{{str}}</h1>
  <About/>
  <Mheader/>
  <Footer/>
  `, */
}).mount('#games')
</script>