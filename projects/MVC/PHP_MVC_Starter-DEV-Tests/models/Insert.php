<?php
class Insert extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function insertData(string $author, string $usertext): Array{

      try{

        $sql = "INSERT INTO anotacoes (text, author) VALUES ('$usertext', '$author')";

        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0){
          return [
            'ok' => true,
            'message' => 'Registro criado com sucesso'
          ];
        }

        return [
          'ok' => false,
          'message' => 'Erro ao criar registro',
        ];


      } catch(Exception  $e){
        return [
          'ok' => false,
          'message' => 'Erro ao criar registro',
          'error' => $e->getMessage()
        ];
      }
    }

    // alternativo ao addslash é usar prepared 

    public function insertData2(string $author, string $usertext): Array{

      try{
        // Usando placeholders para evitar injeção de SQL
        $sql = "INSERT INTO anotacoes (text, author) VALUES (:usertext, :author)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
          ':usertext' => $usertext,
          ':author' => $author,
        ]);

        if($stmt->rowCount() > 0){
          return [
            'ok' => true,
            'message' => 'Registro criado com sucesso'
        ];
        }

        return [
          'ok' => false,
          'message' => 'Erro ao criar registro',
      ];


      } catch(Exeption $e){
        return [
          'ok' => false,
          'message' => 'Erro ao criar registro',
          'error' => $e->getMessage()
      ];
      }

    }

    public function listaAnotacoes(){
      try{

        $query = "SELECT * FROM anotacoes";
        $query = $this->db->query($query);

        if($query->rowCount() > 0){

          return [
            'ok' => true,
            'data' => $query->fetchAll(),
          ];
        }
        
        return [
          'ok' => false,
          'data' => [],
        ];
        
      } catch(Exeption $e){

        return [
          'ok' => false,
          'message' => 'Erro ao criar registro',
          'error' => $e->getMessage()
        ];

      }
    }
}