<?php
  //print '<pre>';
 //print_r(str_split($dataPremiacao));
// print '</pre>';


$premiacaoTitle = substr($dataPremiacao,0,12);

$premiacaoSena = substr($dataPremiacao,30,28);
$premiacaoSenaResultado = substr($dataPremiacao,91,20);
if($premiacaoSenaResultado == "Não houve acertador"){
	$premiacaoSenaResultado = "Não houve acertador";
}

$premiacaoQuina = substr($dataPremiacao,145,28);
$premiacaoQuinaResultado = substr($dataPremiacao,197,45);

$premiacaoQuadra = substr($dataPremiacao,282,29);
$premiacaoQuadraResultado = substr($dataPremiacao,330,84);
	
$premiacaoPorRegiaoTitle = substr($dataPremiacao,418,22);
$premiacaoPorRegiaoResultado = substr($dataPremiacao,420,19);

$premiacaoArrecadao = substr($dataPremiacao,454,17);
?>


<br /><span onclick="" style="margin-left: 5px; font-size: 2em"> <?= $premiacaoTitle ?> Concurso: <?=$numeroConcurso?></span><br />   <br />

<span onclick="" style="margin-left: 5px; font-size: 1.5em"> <?= $premiacaoSena ?></span><br /> 
<span onclick="" style="margin-left: 8px; font-size: 1em"> <?= $premiacaoSenaResultado ?></span><hr>

<span onclick="" style="margin-left: 5px; font-size: 1.5em"> <?= $premiacaoQuina ?></span><br /> 
<span onclick="" style="margin-left: 8px; font-size: 1em"> <?= $premiacaoQuinaResultado ?></span><hr>

<span onclick="" style="margin-left: 5px; font-size: 1.5em"> <?= $premiacaoQuadra ?></span><br /> 
<span onclick="" style="margin-left: 8px; font-size: 1em"> <?= $premiacaoQuadraResultado ?></span><hr>

<!--<span onclick="" style="margin-left: 5px; font-size: 1.5em"> <?= $premiacaoPorRegiaoTitle ?></span><br /> 
<span onclick="" style="margin-left: 8px; font-size: 1em"> <?= $premiacaoPorRegiaoResultado ?></span><hr>
-->
<span onclick="" style="margin-left: 5px; font-size: 1.5em">Arrecadação total</span><br /> 
<span onclick="" style="margin-left: 8px; font-size: 1em"> <?= $premiacaoArrecadao ?></span><hr>


