<button onclick="gerarNovoRelatorio()">Send request to backend with Jax</button>

<script>
  function gerarNovoRelatorio() {
    $.ajax({
      type: 'POST',
      url: url + '/Ajaxjquery/gerarNovoRelatorio',
      //data: 'tipo=' + $('#ativoInativo').val(),
      beforeSend: function() {},
      //dataType: 'json',
      success: function(data) {
        console.log(data)
      },
      error: function(xhr, status, error) {
        // console.error('AJAX Error:', status, error)
      },
      complete: function() {
        // Hide the skeleton loader
      },
    })

  }
</script>