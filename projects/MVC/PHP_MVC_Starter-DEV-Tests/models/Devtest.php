<?php
class Devtest extends Model {

    public function __construct(){
        parent::__construct();
    }

    /** 
     * @throws consultaSimples
     * @return  ifRowCount
    */ 
    public function consultaSimples(){
      $sql = $this->db->query("SELECT * FROM lgn_logins LIMIT 5");      
      return $sql->fetchAll();
    }

    function helloPessoas(){
      $listaPessoas = ['Geraldo', 'Felipe', 'Lala', 'Bella', 'Lasi', 'Leticia'];
      //return 'Geraldo Costa';  

      try {
        return array('return' =>  true, 'message' => 'Array retornado/inserido com sucesso!');

      }
      catch (Exception $e) {
        return array('return' => true, 'error' => $e->getMessage(), 'message' => 'Perfil atualizado com sucesso!');
      }

    }

    /** 
     * @throws consultaLogin
     * @return  tryCatch
     * */ 
    function consultaLogin($limit = 3){  

      try {
        // Executa a query
        $sql = "SELECT * FROM lgn_logins LIMIT $limit";
        $sql = $this->db->query($sql);     

        // Retorno com mensagem detalhada
          if($sql->rowCount()>0){
        
        // Busca todos os resultados
        $data = $sql->fetchAll();
       
            return [
              'return' => true, 
              'data' => $data, 
              'message' => 'Consulta realizada com sucesso!'
            ]; 
      } 
    
        // Caso nenhum dado seja encontrado
        return [
            'return' => false, 
            'data' => [], 
            'message' => 'Nenhum dado encontrado!'
      ];      
      
      } catch (Exception $e) {

       // Tratamento de erro com mensagem apropriada
        return [
          'return' => false, 
          'error' => $e->getMessage(), 
          'message' => 'Ocorreu um erro ao realizar a consulta.'];
      }
    }
    
    /** 
     * @throws consultaLogin2
     * @return  ifRowCount
     * */ 

    public function consultaLogin2(){
      $sql = "SELECT * FROM lgn_logins LIMIT 5";
      
      $sql = $this->db->query($sql);

      $array = [];
      if($sql->rowCount()>0){
            $array = $sql->fetchAll();
      }
      return $array;       
    }

      /** 
     * @throws isabellaTryCatch
     * @return  tryCatch
     * */ 

    public function isabellaTryCatch(){
      
      try{
        $query = "SELECT * FROM lgn_logins WHERE idLogin = '2020032'";
        $query = $this->db->query($query);
       
        $data = $query->fetchAll();
       
        if($query->rowCount() > 0){

          return[
            'return' => true,
            'data' => $data,
            'message' => 'dados encontrados'
          ];
        }

          // caso nao tiver rows          
          return[ 
          'return' => false,
          'data' => [],
          'message' => 'nenhum dados encontrado'
        ];

      } catch(Exception $e){
          return [
          'return' => false,
          'error' => $e->getMessage(),
          'message' => 'Ocorreu um erro ao realizar a consulta.'
          ];        
      }
        
    }
    
     /** 
     * @throws isabellaCustom
     * @return  customByGmapdev
     * */ 

    public function isabellaCustom(){
      $sql = "SELECT * FROM lgn_logins WHERE idLogin = 23400";

      $sql = $this->db->query($sql);

      if($sql->rowCount() > 0){
        return [
          'return' => true,
          'data' => $sql->fetchAll(),
        ];
      } else {
        return [
          'return' => false,
          'data' => [],
          'message' => 'Sem dados para mostrar'
        ];
      }
    }


    /** 
     * @throws 
     * @return  tryCatch__against_SQL_injections
     * */ 

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


    /** 
     * @throws PraticandoQueryes
     * @return  tryCatch__against_SQL_injections
     * @since 14/09/2024
     * @author Geraldo Developer dev@geraldox.com
    * @version 1.0
    * @var "SELECT * FROM lgn_logins WHERE idLogin = '2020032'"
     * */ 

     public function tipoA($idLogin){
      $sql = "SELECT * FROM lgn_logins 
      WHERE idLogin = '$idLogin'";

      $sql = $this->db->query($sql);
      if($sql->rowCount() > 0 ){
        return $sql->fetch(); // return um array
      }
      

     }

     public function tipoB($idLogin){
      
      $sql = "SELECT * FROM lgn_logins 
      WHERE idLogin = '$idLogin'";

      $sql = $this->db->query($sql);

      if($sql->rowCount() > 0){
        return [
          'return' => true,
           'data' => $sql->fetchAll()
        ];
      } else {
        // generic error
        return [
          'return' => false,
           'data' => [],
           'message' => 'Não encontrei os dados ou ocorreu algum erro'
        ];
      }

    }


  /*    public function tryCatchFunction($idLogin){
      
      
      try{
      $sql = "SELECT * FROM lgn_logins 
      WHERE idLogin = '$idLogin'";
      $sql = $this->db->query($sql);

      // encontrei os dados 😁
      if($sql->rowCount() > 0){
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
      } catch(Exception $e){

        return [
          'return' => false,
          'data' => [],
        'message' => 
        "Encontrei um erro muito sério 😓 {$e->getMessage()}",
        ];

      }
     }  */
/*      public function tryCatchFunction($idLogin){
      
      
      try{
      $sql = "SELECT * FROM lgn_logins 
      WHERE idLogin = :idLogin";
      $stmt = $this->db->prepare($sql);


      $stmt->bindParam(':idLogin', $idLogin);
      $stmt->execute();

      // encontrei os dados 😁
      if($stmt->rowCount() > 0){
        return [
          'return' => true,
          'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
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
      } catch(Exception $e){

        return [
          'return' => false,
          'data' => [],
        'message' => 
        "Encontrei um erro muito sério 😓 {$e->getMessage()}",
        ];

      }
     }  */

     public function tryCatchFunction2($id){

      try{

       // $sql = "SELECT * FROM lgn_logins  WHERE idLogin = :id";
        $sql = "SELECT * FROM lgn_logins LIMIT 10";


      // prepere
       $stmt = $this->db->prepare($sql);

      // bindParam
     // $stmt->bindParam(':id', $id);

      // execute
      $stmt->execute();

       if($stmt->rowCount() > 0){

        return [
          'return' => true,
          'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
          'message' => 'Dados retornados com sucesso =)'
        ];        
       }

       return [
        'return' => false,
        'data' => [],
        'message' => 'Não encontrei dados =/'
      ];        


      } catch(Exception $e){

        return [
          'return' => false,
          'data' => [],
          'message' => "Ocorreu um erro {$e->getMessage()}",
        ];        

      }

     }

   
  
    
  }