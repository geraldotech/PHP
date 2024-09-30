<?php
class GerarController extends Controller {

    public function __construct() {
        parent::__construct();
      
    }

    public function index() {   

       $this->loadTemplate('gerar'); 
    }

    public function gerarNovoRelatorio(){
        // echo json_decode(['1', '2']);
        echo "Relatório gerado com sucesso!";
     }

}