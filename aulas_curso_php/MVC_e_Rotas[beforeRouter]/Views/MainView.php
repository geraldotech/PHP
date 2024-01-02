<?php 
  namespace Views;

  class MainView {

  private $fileName;
  private $header;
  private $footer;

  const titulo = 'Projeto MVC';
  const me = 'GeraldoCosta';
  public $menuItems = ['Home','Contato', 'About', 'Custom'];

  public function __construct($fileName, $header = 'header', $footer = 'footer'){
    $this->fileName = $fileName;
    $this->header = $header;
    $this->footer = $footer;
}

  public function render($arr = []){
    include('pages/templates/'.$this->header.'.php'); /* header default */
    include('pages/'.$this->fileName.'.php'); // can remove .php
    include('pages/templates/'.$this->footer.'.php');
  }
}
?>