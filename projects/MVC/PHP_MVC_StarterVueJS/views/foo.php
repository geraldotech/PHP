<div id="foo">
  <h2>{{message}}</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae cumque in laudantium vero</p>

  <button @click="handlerClick">handlerClick</button>

  <ul>
    <li v-for="value in getRes" :key="value" @click="get_items">
     {{value.idLogin}} -  {{value.nomeUsuario}}
    </li>
  </ul>
  <hr>

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
      const selel = e.target;
       console.log(selel);
    }

    onMounted(() => {
      fetch('https://api.geraldox.com/posts', {
        headers:{
          psw: '9090',
          Authorization: 'Bearer GERALDODEVGPDEV'
        },
      }).then(r => r.json()).then(data => {
        console.log(data)
      })

      fetch(`${url}/Foo/minhaAPI_Testes`)
  .then((req) => req.json())  // Parse the response as JSON
  .then((res) => {
    if(res.ok){
      console.log(res.data)
    }
  } )  // Log the parsed JSON data
  .catch((error) => {
    console.error("Error fetching data:", error);  // Handle any errors
  });


      // axios
      axios.get(`${url}/Foo/minhaAPI_Testes`).then(function(response){
          if(response.status == 200){
            console.log(response.data)
          }
      })
    })

    return {
      message,
      person,
      handlerClick, getRes, get_items
    }
  },
  //template: '<p>Hello</p>',
})

fooa.mount('#foo')

</script>