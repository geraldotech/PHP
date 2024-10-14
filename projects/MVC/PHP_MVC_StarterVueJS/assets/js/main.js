const app = Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
    App: Vue.defineAsyncComponent(() => loadModule(`http://127.0.0.1:8080/PHP/projects/MVC/PHP_MVC_StarterVueJS/components/App.vue`, options)),
  },
  template: `<App/>`,
})

app.mount('#template')
