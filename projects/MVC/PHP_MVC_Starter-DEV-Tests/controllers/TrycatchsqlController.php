<?php
class TrycatchsqlController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
    } 
 
    public function index() {   
    
    $conf = new TryCatchSQL();
    /**  @see array from model */
    $lista = $conf->helloPessoas();    
  
    $data['lista'] = $lista['ok'] ? $lista['data'] : $list['message'];

    /** 
     * @throws consultaLogin
     * @return  tryCatch
     * */ 
    $res = $conf->consultaLogin();
    $data['consultaLogin'] =  $res;

    
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
     * @throws PraticandoQueries
     * @return  tryCatch__against_SQL_injections
     * @since 14/09/2024
     * @author Geraldo Developer dev@geraldox.com
     * @version 1.0
     * @var "SELECT * FROM z_sga_param_login WHERE idLogin = '2020032'"
      * */ 

    $tryCatchFunction = $conf->tryCatchFunction2('2400');
    $data['tryCatchFunction'] = $tryCatchFunction;
    
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

    $this->loadTemplate('trycatch', $data);
  }
}