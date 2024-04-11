<?php
require_once 'Config.php';

$lista_entrada = array(""); 
$aprovados = array("");
$reprovados = array("");

$file = fopen("$arquivo_csv", 'r');
while (($line = fgetcsv($file)) !== false)
{
  $nome_email_csv = implode('',$line);
  $data_csv = "$nome_email_csv";
  list($nome, $address) = explode("-", $data_csv);
  
  include 'chamada/chamada.php';
}
fclose($file);

file_put_contents("chamada/lista.txt", $lista_entrada);
file_put_contents("chamada/reprovados.txt", $reprovados);
file_put_contents("chamada/aprovados.txt", $aprovados);