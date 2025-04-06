<style>
  #form001 input{
    display: block;
  }
</style>
<div>
  <h2>Serialize forms and JSON: POST</h2>

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


<div id="noform">
  <h2>request4: Exemplo sem form id</h2>
  <select name="" id="operadora">
    <option value="t">TIM</option>
    <option value="c">Claro</option>
    <option value="v">Vivo</option>
  </select>

  <ul>
    <li> 
      <input type="radio" name="concorda" id="sim" value="sim">
      <label for="sim">Sim</label>
    </li>
    <li>
      <input type="radio" name="concorda" id="nao" value="nao">
      <label for="nao">Não</label>
    </li>
  </ul>

  <button onclick="request4()">Confirmar ação</button>
</div>

<script src="<?= URL . '/assets/js/serialize.js'?>"></script>