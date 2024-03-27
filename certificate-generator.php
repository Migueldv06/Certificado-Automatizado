<?php
require_once 'Config.php';

$nomes = Array();
$file = fopen("$arquivoCSV", 'r');
$linha = 1;
while (($line = fgetcsv($file)) !== false)
{
  if ($linha < 50){
    $nomemail = implode('',$line);
    $data = "$nomemail";
    list($nome, $address) = explode("-", $data);
    $assunto = "Boa Tarde $nome";



include_once 'TextEmail/TextEmail.php';
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