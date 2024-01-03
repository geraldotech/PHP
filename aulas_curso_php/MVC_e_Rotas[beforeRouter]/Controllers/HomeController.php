<?php 

namespace Controllers;
 class HomeController {

    // method construtor
    public function __construct(){
      $this->view = new \Views\MainView('home');
    }


  public function executar(){
    //echo '<h1>Home Page</h1>';
    $this->view->render(array('titulo' => 'Home'));
  }
 }
?>