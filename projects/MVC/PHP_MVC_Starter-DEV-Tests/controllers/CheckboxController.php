<?php
class CheckboxController extends Controller {

    private $check;

    public function __construct() {
        parent::__construct();
       // $this->helper = new Helper();
        $this->check = new Checkbox();
    }
    
    public function index() {   
      $data = [];

      $res = $this->check->listLogins();
      if($res['return']){
        $data['list'] = $res['data'];
      }
      $this->loadTemplate('checkbox', $data);
      exit;
    }

    public function recebidos(){
      $selected = isset($_POST['selecionados']) ? $_POST['selecionados'] : [];
      $selectedImplo = implode(',', $selected);

     $res =  $this->check->handleUpdateUsers($selectedImplo);
     if($res['ok']){
    //  echo $res['message'];
      //exit;
      $this->helper->setAlert('success', $res['message'],'Checkbox/');
     }

     if(!$res['ok']){
      echo $res['error'];
     }

    }
}
