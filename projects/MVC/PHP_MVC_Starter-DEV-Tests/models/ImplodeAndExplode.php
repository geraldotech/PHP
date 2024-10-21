<?php
class ImplodeAndExplode extends Model {

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

    // setar todos null 
    //UPDATE z_sga_param_login SET idTotovs = NULL WHERE idLogin in (2400, 6969)
    public function setusuarios($id){
      $sql = "UPDATE lgn_logins SET idTotovs = '123' WHERE idLogin = $id";
      $sql = $this->db->query($sql);

      if($sql){
        return [
          'return' => true,
          'message' => 'Dados alterados com sucesso',
        ];
      }
      return [
        'return' => false,
        'message' => 'No row was alterado',
      ];
    }

  }