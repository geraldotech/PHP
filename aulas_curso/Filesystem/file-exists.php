<?php

if(file_exists('file.txt')){
	echo 'arquivo existe';
}else{
	$content = "Meu novo conteudo 22";
	file_put_contents('file.txt', $content);
}
?>