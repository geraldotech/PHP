<?php
class TryCatchThrowableController extends Controller {

  public function __construct() {
    parent::__construct();
    $this->helper = new Helper();
  }

  public function index() {
    $conf = new TryCatchThrowable();
    

    echo '<h2>Throwable Select: </h2>';
    print_r($conf->throwableSelect(2400));
    echo '<br>';
    print_r($conf->throwableSelect(232));
    echo '<br>';
    print_r($conf->throwableSelect());



    echo '<h2>ThrowableINSERT</h2>';
    print_r($conf->throwableINSERT());

    echo '<h2>ThrowableINSERT2</h2>';
    print_r($conf->throwableINSERT2());


    echo '<h2>ThrowableINSERT_bind_loop</h2>';
    print_r($conf->throwableINSERT_bind_loop());

    echo '<h2>Throwable Delete</h2>';
    print_r($conf->throwableDelete(1));
    exit;
  }
}
