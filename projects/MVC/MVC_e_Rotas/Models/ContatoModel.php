<?php 
 namespace Models;

 class ContatoModel{

/*   public static function enviarFormulario(){
    $mail new \Email('vps.dankicode.com', 'teste@dankide.com', 'gui12345', 'Guilherme');
    $mail>addAdress('testes@danki.com', 'Guilhermte');
    $mail->formatarEmail(array('assunto'=>'Mensagem do site', 'corpo' => 'Aqui é uma mensagem do site'));
    $mail>sendMail();
  }
 */

  public static function sendEmailNow(){
    echo 'Email Enviado from class contatoModel';
    echo '<script>alert("A mensagem foi enviada com sucesso!")</script>'; 
  }

 }


?>