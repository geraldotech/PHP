<?php
class AxiosController extends Controller {

    public function __construct(){
      parent::__construct();
    }

    public function index(){

      $this->loadTemplate('axios');
      exit;
    }

    public function endpointtest(){
    
      // Captura os dados do POST
    var_dump($_SERVER['REQUEST_METHOD']);

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      echo json_encode(['error' => 'Necessário enviar dados via POST']);
      return;
      } 

      $list = [
        [ "name" => "Geraldo", "age" => 30],
        [ "name" => "Felipe", "age" => 20],
      ];
    
      echo json_encode($list);
    }

    public function buscaWithAxios(){

      $conf = new Axios();

      /* 
      Axios enviar o corpo diretamente como um objeto JavaScript, ele será tratado como JSON, e o PHP não conseguirá interpretá-lo usando $_POST.

      se front enviar usando o objeto usando:
      new URLSearchParams({
        id: '2400', // Enviado como string
      })

      agora sim o PHP interpreta os $_POST[']

      ====================
      preferir enviar JSON no corpo da requisição, configure o PHP para decodificá-lo com file_get_contents
      */

      $data = json_decode(file_get_contents('php://input'), true);
      $id = $data['id'] ?? null;

       // Verifica se o 'id' foi enviado e não está vazio
    if (empty($id)) {
      echo json_encode(['error' => 'ID não foi enviado ou é inválido.']);
      return;
    }

      $res = $conf->fetchUserByAxiosPostTest($id);
      echo json_encode($res);
    }
}