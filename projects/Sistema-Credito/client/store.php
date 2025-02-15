<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
    <link href="./src/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">   
	</head>
	<body>
   <header>
   <h1>Welcome a loja de Testes</h1>
   <a href="home.php">Voltar ao Painel</a>
    </header>
  <?php
session_start();

require_once('../functions.php');
$userid = $_SESSION['person_id'];
$single = singleUserAssoc($conn, $userid, $table);

BuyCart($single['LIMITE'], $conn, $table, $userid);
 
?>
<main>
  
<h1>Welcome: <?=$single['NOME']; ?></h1>
<h1>Balance R$: <?=$single['LIMITE']; ?></h1>

<h1>Escolha um produto</h1>
<ul id="produtos"></ul>

<h1>Itens no carrinho</h1>

<ul id="showcarrinho"></ul>
<h2>Total Geral: <span id="totalgeral">0</span></h2>

<form method="POST" action="">
<input
type="hidden" 
name="total" 
id="total" 
placeholder="insira um valor" 
 />      
  <input type="submit" value="Buy now" name="buynow" />
  <!--  <a href="handlerBuy.php?userid=1">BUY NOW</a> -->
</form>

<h1>Ajax Buy</h1>

<button onClick="BuyAjax()" title="Ajax Method">Buy Ajax</button>
<div id="responseAjax"></div>
    </main>

<script>

  const showcarrinho = document.getElementById('showcarrinho');
  const responseAjax = document.getElementById('responseAjax');
  const produtos = document.getElementById('produtos');
  const item = document.querySelectorAll('produtos li');
  const totalGeral = document.querySelector('#totalgeral')

  let cart = [];

  const estoque = [
    {id: 1, item: 'Coke', price: 50},
    {id: 2, item: 'Pizza', price: 20},
  ]

/* show estoque items  */
  for(let i = 0; i < estoque.length; i++){
    const li = document.createElement('li')
    const span = document.createElement(`span`);
    
    li.append(estoque[i].item)
    li.append(span);
    span.textContent = ` - ${estoque[i].price}`;
    span.setAttribute('value', estoque[i].price);
    produtos.append(li)
  }

  // button so existe depois daqui
  const buttons = document.querySelectorAll('ul li')  
  
  buttons.forEach((btn) => {
    btn.addEventListener('click', (e) => {  
      const item = btn.innerText
      const price = +btn.querySelector('span').attributes.value.value      
       cart.push({item, price})    
    somarTudo(cart)
    showCartItems(cart)
    updateInputValue()
    })
      
  })


  // sum values
function somarTudo(arr){
  const TotalDosItens =  arr.reduce((accu, curval) => {
    return accu + curval.price
  },0)

  totalGeral.textContent = TotalDosItens;
}

  const soma = cart.reduce((accu, curval) => {
    return accu + curval.price
  }, 0)

  showCartItems(cart)

function showCartItems(arr){
  // clean previews values
  showcarrinho.innerHTML = ''
  for(const i of arr){
    showcarrinho.innerHTML += `<li>${i.item}</li>`
  }
}

/* AJAX  */
function BuyAjax(){
  const xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "./buynowajax.php");
  xmlhttp.onreadystatechange = function () {
    
    if(xmlhttp.readyState === 4 && xmlhttp.status === 200){
      console.log('Request completed successfully');
      responseAjax.innerHTML = xmlhttp.responseText; 
    }    
  }; 
  xmlhttp.setRequestHeader(
    "Content-type",
    "application/x-www-form-urlencoded"
    );  

    xmlhttp.send('total=' + totalGeral.innerText);

}

// handler input values
function updateInputValue(){
  return total.value = totalGeral.textContent
}



</script>
	</body>
</html>