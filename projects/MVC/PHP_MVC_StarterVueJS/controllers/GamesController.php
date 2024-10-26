<?php
class gamesController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   
        $this->loadTemplate('games');   
        exit;
    }

}