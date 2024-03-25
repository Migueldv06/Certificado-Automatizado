<?php
require_once 'Email/PHPMailerAutoload.php';
require_once 'Email/class.phpmailer.php';


$mailer = new PHPMailer;


//$mailer->SMTPDebug = 2; // Enable verbose debug output

$mailer->isSMTP(); // Set mailer to use SMTP

$mailer->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


//$nome = 'miguel';
//$assunto = 'tts';
//$mensagem = 'teste msg'; 
//$arquivo = "$nome.pdf";
$arquivo   = $_FILES["$nome.pdf"];


$mailer->Host = 'smtp.ambientelivre.com.br';
$mailer->SMTPAuth = true;     // Enable SMTP authentication
$mailer->IsSMTP();
$mailer->isHTML(true);       // Set email format to HTML
$mailer->Port = 587;

// Ativar condição utf-8, para acentuação
$mailer->CharSet = 'UTF-8';

$mailer->Username = 'miguel@ambientelivre.com.br'; // SMTP username
$mailer->Password = '#Migueldv1';    // SMTP password
// email do destinatario
$address = 'miguel@ambientelivre.com.br';

//$mailer->SMTPDebug = 1;
$corpoMSG = "$mensagem";

$mailer->AddAddress($address, "$nome");
//$mailer->AddAddress("conta@gmail.com", "destinatario 2"); // 2º destinatário se querer enviar, se não, comente com //
$mailer->From = 'miguel@ambientelivre.com.br';
$mailer->Sender = 'miguel@ambientelivre.com.br';
$mailer->FromName = "Miguel"; // Seu nome
// assunto da mensagem
$mailer->Subject = $assunto;
// corpo da mensagem
$mailer->MsgHTML($corpoMSG);
// anexar arquivo
$mailer->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );

if(!$mailer->Send()) {
   echo "Erro: " . $mailer->ErrorInfo;
  } else {
   echo "Mensagem enviada com sucesso!";
  }