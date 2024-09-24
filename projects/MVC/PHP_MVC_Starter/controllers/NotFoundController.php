<?php
class NotFoundController extends Controller {

    public function __construct() {
        parent::__construct();
      
    }

    public function index() {   
     $this->loadTemplate('404');   


     echo URL;
        exit;
    }

 

}