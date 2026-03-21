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

    echo '<h2>exampleThrowable</h2>';
    print_r($res);

    echo '<h2>exampleThrowableINSERT</h2>';
    print_r($res2);

    echo '<h2>exampleThrowableINSERT2</h2>';
    print_r($conf->exampleThrowableINSERT2());


    echo '<h2>exampleThrowableINSERT_bind_loop</h2>';
    print_r($conf->exampleThrowableINSERT_bind_loop());
    exit;
  }
}
