<?php

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
    $encode_file = check_file_encoding($csvFile);      

    // SETA AUTO COMMIT AS FALSE
    $mydb->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // 0 desligado
    // Inicia a transação
    $mydb->beginTransaction();  
    
    // while para algo mais seguro para linhas vazias
    while (($line = fgetcsv($file, 0, ';')) !== false):

        $totalLines++;

        // Pula linhas completamente vazias
        if (empty(array_filter($line, 'strlen'))) continue; 
        
            $title = mb_convert_encoding(addslashes($line[0]), 'UTF-8', $encode_file);      
            $release = mb_convert_encoding(addslashes($line[1]), 'UTF-8', $encode_file);      
            $category = mb_convert_encoding(addslashes($line[2]), 'UTF-8', $encode_file);      

            echo strlen($title);
            echo "<p>Inserindo: $title, $release, $category </p>";

         try {
                      if (!$mydb){
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
        'message' => 'Todos os dados foram inseridos com exito! total => ' . $totalLines,
      ];   
  }


  /* CHAMAR A FUNCAO E RECEBER O RETORNO */
    $ret = direct();
    echo "<h2>direct_inser_csv</h2>";
    print_r($ret); 

    if(!$ret['ok']){
      if(isset($ret['error']) && is_array($ret['error'])){
        foreach($ret['error'] as $err){
          echo "<p style='color: red'>$err</p>";
        }
      }
      
    }


    
/**
 * COMO USAR:
 * 1 - Fora do loopinp  definir uma var que armazena o stipo de encoding
 *  $encode_file = $this->check_file_encoding($csvFile);   
 * 
 * 2 - informar essa var no mb_convert_encoding
 *  $cod_programa = mb_convert_encoding($line[1], 'UTF-8', $encode_file);
 */
function check_file_encoding($file){
  // Lê o conteúdo do arquivo
  /* A função mb_detect_encoding não vai funcionar corretamente se você passar o     caminho do arquivo */
  $fileContent = file_get_contents($file);

  // Detecta o encoding
   $encoding = mb_detect_encoding($fileContent, [
      'UTF-8',           // Padrão moderno
      'ISO-8859-1',      // Latin-1 (usado em sistemas antigos na Europa Ocidental)
      'ISO-8859-15',     // Latin-9 (similar ao Latin-1, mas com suporte ao €)
      'ASCII',           // Apenas caracteres básicos
      'CP1251',          // Windows Cyrillic
      'CP1252',          // Versão de Latin-1 no Windows
      'EUC-JP',          // Japonês (Unix)
      'SJIS',            // Japonês (Shift JIS, Windows)
      'GB2312',          // Chinês Simplificado
      'BIG5',            // Chinês Tradicional
  ], true);  
}
