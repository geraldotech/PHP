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

<button onclick="request()">request 1</button>
<button onclick="request2()">request 2</button>
<button onclick="request3()">request 3</button>

<script src="<?= URL . '/assets/js/serialize.js'?>"></script>