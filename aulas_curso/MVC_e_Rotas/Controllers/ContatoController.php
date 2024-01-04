<?php 

  namespace Controllers;
  class ContatoController extends Controller {

  // method construtor


  public function executar(){
    if(isset($_POST['acao'])){
      //echo 'Email enviado';
      \Models\ContatoModel::sendEmailNow();
      echo '<script>location.href="'.INCLUDE_PATH.'contato/sucesso"</script>';
      die();
    }

    \Router::rota('contato/?', function($par){
      echo $par[1];
      $this->view = new \Views\MainView('contato-sucesso');
      $this->view->render(array('titulo' => 'Contato', 'titulo2' => 'Contato 2'));
    });

    \Router::rota('contato', function(){
      $this->view = new \Views\MainView('contato');
      $this->view->render(array('titulo' => 'Contato', 'titulo2' => 'Contato 2'));
    });

   /*  if($_GET['url'] == 'contato/2'){
      echo 'pagina 2';
    } */

   
    //echo '<h1>pagina contato executada</h1>';
  }
 }
?>