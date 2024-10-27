const app = Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
    App: Vue.defineAsyncComponent(() => loadModule(`${url}/components/App.vue`, options)),
  },
//  template: `<App/>`,
})

//app.mount('#template')
