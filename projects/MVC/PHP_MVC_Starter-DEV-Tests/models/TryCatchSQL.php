<?php
class TryCatchSQL extends Model {

  public function __construct() {
    parent::__construct();
  }

  function helloPessoas() {
    $listaPessoas = ['Geraldo', 'Felipe', 'Lala', 'Bella', 'Lasi', 'Leticia'];
    //return 'Geraldo Costa';  

    try {
      return [
        'ok' =>  true,
        'data' => $listaPessoas,
        'message' => 'Array retornado com sucesso!'
      ];
    } catch (Exception $e) {
      return array('ok' => false, 'error' => $e->getMessage(), 'message' => 'Ocorreu um erro!');
    }
  }

  /** 
   * @throws consultaLogin
   * @return  tryCatch
   */
  function consultaLogin($limit = 3): array {

    try {
      // Executa a query
      $sql = "SELECT * FROM lgn_logins LIMIT $limit";
      $sql = $this->db->query($sql);

      // Retorno com mensagem detalhada
      if ($sql->rowCount() > 0) {
        // Busca todos os resultados
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        return [
          'ok' => true,
          'data' => $data,
          'message' => 'Consulta realizada com sucesso!'
        ];
      }

      // Caso nenhum dado seja encontrado
      return [
        'ok' => false,
        'data' => [],
        'message' => 'Nenhum dado encontrado!'
      ];
    } catch (Exception $e) {
      return [
        'ok' => false,
        'error' => $e->getMessage(),
        'message' => 'Ocorreu um erro ao realizar a consulta.'
      ];
    }
  }


  public function isabellaTryCatch() {

    try {
      $query = "SELECT * FROM lgn_logins WHERE idLogin = '2020032'";
      $query = $this->db->query($query);

      $data = $query->fetchAll(PDO::FETCH_ASSOC);

      if ($query->rowCount() > 0) {

        return [
          'ok' => true,
          'data' => $data,
          'message' => 'dados encontrados'
        ];
      }

      // caso nao tiver rows          
      return [
        'ok' => false,
        'data' => [],
        'message' => 'nenhum dados encontrado'
      ];
    } catch (Exception $e) {
      return [
        'ok' => false,
        'error' => $e->getMessage(),
        'message' => 'Ocorreu um erro ao realizar a consulta.'
      ];
    }
  }

  /** 
   * @throws PraticandoQueryes
   * @return  tryCatch__against_SQL_injections
   * @since 14/09/2024
   * @author Geraldo Developer dev@geraldox.com
   * @version 1.0
   * @var "SELECT * FROM lgn_logins WHERE idLogin = '2020032'"
   */
  public function against_SQL_injections($id, $cpf) {
    try {
      // Preparando a consulta com placeholders para evitar injeção de SQL
      $sql = "SELECT * FROM lgn_logins 
                  WHERE idLogin = :id 
                  AND CPF = :cpf";
      $stmt = $this->db->prepare($sql);

      // Ligando os parâmetros
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':cpf', $cpf);
      $stmt->execute();

      // Verificando se a consulta retornou algum resultado
      if ($stmt->rowCount() > 0) {
        return [
          'return' => true,
          'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
          'message' => 'Dados encontrados com sucesso!'
        ];
      } else {
        // Caso não haja resultados (consulta vazia)
        return [
          'return' => false,
          'data' => [],
          'message' => 'Nenhum dado encontrado para os parâmetros fornecidos.'
        ];
      }
    } catch (Exception $e) {
      // Captura de exceções e retorno da mensagem de erro
      return [
        'return' => false,
        'data' => [],
        'message' => 'Ocorreu um erro ao processar a solicitação.',
        'error' => $e->getMessage() // Mensagem detalhada do erro
      ];
    }
  }

  public function tryCatchFunction($idLogin) {

    try {
      $sql = "SELECT * FROM lgn_logins 
          WHERE idLogin = '$idLogin'";
      $sql = $this->db->query($sql);

      // encontrei os dados 😁
      if ($sql->rowCount() > 0) {
        return [
          'return' => true,
          'data' => $sql->fetchAll(),
          'message' => 'Encontrei os dados 😁'
        ];
      };

      // Não encontrei os dados 😒
      return [
        'return' => false,
        'data' => [],
        'message' => 'Não encontrei os dados 😒',

      ];

      // Encontrei um erro muito sério 😓
    } catch (Exception $e) {

      return [
        'return' => false,
        'data' => [],
        'message' =>
        "Encontrei um erro muito sério 😓 {$e->getMessage()}",
      ];
    }
  }

  public function tryCatchFunction2($idLogin) {

    try {
      $sql = "SELECT * FROM lgn_logins 
          WHERE idLogin = :idLogin";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':idLogin', $idLogin);
      $stmt->execute();

      // encontrei os dados 😁
      if ($stmt->rowCount() > 0) {
        return [
          'ok' => true,
          'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
          'message' => 'Encontrei os dados 😁'
        ];
      };
      // Não encontrei os dados 😒
      return [
        'ok' => false,
        'data' => [],
        'message' => 'Não encontrei os dados 😒',
      ];

      // Encontrei um erro muito sério 😓
    } catch (Exception $e) {

      return [
        'return' => false,
        'data' => [],
        'message' =>
        "Encontrei um erro muito sério 😓 {$e->getMessage()}",
      ];
    }
  }

  public function tryCatchFunction3($id) {

    try {
      // $sql = "SELECT * FROM lgn_logins  WHERE idLogin = :id";
      $sql = "SELECT * FROM lgn_logins LIMIT 10";

      // prepere
      $stmt = $this->db->prepare($sql);

      // bindParam
      // $stmt->bindParam(':id', $id);
      // execute
      $stmt->execute();

      if ($stmt->rowCount() > 0) {

        return [
          'ok' => true,
          'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
          'message' => 'Dados retornados com sucesso =)'
        ];
      }
      return [
        'ok' => false,
        'data' => [],
        'message' => 'Não encontrei dados =/'
      ];
    } catch (Exception $e) {
      return [
        'ok' => false,
        'data' => [],
        'message' => "Ocorreu um erro {$e->getMessage()}",
      ];
    }
  }

  // exemplo de try catch e transaction (simulacao)
  public function transaction() {

    try {

      /* ===  CONSULTA ANTES DA TRANSAÇÃO SE NECESSARIO === */
      /* echo '<pre>';
      $has2 = $this->db->query("SELECT * FROM lgn_logins");
      $has2 =  $has2->fetchAll(PDO::FETCH_ASSOC);
      print_r($has2); */


      // SETA AUTO COMMIT AS FALSE
      $this->db->setAttribute(PDO::ATTR_AUTOCOMMIT, 0); // 0 desligado
      // Inicia a transação
      $this->db->beginTransaction();

      // aqui vc faz a insercao dentro da transacao
      $this->db->query("INSERT INTO lgn_logins (`nomeUsuario`) VALUES ('GIOVANNA FREITAS')");

      /* === CONSULTA DENTRO DA TRANSACAO ===  */
      $has = $this->db->query("SELECT * FROM lgn_logins");
      $has =  $has->fetchAll(PDO::FETCH_ASSOC);
      echo '<hr><pre>';
      print_r($has);
      // sleep(30);

    } catch (Exception $e) {
      echo "Erro: " . $e->getMessage();
    } finally {
      // Verifica se há uma transação ativa antes de realizar o rollback ou commit
      if ($this->db->inTransaction()) {
        $this->db->rollBack(); // ou $this->db->commit();
      }
      // Religa o autocommit
      $this->db->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
      //  echo 'finally';
    }
  }
}
