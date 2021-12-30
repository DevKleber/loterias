<?php

require_once '../DB.php';
require_once 'config/Crud.php';
require_once 'megasena.php';
//

$megasena = new megasena();
//
$acao = $_REQUEST['acao'];

switch ($acao) {
    case "incluirNumeros":
        $megasena->saveNumeros();
        break;
    case "alterExercicio":
        $megasena->alterExercicio();
        break;
    case "incluirTreino":
        $megasena->saveTreino();
        break;
    case "incluirPeso":
        $megasena->savePeso();
        break;

    default:
        break;
}