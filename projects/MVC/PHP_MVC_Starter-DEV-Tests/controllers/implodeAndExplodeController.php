<?php
class implodeAndExplodeController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->implodeAnd = new implodeAndExplode();
      
    }

    public function index() {   
        $this->loadTemplate('implodeAndExplode');   
        exit;
    }


    /* A função implode() no PHP é usada para juntar os elementos de um array em uma única string, usando um delimitador que você especifica.  */
    public function filtrausuarios(){
        $userid = isset($_POST['userid']) ? $_POST['userid'] : [];

        $imploUser = implode(", ", $userid);

          print_r($imploUser);
           echo '<hr>'; 
          
       $res = $this->implodeAnd->filtraUsuarios($imploUser);

       print_r($res);
        
    }

    /* foreach chama a FN para cada value */
    public function setusuarios(){
        $uids = isset($_POST['uid']) ? $_POST['uid'] : [];

        if(empty($uids)){
            echo 'Seleciona uma opcao';
            return false;
        }

        $res = [];
        foreach($uids as $id){
            $res = $this->implodeAnd->setusuarios($id);
          //  echo "Usuário com ID $id atualizado.\n";            
        }
        print_r($res);  
        exit;
    }

    public function exampledata(){
        $data = $_POST['updateGetUpdate'];
         print_r($data); 

        foreach($data as $val){
            $parts = explode('-', $val);         
            $a = $val[0];
            $b = $val[1];

             print_r($a . ' == parts == ' . $b); 
              echo '<hr>'; 
             print_r($parts); 
        }
    }

}