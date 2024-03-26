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


//$arquivo   = $_FILES["arquivo"];


$mailer->Host = "$emailhost";
$mailer->SMTPAuth = true;     // Enable SMTP authentication
$mailer->IsSMTP();
$mailer->isHTML(true);       // Set email format to HTML
$mailer->Port = 587;

// Ativar condição utf-8, para acentuação
$mailer->CharSet = 'UTF-8';

$mailer->Username = "$email"; // SMTP username
$mailer->Password = "$emailsenha";    // SMTP password
// email do destinatario
$address = "$emaildestino";

//$mailer->SMTPDebug = 1;
$corpoMSG = "$mensagem";

$mailer->AddAddress($address, "$nome");
//$mailer->AddAddress("conta@gmail.com", "destinatario 2"); // 2º destinatário se querer enviar, se não, comente com //
$mailer->From = "$email";
$mailer->Sender = "$email";
$mailer->FromName = ""; // Seu nome
// assunto da mensagem
$mailer->Subject = $assunto;
// corpo da mensagem
$mailer->MsgHTML($corpoMSG);
// anexar arquivo
//$mailer->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );


if(!$mailer->Send()) {
   echo "Erro: " . $mailer->ErrorInfo;
  } else {
   echo "Mensagem enviada com sucesso!";
  }