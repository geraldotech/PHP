<?php


$sucess[0] = ['key001'=>'LOGADO COM SUCESSO'];
$error = array ('one','two','three - SENHA INCORRETA');

DEFINE('USER_GERALDO','99124836');
DEFINE ('psw_GERALDO','99124836');


if (USER_GERALDO != psw_GERALDO) {
	echo $sucess[0]['key001'];
} else
echo $error[2];

?>