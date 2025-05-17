<?php

include('db.php');

try {

  $stmt = $pdo->query("SELECT * FROM filmes_list");
  $model = new stdClass();
  $model->rows = $stmt->fetchAll(PDO::FETCH_OBJ);
  // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // print_r($data);
  // exit;

  // Verificando se os dados foram carregados
  if (empty($model->rows)) {
    echo "Nenhum produto encontrado.\n";
  } else {
    foreach ($model->rows as $prod) {
      echo "<p>" . $prod->title . "</p>";
    }
  }
} catch (PDOException $e) {
  echo "Erro na consulta " . $e->getMessage();
}
