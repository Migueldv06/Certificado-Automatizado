<?php
$presença_aluno = 0;
$conta_data = 0;
array_push($planilha, "\n$nome,$address");
foreach ($arquivo_data as $data) {
  $conta_data++;
  $presente = false;

  $arquivo_chamada = fopen("sources/logs/log$data.txt", 'r');
  while (($linha = fgetcsv($arquivo_chamada)) !== false) {
    $logs = implode('', $linha);

    if (str_contains($logs, $nome) || str_contains($logs, $address)) {
      array_push($planilha, ",presente");
      $presença_aluno++;
      $presente = true;
      break;
    }
  }
  fclose($arquivo_chamada);

  if (!$presente) {
    array_push($planilha, ",falta");
  }
}
include 'sources/SVG.php';
if ($presença_aluno >= $conta_data * 0.75) {
  //include 'sources/Email/envia_email.php';

  array_push($planilha,",APROVADO");
} else {
  array_push($planilha,",REPROVADO");
}
$presença_aluno = 0;
