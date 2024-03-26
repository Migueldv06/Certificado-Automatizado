<?php

$data = "05/02/2024 a 06/03/2024";
$horas = "54";
$curso = "Cloudera Data Plataform";
$emailhost = "mail.seuDominio.com.br";//coloque seu dominio de email
$email = "Seu@Email.com.br";//coloque o email de saida
$emailsenha = "SuaSenha";//coloque a senha do seu email

$nomes = Array();
$file = fopen('Nome.csv', 'r');
$linha = 1;
while (($line = fgetcsv($file)) !== false)
{
  if ($linha < 50){
    $emaildestino = "Email@Destino.com.br";//coloque o email 
    $nome = implode('',$line);
    $assunto = "Boa Tarde $nome";
    $mensagem = "Seu Certificado de $curso foi emitido";


include_once 'SVG/SVG.php';


file_put_contents("$nome..svg", $SVG);

exec("inkscape --export-type=\"pdf\" '$nome'..svg");

exec("pdfunite '$nome'..pdf Certificadoverso.pdf '$nome'.pdf");

exec("rm '$nome'..svg");

exec("rm '$nome'..pdf");



include 'envia_email.php';

  }
  $linha++;
    
}



fclose($file);