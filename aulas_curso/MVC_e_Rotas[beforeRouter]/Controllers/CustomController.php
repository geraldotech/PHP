<?php 

namespace Controllers;
 class CustomController extends Controller {
  
  // method construtor
  public function __construct(){
    $this->view = new \Views\MainView('custom', 'header2'); 
    /*✅ header2 == custom header */
  }

  public function executar(){
    $this->view->render(array('titulo' => 'custom Header')); 
    //echo '<h1>pagina contato executada</h1>';
  }
 }
?>