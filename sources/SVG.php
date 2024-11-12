<?php

$data_inicio = $datas[0];
$data_fim = end($datas);

$data_certificado = "$data_inicio a $data_fim";

$SVG = <<<SVG
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg
seu svg
</svg>
SVG;


file_put_contents("chamada-certificado/certificados/$nome..svg", $SVG);

exec("inkscape --export-type=pdf chamada-certificado/certificados/'$nome'..svg 2>/dev/null");

exec("pdfunite chamada-certificado/certificados/'$nome'..pdf sources/versos/verso'$curso'.pdf chamada-certificado/certificados/'$nome'.pdf");

exec("rm chamada-certificado/certificados/'$nome'..svg chamada-certificado/certificados/'$nome'..pdf");
echo "certificado do $nome criado\n";
?>
