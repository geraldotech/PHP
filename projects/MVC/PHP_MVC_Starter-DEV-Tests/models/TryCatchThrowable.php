<?php
class TryCatchThrowable extends Model {

  public function __construct() {
    parent::__construct();
  }

  /**
   *  exemplo de try catch com Throwable
   */
  public function exampleThrowable() {

    try {

      /* === CONSULTA DENTRO DA TRANSACAO ===  */
      $stmt = "SELECT * FROM lgn_logins WHERE idLogin = :id";

      $stmt = $this->db->prepare($stmt);
      $stmt->execute([':id' => 2400]);
      // $res = $stmt->rowCount();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($result) {
        return $result;
      }
      //var_dump($res);

    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }

  /**
   * 
   */
  public function exampleThrowableINSERT() {
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
}
