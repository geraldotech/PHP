<?php
class XXXController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        $this->loadTemplate();   
        exit;
    }
}