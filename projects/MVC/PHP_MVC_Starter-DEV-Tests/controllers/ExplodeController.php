<?php
class ExplodeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /* === explode === */
    public function index() {   
        $this->loadTemplate('explode');   
        exit;
    }
        /**
     * @return explode + foreach 
     * @var  A função explode() espera que o segundo argumento seja uma string, e passar um array causará uma falha.
     * */ 
    public function examplethree(){
        $data = $_POST['updateGetUpdate'];
        echo '<div style="background: coral;">
               <p>start data</p>';
        print_r($data);        
        echo '<p>fim data</p></div>';

        foreach($data as $val){
            $parts = explode('-', $val);         
            $a = $parts[0];
            $b = $parts[1];
         
            print_r($a . ' - ' . $b . ' <br> '); 
            echo '<hr>'; 
            // echo '<hr>'; 
            // print_r($parts[0]); 
            }
        print_r($parts); 
    }

}