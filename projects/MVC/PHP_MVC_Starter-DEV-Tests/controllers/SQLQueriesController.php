<?php
class SQLQueriesController extends Controller {

  public function __construct() {
      parent::__construct();
      $this->helper = new Helper();
  } 
  
  public function index() {   

    $conf = new SQLQueries();
    $data = [];

    // Check if the instance is valid
    if ($conf instanceof SQLQueries) {
      $this->helper->setAlert('success', 'Instance validada com sucesso','');
    } else {
      echo "Failed to create instance.";
    }

    // static string
    $data['name'] = 'Geraldo';    

    /** 
    * @throws consultaLogin2
    * @return  ifRowCount
    * */ 

  	// $data['consultaLogin2'] = $conf->consultaLogin2();
    // print_r($data['consultaLogin2']);
    // exit;

    /** 
     * @throws consultaSimples
     * @return  ifRowCount
     * */ 
      
    $data['consultaSimples'] = $conf->consultaSimples();
   // $data['consultaLogin3'] = $conf->consultaLogin3();
    // print_r($data['consultaLogin3']);
    // exit; 

    // Define a mensagem de resposta
    $res['message'] = 'ok';

    // Condição (atualmente sempre falsa)
    if (10 > 1) {
        // Exibe um alerta de sucesso utilizando o helper
        $this->helper->setAlert(
            'return', // Tipo do alerta
            $res['message'], // Mensagem definida anteriormente
            '' // Texto adicional (vazio neste caso)
        );
    }     

    $justStr = 'Leona'; 
    echo "<p> $justStr </p>"; // interpolação de strings

    $arr = ['Alpha', 'Bravo', 'Charlie'];
     print_r("<b>{$arr[0]}</b>"); 
     echo '<hr>';
     echo "<b>$arr[0]</b>"; 

        
     /** 
     * @throws isabellaCustom
     * @return  customByGmapdev
     * */ 

    $bellaCustom = $conf->isabellaCustom();

    // if($bellaCustom['return']){
    //   print_r($bellaCustom['data']);
    // } else {
    //   print_r($bellaCustom['message']);
    //   print_r($bellaCustom['data']);
    // }
                 
    /** 
   * @throws 
   * @return  tryCatch__against_SQL_injections
   * */ 

    // $statement = $conf-> against_SQL_injections('2400', '99999999999');

    // print_r($statement);
    // exit;
    
    // if($statement['return']){
    //   print_r($statement['data']);
    // } else {
    //   print_r($statement['message']);
      
    //   // Se houver um erro capturado
    //   print_r($statement['error'] ?? '');
    // }

    // carrega a view
    $this->loadTemplate('sqlqueries', $data);   
  }
  
  /* === Routes Aninhadas === */
  public function about() {  
    // carrega a view
    $this->loadTemplate('about');   
  }  

  /* ===  Requisições AJAX === */

  /**
   * @return JSON 
   */ 
  public function ajaxNomeDaFuncao(){
    // Obtém o ID do usuário enviado pelo front-end
    $idUsuario = $_POST['idUsuario'];

    // instância a model
    $conf = new CAD006();

    // chamar função com o parâmetro recebido
    $result = $conf->funcaoDaModal($idUsuario);

    // Retorna o resultado em formato JSON para o cliente
    echo json_encode($result);
}


  // Acessar direto no browser => /Devtest/JSONDATA pode ajudar a debugar a resposta antes de implementar no fron-end
  public function JSONDATA(){
 
    $result = [1,2,3,4,4];

    // Retorna o resultado em formato JSON para o cliente
    echo json_encode($result);
}

}