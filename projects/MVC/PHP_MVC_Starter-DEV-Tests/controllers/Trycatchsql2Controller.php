<?php
class Trycatchsql2Controller extends Controller {

  public function __construct() {
    parent::__construct();
    $this->helper = new Helper();
  }

  public function index() {
    $data = [];
    $conf = new TryCatchThrowable();
     $res = $conf->exampleThrowable();  
    $res2 = $conf->exampleThrowableINSERT();
    print_r($res);
    //print_r($res2);
    /**  @see array from model */
    /*       
          */

    exit;

    //$this->loadTemplate('trycatch', $data);
  }
}
