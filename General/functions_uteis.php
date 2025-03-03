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




  /* Exemplo arquivo csv e insere no banco de dados */
  /* BANCO DE DADOS */
  define("DB_DATABASE",   "movies");
  define("DB_HOST",       "db"); // docker host
  define("DB_USER",       "root");
  define("DB_PASSWORD",   "root");
  define("DB_PORT",       "3306");

  /**
  * PDO - CONEXAO COM BANCO DE DADOS
  */

 global $mydb;

 try{
    $mydb = new PDO("mysql:dbname=".DB_DATABASE.";charset=utf8;host=".DB_HOST.";port=".DB_PORT, DB_USER, DB_PASSWORD);
      $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
      $mydb->setAttribute(PDO::ATTR_EMULATE_PREPARES, true); 
      $mydb->setAttribute(PDO::ATTR_PERSISTENT , true); 

    echo 'connection is okay';
  } catch(EXCEPTION $e){
    die($e->getMessage());
  } 


  /* CRIAR A TABELA */
/*   CREATE TABLE `movies`.`filmes_list` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(45) NULL,
    `release` INT NULL,
    `category` VARCHAR(25) NULL,
    PRIMARY KEY (`id`));
 */
  /* INSERT FROM CSV */
  function direct(){
    global $mydb; // Adicionando para acessar a conexão dentro da função

    $csvFile = __DIR__ . '/movies.csv';
    if(!file_exists($csvFile)){
      echo 'arquivo nao encontrado';
      return;
    }
    $totalLines = 0;
    $erros = [];

    $file = fopen($csvFile, 'r');
    $header = fgetcsv($file, 0, ';'); // Lê e descarta o cabeçalho

    // SETA AUTO COMMIT AS FALSE
    $mydb->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // 0 desligado
    // Inicia a transação
    $mydb->beginTransaction();  
    
    // while para algo mais seguro para linhas vazias
    while (($line = fgetcsv($file, 0, ';')) !== false):

    $totalLines++;

    // Pula linhas completamente vazias
    if (empty(array_filter($line, 'strlen'))) continue; 

        $title = addslashes($line[0]);
        $release = addslashes($line[1]);
        $category = addslashes($line[2]);  

        echo strlen($title);
        echo "<p>Inserindo: $title, $release, $category </p>";

        try {

            if (!$mydb) {
              $erros[] = "Erro: conexão com o banco de dados falhou.";
            }


            if(strlen($title) === 0){
              $erros[] = "Titulo está vazio na linha " .$totalLines + 1;
            }     
        
            $sql = "INSERT INTO filmes_list (`title`, `release`, `category`) VALUES ('$title', '$release', '$category')";
            $result = $mydb->exec($sql);

            if ($result !== false) {
                echo "Insert success!\n";
            } else {
                echo "Insert failed!\n";
            }

        } catch (Exception $e) {
           $erros[] = "Erro na linha " .($totalLines + 1) . ": " . $e->getMessage(); // nao returnar
        }

    endwhile;
    
      // Se houve algum erro, faz rollback e retorna os erros
      if(!empty($erros)){
        $mydb->rollBack();
        return [
            'ok' => false,
            'error' => $erros
        ];
      }

      // Caso todas as operações sejam bem-sucedidas, confirma a transação
      $mydb->commit();

      return [
        'ok' => true,
        'message' => 'Todos os dados foram inseridos com exito!',
      ];   
  }

    $ret = direct();
    print_r($ret); 

    if(!$ret['ok']){

      if(isset($ret['error']) && is_array($ret['error'])){
        foreach($ret['error'] as $err){
          echo "<p style='color: red'>$err</p>";
        }
      }
      
    }


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
