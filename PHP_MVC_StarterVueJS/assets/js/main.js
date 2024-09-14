const app = Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
     App: Vue.defineAsyncComponent(() => loadModule('http://php.localhost/PHP_MVC_StarterVueJS/components/App.vue', options)),
    // mycomponent: Vue.defineAsyncComponent(() => loadModule('http://php.localhost/PHP_MVC_StarterVueJS/components/phpcontent.vue', options)),
  },
  //template: `<App/>`,
})

app.mount('#template')
