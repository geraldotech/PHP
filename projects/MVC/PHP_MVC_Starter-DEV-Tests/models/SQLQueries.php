<?php
class SQLQueries extends Model {

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
  }