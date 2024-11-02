<?php
class ImplodeController extends Controller {

    /* 
    propriedades dinâmicas em PHP 8.2 e versões superiores é considerada deprecated (obsoleta)
    o PHP emitirá um aviso de depreciação, pois essa prática está sendo desencorajada para promover um código mais estruturado e previsível.
    Para evitar esses avisos, a melhor prática é declarar todas as propriedades que você planeja usar dentro da classe, no momento da definição da classe. No seu caso, você precisa declarar a propriedade implodeAnd explicitamente.
    Solução:
    Declare a propriedade implodeAnd dentro da sua classe antes de usá-la. Assim, você estará seguindo as melhores práticas e evitando os avisos de depreciação.
    */
    private $implodeAnd;

    public function __construct() {
        parent::__construct();
        $this->implodeAnd = new Implode();      
    }

    /* === explode === */
    public function index() {         
        $this->loadTemplate('implode');   
        exit;
    }

    /* === implode === */
    /* A função implode() no PHP é usada para juntar os elementos de um array em uma única string, usando um delimitador que você especifica. 
    exemplo com in onde deve receber strings.
    */
    public function filtrausuarios(){
        $userid = isset($_POST['userid']) ? $_POST['userid'] : [];

        if(!empty($userid)){
            $imploUser = implode(", ", $userid);
            $res = $this->implodeAnd->filtraUsuarios($imploUser);
            echo '<h3>';
            print_r($res);
            echo '</h3>';
            echo '<hr>';       
            print_r($imploUser);
            return; // aqui acaba função
        } 
        echo "<h1>Selecionar um user</h1>";            
    }

    /**
     * @return A função implode() + foreach chama a FN para cada value
    */
    public function setusuarios(){
        $uids = isset($_POST['uid']) ? $_POST['uid'] : [];

        // tratando o empty no inicio e return.
        if(empty($uids)){
            echo 'Selecione uma opcao';
            return;
        }
        print_r($uids);
        $res = [];
        foreach($uids as $id){
            $res = $this->implodeAnd->setusuarios($id);
            if($res['ok']){
                echo $res['message'];
            }
           // echo "Usuário com ID $id atualizado.\n";            
        }
        echo '<h2>';
        print_r($res['ok'] ? $res['message'] : '');  
        echo '</h2>';
        exit;
    }
}