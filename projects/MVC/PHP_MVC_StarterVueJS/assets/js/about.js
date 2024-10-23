Vue.createApp({
  data() {
    return {
      ok: 'ok',
    }
  },
  components: {
    About: Vue.defineAsyncComponent(() => loadModule(`${url}/components/about.vue`, options)),
  },
  //template: `<About/>`,
}).mount('#about')

//import Heading from './components/about.vue'

//const { createApp, ref, onMounted } = Vue

/* createApp({
  components: {
    Heading: Heading,
  },
  setup() {
    const message = ref('Hello World!')

    const hello = () => {
      console.log(`hello`)
    }

    return {
      message,
      hello,
    }
  },
  component: {},
  template: `<p>Work</p>`,
}).mount('#about')
 */
