<?php
require_once 'sources/Email/PHPMailerAutoload.php';
require_once 'sources/Email/class.phpmailer.php';
require_once 'sources/Email/TextEmail.php';

$mailer = new PHPMailer;

$mailer->isSMTP(); // Set mailer to use SMTP
$mailer->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mailer->Host = "$email_host";
$mailer->SMTPAuth = true;     // Ativa SMTP authentication
$mailer->IsSMTP();
$mailer->isHTML(true);       // Email em formato HTML
$mailer->Port = "$porta_smtp";         // Porta SMTP(***)

// Ativar condição utf-8, para acentuação
$mailer->CharSet = 'UTF-8';

$mailer->Username = "$seu_email";
$mailer->Password = "$email_senha";

$mailer->AddAddress("$address");
$mailer->AddAddress("$seu_email", "Miguel");
$mailer->From = "$seu_email";
$mailer->Sender = "$seu_email";
$mailer->FromName = "$seu_nome";

// assunto da mensagem
$mailer->Subject = $assunto;
$mailer->MsgHTML($corpoMSG);

// anexar arquivo
$arquivo = "chamada-certificado/certificados/$nome.pdf";
$mailer->AddAttachment($arquivo);

if(!$mailer->Send()) {
   echo "\nErro: " . $mailer->ErrorInfo;
  } else {
   echo "\nMensagem enviada com sucesso!";
  }