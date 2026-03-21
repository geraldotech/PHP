<?php
class Trycatchsql2Controller extends Controller {

  public function __construct() {
    parent::__construct();
    $this->helper = new Helper();
  }

  public function index() {    
    $conf = new TryCatchThrowable();
    $res = $conf->exampleThrowable();
    $res2 = $conf->exampleThrowableINSERT();

    echo '<h5>exampleThrowable</h5>';
    print_r($res);

    echo '<h5>exampleThrowableINSERT</h5>';
    print_r($res2);

    exit;

    //$this->loadTemplate('trycatch', $data);
  }
}
