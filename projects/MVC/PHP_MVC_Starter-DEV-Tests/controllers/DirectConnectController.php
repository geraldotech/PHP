<?php


/* Executando consultas direto no banco de dados ao acessar o controller */

/* BANCO DE DADOS */
define("DB_DATABASE2",   "logins");
define("DB_HOST2",       "db2");
define("DB_USER2",       "root");
define("DB_PASSWORD2",   "root");
define("DB_PORT2",       "3306");

class DirectConnectController extends Controller {

  private $rootUser;

  public function __construct(){

  //Initialize PDO connection
  try {
    $this->rootUser = new PDO("mysql:dbname=" . DB_DATABASE2 . ";charset=utf8;host=" . DB_HOST . ";port=" . DB_PORT2, DB_USER2, DB_PASSWORD2);

    $this->rootUser->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->rootUser->setAttribute(PDO::ATTR_EMULATE_PREPARES, true); 
    $this->rootUser->setAttribute(PDO::ATTR_PERSISTENT , true); 

    echo 'conectado com sucesso!';
  } catch (Exception $e) {
    die($e->getMessage());
  }
}


public function index(){


  // db aqui daria erro, pq so esta disponivel dentro das model
  $qry = "SELECT login FROM lgn_logins LIMIT 5";

  $sql = $this->rootUser->query($qry);      
   return print_r($sql->fetchAll());

}


}