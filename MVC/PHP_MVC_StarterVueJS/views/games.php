<div id="games">
<h1>Games template</h1>

<About><About/>
</div>
<script>
  Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
    About: Vue.defineAsyncComponent(() => loadModule('http://php.localhost/PHP_MVC_StarterVueJS/components/about.vue', options)),
  },
  template: `<About/>`,
}).mount('#games')
</script>