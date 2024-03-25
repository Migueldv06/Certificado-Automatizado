<?php

$data = "05/02/2024 a 06/03/2024";
$horas = "54";
$curso = "Cloudera Data Plataform";

$nomes = Array();
$file = fopen('Nome.csv', 'r');
$linha = 1;
while (($line = fgetcsv($file)) !== false)
{
  if ($linha < 50){
    $nome = implode('',$line);
    $assunto = "Boa Tarde $nome";
    $mensagem = "Seu Certificado de $curso foi emitido";
    //$email = "miguel@ambientelivre.com.br";


include_once 'SVG/SVG.php';


file_put_contents("$nome..svg", $SVG);

exec("inkscape --export-type=\"pdf\" '$nome'..svg");

exec("pdfunite '$nome'..pdf Certificadoverso.pdf '$nome'.pdf");

exec("rm '$nome'..svg");

exec("rm '$nome'..pdf");

include 'envia_email.php';
//require 'envia_email.php';
  }
  $linha++;
    
}



fclose($file);