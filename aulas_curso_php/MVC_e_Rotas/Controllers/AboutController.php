<?php 

namespace Controllers;
 class AboutController extends Controller {
  
  // method construtor
  public function __construct(){
    $this->view = new \Views\MainView('about'); 
    /*✅ header2 == custom header */
  }

  public function executar(){
    $this->view->render(array('titulo' => 'About')); 
    //echo '<h1>pagina contato executada</h1>';
  }
 }
?>