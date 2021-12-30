<?php

require_once '../../DB.php';
include_once '../../function/funcoes.php';

$sql = "SELECT * FROM tb_reuniao ";
$stmt = DB::prepare($sql);
$stmt->execute();
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
$select = $stmt->fetchAll();
$ar = array();
foreach ($select as $value) {
    $ar []= array(
        "date" => $value->dt_reuniao,
        "type" => "meeting",
        "title" => $value->no_titulo,
        "description" => $value->ds_reuniao."<br />Convidado especial: ".$value->no_convidado,
        "url" => ""
    );
}


//
//$ar = array(
//);
print json_encode($ar);
