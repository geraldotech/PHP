const app = Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
    App: Vue.defineAsyncComponent(() => loadModule('http://php.localhost/MVC/PHP_MVC_StarterVueJS/components/App.vue', options)),
  },
  //template: `<App/>`,
})

app.mount('#template')
