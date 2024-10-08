<?php
class CheckboxController extends Controller {

    private $check;

    public function __construct() {
        parent::__construct();
        $this->helper = new Helper();
        $this->check = new Checkbox();
    }
    
    public function index() {   
      $data = [];

      $res = $this->check->listLogins();
      //print_r($res);
      if($res['return']){
        $data['list'] = $res['data'];
      }
      $this->loadTemplate('checkbox', $data);
    }

    public function recebidos(){
      $selected = isset($_POST['selecionados']) ? $_POST['selecionados'] : [];
      $selectedImplo = implode(',', $selected);

     $res =  $this->check->handleUpdateUsers($selectedImplo);
     if($res['return']){

      echo $res['message'];

     // header("Location" . $_SERVER['REQUEST_URI']);
     // exit();
     }
    }
}
