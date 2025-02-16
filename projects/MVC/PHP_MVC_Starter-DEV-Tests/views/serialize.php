<style>
  input{
    display: block;
  }
</style>
<div>
  <h1>Serialize</h1>

  <form action="" id="form001">  
  <input type="text" name="f_name" placeholder="name" value="Geraldo Filho">
    <input type="text" name="f_age" placeholder="age" value="32">
    <input type="text" name="f_city" placeholder="city" value="Rio de Janeiro">
    <button type="submit" name="acao" >Enviar</button>
  </form>
</div>

<button onclick="request()">send fetch post request</button>

<script>
  const form001 = document.getElementById('form001')
  
  function request(){

    const fdata = new FormData(form001);

    if(Object.fromEntries(new FormData(form001)).f_age === ''){
        console.log(`idade está vazia`)
        return
      }
      fetch(`${url}/Serialize/endpoint`, {
        method: 'POST',
      /*===  headers + body === */   

      // headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      // body: JSON.stringify({ title: 'gmap.dev', body: 'g@map.dev',}),
      //  body: serializeForm(form001),
      



        headers: { Accept: 'application/json','Content-Type': 'application/json',}, 
        body: serializeFormToJSONGeraldo(form001),
        //body: serializeFormToJSON(form001),
      })
      .then(function (response) {
          if(!response.ok){
            console.error('erro com o servidor', response.statusText)
            return;
          }
        // Save the response status in a variable to use later.
        fetch_status = response.status
        console.log(`server response`, response)
        
        // Handle success
        // eg. Convert the response to JSON and return
        return response.json()
      })
      .then(function (json) {
          // Check if the response were success

        if (fetch_status == 200) {
          // Use the converted JSON
          console.log('json res', json)
        }

        if (fetch_status == 404) {
          // Use the converted JSON
          alert(json.error)
        }
      })
      .catch(function (error) {
        console.error(error)
      })
  }

  // front: usar os headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
  // back: capturar com $_POST
  function serializeForm(form) {
    return new URLSearchParams(new FormData(form)).toString();
  }

  // front: headers: { Accept: 'application/json', 'Content-Type': 'application/json',},
  // back: json_decode(file_get_contents('php://input'), true);
  function serializeFormToJSON(form) {
    const formData = new FormData(form);
    const obj = {};
    
    formData.forEach((value, key) => {
      // Se o campo já existir, transforma em array (para inputs com o mesmo nome)
      if (obj[key]) {
        obj[key] = [].concat(obj[key], value);
      } else {
        obj[key] = value;
      }
    });

    return JSON.stringify(obj);
  }

  // front: headers: { Accept: 'application/json', 'Content-Type': 'application/json',},
  // back: json_decode(file_get_contents('php://input'), true);
  // passar o id do formulario diretamente
  function serializeFormToJSONGeraldo(form){
    return JSON.stringify(Object.fromEntries(new FormData(form)))
  }


</script>