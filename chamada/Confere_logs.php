<?php

$presença = 0;
$arquivo_chamada = fopen("logs/log$conta_data.txt", 'r');
while (($linha = fgetcsv($arquivo_chamada)) !== false)
{
    $logs = implode('',$linha);

    if (str_contains($logs, $nome)) 
    {
    $presença = 1;
    break;
    }
    elseif (str_contains($logs, $address))
    {
    $presença = 1;
    break;
    }
}
fclose($arquivo_chamada);