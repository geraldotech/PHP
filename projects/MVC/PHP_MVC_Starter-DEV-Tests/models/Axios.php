<?php
class Axios extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function fetchUserByAxiosPostTest($id){
      try {
        $sql = "SELECT * FROM lgn_logins WHERE idLogin = $id";
        $sql = $this->db->query($sql);

        if($sql->rowCount()>0){
          return [
            'ok' => true,
            'data' => $sql->fetch(),
          ];
        }

        return [
          'ok' => false,
          'data' => [],
          'message' => "Nenhum usuario encontrado com o id solicitado"
        ];

      } catch(Exception $e){
        return [
          'ok' => false,
          'data'=> [],
          'message' => "Ocorreu um erro $e",
        ];
    }
  }

  }