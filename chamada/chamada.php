<?php

$presença_aluno = 0;
$conta_data = 1;

  while (file_exists("logs/log$conta_data.txt"))
  {
  include "chamada/Confere_logs.php";
  if($presença == 1)
  {
    array_push($lista_entrada, "$nome entrou no dia:$conta_data\n");
    $presença_aluno++;
  }
  $conta_data++;
  }
  $conta_data--;
  if ($presença_aluno >= $conta_data*0.75)
  {
    //include 'TextEmail/TextEmail.php';
    //include 'SVG/SVG.php';
    //include 'Email/envia_email.php';
    array_push($aprovados, "$nome esta aprovado\n");
  }
  echo $conta_data;
  if ($presença_aluno < $conta_data*0.75)
  {
    array_push($reprovados, "$nome esta reprovado\n");
  }
  $presença_aluno = 0;