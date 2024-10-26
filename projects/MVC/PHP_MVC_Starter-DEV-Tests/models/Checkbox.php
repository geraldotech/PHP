<?php
class Checkbox extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function listLogins(){

      try{
        $sql = "SELECT nomeUsuario, is_active, idLogin FROM lgn_logins LIMIT 5";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
          return [
            'return' => true,
            'data' => $sql->fetchAll(),
            'message' => 'dados ok'
          ];
        }

        return [
          'return' => false,
          'data' => [],
          'message' => 'no data found'
        ];


      } catch(Exception $e){

        return [
          'return' => false,
          'data'=> [],
          'message' => "Ocorreu um erro $e",
        ];
      }
    }

    public function handleUpdateUsers($users){
      // desativa todos
      $sql = "UPDATE lgn_logins SET is_active = 0";
      $this->db->query($sql);

      // atualiza todos
      $updated = "UPDATE lgn_logins SET is_active = 1 WHERE idLogin IN ($users)";
      $updated =  $this->db->query($updated);

       if($updated->rowCount() > 0){
          return [
            'return' => true,
            'message' => 'Dados atualizados com sucesso'
          ];
       }
    }
}


