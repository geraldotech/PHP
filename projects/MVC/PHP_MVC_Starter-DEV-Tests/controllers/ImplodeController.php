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
        $data = []; 

        // fazendo consulta aqui para exemplo apenas, a boa pratica seria fazer apenas na model
        $sql = "SELECT * FROM lgn_logins";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $data['logins'] = $sql->fetchAll();
        }      
       
        $this->loadTemplate('implode', $data);   
        exit;
    }

    /* === implode === */
    /* A função implode() no PHP é usada para juntar os elementos de um array em uma única string, usando um delimitador que você especifica. 
    exemplo com in onde deve receber strings.
    */
    public function filtrausuarios(): void {
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
     * @return void
     * @throws A função implode() + foreach chama a FN para cada value
    */
    public function setusuarios(): void {
        $uids = isset($_POST['uid']) ? $_POST['uid'] : [];
        $newTotvs = isset($_POST['newTotvs']) ? $_POST['newTotvs'] : [];

        
        $uncheckall = isset($_POST['uncheckall']) ? 1 : null;
        //confirmar que $uncheckall sempre será tratado como um valor booleano, outra opção seria:
       // $uncheckall = !empty($_POST['uncheckall']);

    
        // Verifica se nenhuma opção foi selecionada e não há o uncheckall
        if (empty($uids) && !$uncheckall) {
            echo 'Selecione uma opcao';   return;    
        }

        $res = [];
    
        // Se o uncheckall estiver definido, executa a lógica sem precisar de $uids
        if ($uncheckall) {
            $res = $this->implodeAnd->setusuarios(null, $newTotvs, $uncheckall);
            if ($res['ok']) {
               // echo $res['message'];
            }
        } else {
            // Executa o loop para cada ID em $uids
            foreach ($uids as $id) {
                $res = $this->implodeAnd->setusuarios($id, $newTotvs, $uncheckall);
                if ($res['ok']) {
                  //  echo $res['message'];
                }
            }
        }

        echo '<h2>';
        print_r($res);  
        echo '</h2>';
        exit;
    }
    
}