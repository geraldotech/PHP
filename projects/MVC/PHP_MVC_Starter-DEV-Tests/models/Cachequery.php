<?php
class Cachequery extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function listUsuarios(){
     
      try{

        $sql = "SELECT * FROM lgn_logins";
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
          'message' => 'no data found!'
        ];


      } catch(Exception $e){

        return [
          'return' => false,
          'data' => [],
          'message' => $e->getMessage()
        ];

      }
    }
  }