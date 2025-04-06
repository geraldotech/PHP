<?php
class AjaxjqueryController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
       $this->loadTemplate('ajaxjquery'); return; 
    }

    public function gerarNovoRelatorio(){
        // echo json_decode(['1', '2']);
        echo "Relatório gerado com sucesso!";
     }
}