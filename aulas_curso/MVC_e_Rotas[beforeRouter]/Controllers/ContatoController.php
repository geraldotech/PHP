<?php 

namespace Controllers;
 class ContatoController extends Controller {
  
  // method construtor
  public function __construct(){
    $this->view = new \Views\MainView('contato');
  }

  public function executar(){
    if(isset($_POST['acao'])){
      //echo 'Email enviado';
      \Models\ContatoModel::sendEmailNow();
    }
    if($_GET['url'] == 'contato/2'){
      echo 'pagina 2';
    }


    $this->view->render(array('titulo' => 'Contato', 'titulo2' => 'Contato 2'));
    //echo '<h1>pagina contato executada</h1>';

  }
 }
?>