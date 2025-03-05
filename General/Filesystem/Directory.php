<?php

//print_r(__DIR__);
  define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);


  /* SCAN POR TUDO */
  $all_files = scanDirectory_csv(BASE_PATH);

  print_r($all_files);

  // Função Recursiva para Escanear Todos os Diretórios
  function scanDirectory_csv($dir) {
      $files = [];
      
      // Verifica se o diretório existe
      if (!is_dir($dir)) {
          return $files;
      }
  
      // Obter o conteúdo do diretório
      $items = scandir($dir);
  
      // Ignorar '.' e '..'
      $items = array_diff($items, ['.', '..']);
      
      foreach ($items as $item) {
          $itemPath = $dir . DIRECTORY_SEPARATOR . $item;
  
          if (is_dir($itemPath)) {
              // Se for diretório, faz a busca recursiva
              $files = array_merge($files, scanDirectory_csv($itemPath));
          } elseif (is_file($itemPath) && pathinfo($itemPath, PATHINFO_EXTENSION) === 'csv') {
              // Se for arquivo CSV, adiciona à lista
              //$files[] = $itemPath;
              $files[] = basename($itemPath); // apenas o nome do csv
          }
      }
  
      return $files;
  }

  echo '<hr>';


  /* SCANEAR SIMPLES */
  $arquivos = [];
 // $destinorh = BASE_PATH . '/PHP/General/Filesystem/';
  $destinorh = BASE_PATH . '/PHP/General/';

  $handle = opendir($destinorh); // Armazena o recurso retornado por opendir()
  
  if ($handle) { // Verifica se conseguiu abrir o diretório
      while (($file = readdir($handle)) !== false) {
          
                // $arquivos[] = $file;
          if(pathinfo($file, PATHINFO_EXTENSION) === 'csv'){
               $arquivos[] = $file;
          } 
      }
      closedir($handle); // Fecha o diretório após a leitura
  }
  echo '<br>';
  print_r($arquivos);

