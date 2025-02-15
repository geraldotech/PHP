<?php
class Implode extends Model {

    public function __construct(){
        parent::__construct();
    }

    function filtraUsuarios($ids){
      $sql = "SELECT * FROM lgn_logins WHERE idLogin in ($ids)";
      $sql = $this->db->query($sql);

      if($sql->rowCount() > 0){
        return $sql->fetchAll();
      }
      return [];
    }

      /** 
     * UPDATE SEM WHERE!!!  
     * para setar todos null => UPDATE lgn_logins SET idTotovs = NULL WHERE idLogin in (2400, 6969)
     * @return Array
     * */ 
    public function setusuarios(string $id = null, string $newTotvs = null, bool $uncheckall = null): Array {

      if($uncheckall){
        $qty = "UPDATE lgn_logins SET idTotovs = NULL";
        $qty = $this->db->query($qty);

        return [
          'ok' => true,
          'message' => 'Todos os logins setados para NULL'
        ];
      }

      $sql = "UPDATE lgn_logins SET idTotovs = '$newTotvs' WHERE idLogin = $id";
      $sql = $this->db->query($sql);

      if($sql){
        return [
          'ok' => true,
          'message' => 'Dados alterados com sucesso',
        ];
      }
      return [
        'ok' => false,
        'message' => 'No row was alterado',
      ];
    }

  }