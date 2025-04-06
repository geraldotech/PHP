<?php

/* Endpoint exemplos recebendo serialize forms ou JSON */
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

    public function endpoint1(){
        echo json_encode($_POST);
    }

    public function endpoint2(){
        $data = json_decode(file_get_contents('php://input'), true); // Decodifica JSON recebido

        echo json_encode(['ok' => true, 'data' => $data]);
    }

    public function endpoint3(){
        echo json_encode($_POST);
    }
    public function endpoint4(){
        echo json_encode($_POST);
    }
}