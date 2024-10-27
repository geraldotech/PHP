<div id="about">
  <h1 @click="money++">About {{ money }}</h1>

  <p-button
    icon="pi-user"
    class="p-button-success">
    <i class="pi pi-user"></i>
  </p-button>

  inputtext:
  <p-inputtext
    v-model="text"
    type="text"
    placeholder="input text">
  </p-inputtext>

  <p-card style="width: 25rem; overflow: hidden">
    <template #header>
      <img
        src="https://primefaces.org/cdn/primevue/images/card-vue.jpg"
        alt="" />
    </template>
    <template #title>Simple Card</template>
    <template #subtitle>Card subtitle</template>
    <template #content>
      <p class="m-0">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione quam
        perferendis esse, cupiditate neque quas!
      </p>
    </template>
    <template #footer>
      <div class="flex gap-4 mt-1">
        <p-button
          label="Cancel"
          severity="primary"
          outlined
          class="w-full"></p-button>
        <p-button
          label="Cancel"
          severity="secondary"
          outlined
          class="w-full"></p-button>
        <p-button
          label="Save"
          class="w-full"></p-button>
      </div>
    </template>
  </p-card>

  <p-toggleswitch
    v-model="state.checkbox"
    @click="state.checkbox = !state.checkbox">
  </p-toggleswitch>
  <p>{{state.checkbox}}</p>
</div>
<script>
  const { createApp, ref, reactive } = Vue

  const app = Vue.createApp({
    setup() {
      const money = ref(10)
      const button = ref('button')
      const text = ref('')

      const state = reactive({
        checkbox: true,
        isNew: false,
      })

      console.log(state)
      return {
        money,
        button,
        state,
        text,
      }
    },
  })
  app.component('p-inputtext', PrimeVue.InputText)
  app.component('p-button', PrimeVue.Button)
  app.component('p-card', PrimeVue.Card)
  app.component('p-toggleswitch', PrimeVue.ToggleSwitch)

  app.use(PrimeVue.Config, {
    theme: {
      preset: PrimeVue.Themes.Nora,
    },
  })

  app.mount('#about')

  console.group('%c Todos os components', 'color: #66d9eb;font-size:1rem;background: #000c15')
  console.log(PrimeVue)
  console.groupEnd()
</script>
