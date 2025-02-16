<?php

/* Serialize + fetch POST vanilla JS */
class SerializeController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {   
        if(isset($_GET['acao'])){
            print_r($_POST);        
          //  exit;
        }
       $this->loadTemplate('serialize'); 
    }

    public function endpoint(){
        $data = json_decode(file_get_contents('php://input'), true);
        if(!empty($data)){
            echo json_encode($data); return;
        }

        if(!empty($_POST)){
            echo json_encode($_POST); return;
        }

        http_response_code(404);
        echo json_encode(['error' => 'nenhum parametro foi enviado ou headers tão estão em comformidade']);
    }
}