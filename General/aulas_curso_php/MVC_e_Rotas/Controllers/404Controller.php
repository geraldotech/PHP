<?php 

namespace Controllers;
 class page404Controller {

    // method construtor
    public function __construct(){
      $this->view = new \Views\MainView('404page');
    }


  public function index(){
    //echo '<h1>Home Page</h1>';
    $this->view->render();
  }
 }
?>