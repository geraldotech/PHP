<h1>Axios Page</h1>

<script>

  axios.get(`${url}/Axios/endpointtest`).then((response) => {
    if(response.status == 200){      
      console.log(response.data)
    }
  }).catch((error) => {
    console.error('Erro na requisição:', error);
  });

  console.log(`============================================`)

  axios.post(`${url}/Axios/buscaWithAxios`, 
  { id: '2400',  },
  ).then((response) => {
    
    console.log(response)    
    if(response.status == 200 && response.data.ok){      
      console.log(response.data.data)
    }
  }).catch((error) => {
    console.error('Erro na requisição:', error);
  });

</script>