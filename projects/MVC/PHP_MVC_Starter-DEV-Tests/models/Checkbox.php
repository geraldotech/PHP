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
     
      try{
         // desativa todos
      $sql = "UPDATE lgn_logins SET is_active = 0";
      $this->db->query($sql);

      // no caso de desativar todos os checkboxs
      if(empty($users)){
        return [
          'ok' => true,
          'data' => [],
          'message' => 'Todos os checkbox foram desativados'
        ];
      }
      // atualiza todos
      $updated = "UPDATE lgn_logins SET is_active = 1 WHERE idLogin IN ($users)";
      $updated =  $this->db->query($updated);

       if($updated->rowCount() > 0){
          return [
            'ok' => true,
            'message' => 'Dados atualizados com sucesso'
          ];
       }

       return [
        'ok' => false,
        'error' => 'Erro ao atualizar'
      ];

        }catch(Exception $e){
          return [
            'ok' => false,
            'error' => $e->getMessage()
        ];
      } 
  }
}


