<?php

$lista_entrada = array(""); 
$aprovados = array("");
$reprovados = array("");
$presença_aluno = 0;
  
  $conta_data = 1;
  while ($conta_data < 6)
  {
  include "chamada/Confere_logs.php";
  if($presença == 1)
  {
    array_push($lista_entrada, "$nome entrou no dia:$conta_data\n");
    $presença_aluno++;
  }
  $conta_data++;
  }
  if ($presença_aluno >= 3)
  {
    include 'TextEmail/TextEmail.php';
    include 'SVG/SVG.php';
    //include 'envia_email.php';
    array_push($aprovados, "$nome esta aprovado\n");
  }
  if ($presença_aluno < 3)
  {
    array_push($reprovados, "$nome esta reprovado\n");
  }
  $presença_aluno = 0;

file_put_contents("chamada/lista.txt", $lista_entrada);
file_put_contents("chamada/reprovados.txt", $reprovados);
file_put_contents("chamada/aprovados.txt", $aprovados);