<div id="games">
  <div>
  <h1>{{str}}</h1>
    <About></About>    
    <Mheader></Mheader>
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
    Mheader: Vue.defineAsyncComponent(() => loadModule(`<?= URL?>/components/myHeader.vue`, options)),
    About: Vue.defineAsyncComponent(() => loadModule(`<?= URL?>/components/about.vue`, options)),
    Vfooter: Vue.defineAsyncComponent(() => loadModule(`<?= URL?>/components/footer.vue`, options)),
  },
  /* template: `
  <h1>{{str}}</h1>
  <About/>
  <Mheader/>
  <Footer/>
  `, */
}).mount('#games')
</script>