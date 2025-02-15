<div id="myapp">
  <h2>{{message}}</h2>

  <button @click="handlerClick">handlerClick</button>

  <h2>v-for @click</h2>

  <ul>
    <li v-for="value in getRes" :key="value" @click="get_items_vue">
     {{value.nomeUsuario}} -  {{value.idLogin}}
    </li>
  </ul>
  <hr>

  <h2>php loop @click envia params</h2>

  <?php if($data) :?>
      <?php foreach($data as $val) :?>
        <li @click="get_items('<?= $val['nomeUsuario']?>')"><?= $val['nomeUsuario']?></li>
      <?php endforeach ?> 
  <?php endif ?>

  <hr>


  <?php if($data) :?>

    <?php foreach($data as $val) :?>
      <li @click="handlerClick"><?= $val['nomeUsuario']?></li>
    <?php endforeach ?> 

  <?php endif ?>

</div>

<script>
  const { createApp, ref, computed, watch, reactive, onMounted } = Vue

  const fooa = createApp({
  
  setup() {
    const message = ref('Foo')
    const person = reactive({
      name: 'Geraldo',
      children: true,
    })

    const getResponse = reactive([])
    const getRes = ref()

    function handlerClick(e) {
      console.log(e.target.textContent)
    }

    function get_items(e){
       console.log(e);
    }

    function get_items_vue(e){
       console.log(e.target);
    }

    onMounted(() => {
      
      /* Native FETCH */
    fetch(`${url}/VueJS/minhaAPI_Testes`)
      .then((req) => req.json())  // Parse the response as JSON
      .then((res) => {
        if(res.ok){
          console.log(res.data)
        }
    })  // Log the parsed JSON data
    .catch((error) => {
      console.error("Error fetching data:", error);  // Handle any errors
    });

      // Axios
      axios.get(`${url}/VueJS/minhaAPI_Testes`).then(function(response){
          if(response.status == 200){
           console.log(response)
           getRes.value = response.data.data
          }
      })
    })

    return {
      message,
      person,
      handlerClick, getRes, get_items, get_items_vue
    }
  },
})
fooa.mount('#myapp')

</script>