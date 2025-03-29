<?php
/* FUNCOES UTEIS PARA O PHP */


/* GERAR UUID */
  function generateUUID() {
    return sprintf(
    '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    mt_rand(0, 0xffff), mt_rand(0, 0xffff),
    mt_rand(0, 0xffff),
    mt_rand(0, 0x0fff) | 0x4000,
    mt_rand(0, 0x3fff) | 0x8000,
    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }
  
  $uuid = generateUUID();
  $short_id = substr($uuid, 0, 8); // Pega os primeiros 8 caracteres

  echo $uuid;
  echo '<br>';
  echo $short_id;

/* GERAR UUID ALTERNATIVA LITE */
  $uuidv2 = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4)); 

  $short_id = substr(vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4)), 0, 8); // Pega os primeiros 8 caractere 
  
  echo "<p>$uuidv2</p>";
  echo "<p>$short_id</p>";


  /* Essa abordagem funciona como uma alternativa ao `try-catch` para capturar e exibir múltiplos erros de validação sem interromper a execução do código. Ao acumular os erros em um array e exibi-los ao final, você evita que a execução pare abruptamente ao encontrar o primeiro erro, permitindo processar todas as verificações de uma vez.

    No entanto, essa abordagem tem limitações em comparação com `try-catch`:

    1. **Não interrompe a execução automaticamente** – Se precisar parar a execução ao encontrar um erro crítico, o `throw` dentro de um `try-catch` seria mais apropriado.
    2. **Não diferencia tipos de erros** – No `try-catch`, você pode capturar erros específicos (`Exception`, `PDOException`, etc.), enquanto aqui todos os erros são apenas mensagens no array.
    3. **Menos integração com fluxos de exceção do PHP** – Exceções podem ser propagadas e tratadas em níveis superiores do código, enquanto este método exige verificações manuais.
  */
  function trycatcherros($n1, $n2){
    $erros= [];

    if($n1 < $n2){
        $erros[] = 'n1 é menor que n2';
    }

    if($n1 > $n2){
        $erros[] = 'n1 é maior que n2';
    }

    if(count($erros) > 0 || !empty($erros)){
         echo  implode("\n", $erros);

    } else{
        echo '<h2>Os números são iguais sucesso</h2>';
    }
   
  }

  trycatcherros(5, 5);

  
  // tenta remover todos os espacos do meio inicio e fim da string
  function removeEspacos($str){
    $str = str_replace(' ', '', $str);
    $str= trim($str);
    return $str;
  }  

  echo strlen(removeEspacos(' ab cd ')); // "abcd"


  /* USANDO ERROR_LOG */
    error_log(date('d-M-Y H:i:s') . " Seja bem-vindo ao log error_log" . PHP_EOL , 3, $_SERVER['DOCUMENT_ROOT']. '/PHP/error_log' );


// json_encode
    $logData = [
      'timestamp'       => date('d-M-Y H:i:s'),
      'mensagem'        => 'Erro na aprovação do gestor de grupo',
      'usuario_logado'  => 'me',
      'id_alternativo'  => 10,
    ];  


  define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/PHP');    
      
  error_log(json_encode($logData, JSON_UNESCAPED_UNICODE) . PHP_EOL, 3, BASE_PATH . '/error_log');


// date + timezone
date_default_timezone_set('America/Sao_Paulo');

date('d-M-Y H:i:s');

// Formato: '20240927_153000' para timestamp
$timestamp = date('Ymd_His'); 

// header json
header('Content-Type:application/json');