<?php
class TryCatchThrowable extends Model {

  public function __construct() {
    parent::__construct();
  }

  /**
   * exemplo de try catch com Throwable
   */
  public function exampleThrowable() {
    try {
      $stmt = $this->db->prepare("
            SELECT * 
            FROM lgn_logins 
            WHERE idLogin = :id
        ");

      $stmt->execute([':id' => 2400]);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result ?: [];
      
    } catch (\Throwable $t) {
      throw new \RuntimeException("Erro ao executar operação", 0, $t);
    }
  }

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

  /**
   * PREPARE VERSION
   * @see Evita SQL injection e separa dados de query
   */
  public function exampleThrowableINSERT2() {
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
}
