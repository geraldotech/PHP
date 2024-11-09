<?php
class Controller {

	protected $helper;
	protected $db;
	protected $config;


	public function __construct() {                
		global $config;
		global $db;


		$this->db = $db;
	}
	
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);

		include 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {	

		include 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData) {
            setlocale(LC_TIME, 'pt_BR');
            date_default_timezone_set('America/Sao_Paulo');
            extract($viewData);

            include 'views/'.$viewName.'.php';
	}

}
