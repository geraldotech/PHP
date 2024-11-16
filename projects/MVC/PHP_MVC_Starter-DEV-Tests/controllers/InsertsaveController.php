<?php
class InsertsaveController extends Controller {

    private $insertData;

    public function __construct() {
        parent::__construct();

        $this->insertData = new Insert();
    }

    public function index(): void {   
    $data = [];    
    $data['list'] = $this->insertData->listaAnotacoes();
    $this->loadTemplate('insert', $data);   
    return;
    }   

    /* 
    * addslashes() Function
    * Se insetior author como gera'ldo vai ocorrer um erro na inserção dos dados
    * SQLSTATE[42000]: Syntax error or access violation: 1064
    * Usar addslashes pode parecer uma solução rápida, mas não é a forma mais segura de tratar esse tipo de problema. Em vez disso, recomenda-se utilizar prepared statements para prevenir erros e proteger contra injeção de SQL.
    */
    public function saveData() {        
    // protecao forces be POST
    if(empty($_POST)){
        echo 'deve ser post';
        return;
    }      

    if(isset($_POST['author']) && isset($_POST['usertext'])){
    $author = $_POST['author'];
    $usertext = $_POST['usertext'];
    // print_r($author);
    // print_r($usertext);
    print_r([$usertext, $author]);
    echo '<br>';
    var_dump($author, $usertext);

    $conf = new Insert();
    $res = $conf->insertData2($author, addslashes($usertext));

    if($res['ok']){
        print_r($res['message']);
    }
    } 
}
}