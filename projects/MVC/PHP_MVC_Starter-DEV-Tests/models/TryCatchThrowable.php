<?php
class TryCatchThrowable extends Model {

  public function __construct() {
    parent::__construct();
  }

  /**
   * try catch com Throwable +  throw new
   * @see fetchAll
   */
  public function throwableSelect($id = null) {
    try {


      if (empty($id)) {
        throw new \Exception('id do login não foi definido');
      }

      $stmt = $this->db->prepare("SELECT * 
            FROM lgn_logins 
            WHERE idLogin = :id");

      /* ===  execute direto sem bind === */
      //$stmt->execute([':id' => $id]);

      /* === bindParam + execute (mais verboso) === */

      //$stmt->bindParam(':id', $id);
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
      $ret = $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $total = $stmt->rowCount();
      //return $result ?: [];

      if ($result) {
        return [
          'ok' => true,
          'results' => $result,
          'message' => 'consulta retornou dados',
          'total' => $total
        ];
      }

      return [
        'ok' => false,
        'message' => 'nada encontrado',
        'total' => $total
      ];

      // opção 2: caso queria contar 
   /*    $count = count($result);
      if ($count > 0) return $result ?: []; */
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }


  /**
   * prepare
   * @see INSERT + lastInsertId
   */
  public function throwableINSERT() {
    try {

      $stmt = "INSERT INTO notes (notescol, age) VALUES ('texto', 'GeraldoDev2')";
      $stmt = $this->db->prepare($stmt);
      $res = $stmt->execute();

      if ($res) {
        $lastId = $this->db->lastInsertId();
        return ['ok' => true, 'message' => 'success ID: ' . $lastId];
      }
      return ['ok' => false, 'message' => 'not success'];
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }

  /**
   * PREPARE VERSION
   * @see Evita SQL injection e separa dados de query
   */
  public function throwableINSERT2() {
    try {

      $stmt = $this->db->prepare("INSERT INTO notes (notescol, age) VALUES (:notescol, :age)");
      $res = $stmt->execute([
        ':notescol' => 'texto',
        ':age' => 'GeraldoDev2'
      ]);

      if ($res) {
        $lastId = $this->db->lastInsertId();
        return ['ok' => true, 'message' => 'success ID: ' . $lastId];
      }
      return ['ok' => false, 'message' => 'not success'];
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }

  /**
   * exemplo didático e real de bindParam() com loop
   * REAPROVEITAMENTO DA VARIAVEL prepare no loop de dados  
   */
  public function throwableINSERT_bind_loop() {
    try {

      $stmt = $this->db->prepare("INSERT INTO notes (notescol, age) VALUES (:notescol, :age)");

      // Variáveis que serão ligadas por referência
      $notescol = null;
      $age      = null;

      // bind por referência
      $stmt->bindParam(':notescol', $notescol);
      $stmt->bindParam(':age', $age);

      $dados = [
        ['notescol' => 'texto 1', 'age' => 'GeraldoDev1'],
        ['notescol' => 'texto 2', 'age' => 'GeraldoDev2'],
        ['notescol' => 'texto 3', 'age' => 'GeraldoDev3'],
      ];

      $inserts = 0;

      foreach ($dados as $d) {
        // bindParam 
        $notescol = $d['notescol'];
        $age      = $d['age'];

        $stmt->execute();
        $inserts += $stmt->rowCount();
      }

      return [
        'ok' => true,
        'rows' => $inserts,
        'message' => "Inseridos {$inserts} registros"
      ];
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }

  /**
   * try catch com Throwable 
   * @see fetchAll
   */
  public function throwableDelete($idnotes) {

    if (empty($idnotes)) {
      return ['missing $idnotes params'];
    }

    try {
      $stmt = $this->db->prepare("DELETE FROM notes WHERE idnotes = :idnotes");
      // bind + execute ao mesmo tempo
      $stmt->execute([':idnotes' => $idnotes]);
      $res = $stmt->rowCount();

      return 'Deletados: ' . $res;
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }
}
