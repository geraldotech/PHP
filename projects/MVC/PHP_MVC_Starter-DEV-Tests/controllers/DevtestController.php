<?php
class DevtestController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->helper = new helper();
     
    } 
  
  /* === Routes === */  
  public function index() {   

    $conf = new Devtest();
    $data = [];

    // Check if the instance is valid
    if ($conf instanceof Devtest) {
    // echo "Instance validada com sucesso ";
    } else {
      echo "Failed to create instance.";
    }

    // static string
    $data['name'] = 'Geraldo';
    
    /**  @see array from model */
    $lista = $conf->helloPessoas();
    $data['lista'] = $lista;


    /** 
     * @throws consultaLogin
     * @return  tryCatch
     * */ 
    $data['consultaLogin'] = $conf->consultaLogin();

    
    /** @return verbose e capturando retornos  */
    //print_r($data['consultaLogin']['all']);
    //print_r($data['consultaLogin']['message']);

    // if(!$data['consultaLogin']['return']){
    //   echo($data['consultaLogin']['message']);
    //   echo($data['consultaLogin']['error']);
    // }
    
    // if($data['consultaLogin']['return']){
    //   echo($data['consultaLogin']['message']);
    //   echo '<hr>';
    //   print_r($data['consultaLogin']['data']);
    //   echo '<hr>';
    //   echo '<h2 style="color: red;">all returns</h2>';
    //   print_r($data['consultaLogin']);
    // } 
 
    /** @see single return */
    //print_r($data['consultaLogin']);    
    //exit; 

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
   
    /** 
    * @throws isabellaTryCatch
    * @return  tryCatch
    * */ 

   $isa = $conf->isabellaTryCatch();

    //get all arr data
    print_r($isa);
    print_r("<p>{$isa['message']}</p>");

    // dois modos de verificar se nao tiver data
    if(!$isa['data']){
     // echo "<p> {$isa['message']} </p>";
    }    
    if(empty($isa['data'])){
      //echo $isa['message'];
    }


    $justStr = 'Leona'; 
    echo "<p> $justStr </p>"; // interpolação de strings

    $arr = ['Alpha', 'Bravo', 'Charlie'];
     print_r("<b>{$arr[0]}</b>"); 
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

        /** 
   * @throws PraticandoQueries
   * @return  tryCatch__against_SQL_injections
   * @since 14/09/2024
   * @author Geraldo Developer dev@geraldox.com
  * @version 1.0
  * @var "SELECT * FROM z_sga_param_login WHERE idLogin = '2020032'"
    * */ 

  $tryCatchFunction = $conf->tryCatchFunction2('2400');

    if($tryCatchFunction['return']){
    // print_r("<h2 style='text-align:center;color: green'>{$tryCatchFunction['message']}</h2>");
    //print_r($tryCatchFunction['data']);
  }

  if(!$tryCatchFunction['return']){
    print_r("<h2 style='text-align:center;color: red'>{$tryCatchFunction['message']}</h2>");
  }

  $data['tryCatchFunction'] = $tryCatchFunction['data'];

    // carrega a view
    $this->loadTemplate('Devtest', $data);   
  }
  
  /* === Routes Aninhadas === */
  public function about() {  
    // carrega a view
    $this->loadTemplate('about');   
  }  

  /* ===  Requisições AJAX === */

  // Exemplo de Ajax, 
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

}