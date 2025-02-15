<?php

  define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);
  $local = BASE_PATH . '/';

  var_dump($local);

  $all_files = scanDirectory_csv(BASE_PATH);

  //print_r($all_files);

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
              $files[] = $itemPath;
          }
      }
  
      return $files;
  }


  echo '<hr>';


