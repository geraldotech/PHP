<?php 
 
?> 
<!DOCTYPE html>
<html lang="en" style="color-scheme:dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  

  <button onclick="gerarNovoRelatorio()">Send request to backend with Jax</button>

  <script>


function gerarNovoRelatorio(){
  $.ajax({
  type: 'POST',
  url: url + '/Gerar/gerarNovoRelatorio',
  //data: 'tipo=' + $('#ativoInativo').val(),
  beforeSend: function () {},
  //dataType: 'json',
  success: function (data) {
    console.log(data)
  },
  error: function (xhr, status, error) {
   // console.error('AJAX Error:', status, error)
  },
  complete: function () {
    // Hide the skeleton loader
  },
})

}


  </script>
</body>
</html>