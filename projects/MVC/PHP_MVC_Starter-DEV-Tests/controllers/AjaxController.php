<?php
class AjaxController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
       $this->loadTemplate('ajax'); return; 
    }

    public function gerarNovoRelatorio(){
        // echo json_decode(['1', '2']);
        echo "Relatório gerado com sucesso!";
     }
}