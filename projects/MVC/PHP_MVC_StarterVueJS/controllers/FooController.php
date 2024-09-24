<?php
class FooController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        $this->loadTemplate('foo');   
        exit;
    }

 

}