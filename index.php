<?php
// Turn off all error reporting
error_reporting(0);
?>
<html>
    <head>
        <title>Agora vai</title>
        <link rel="stylesheet" href="../include/css/bootstrap.min-4.css?v=2" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>

    </body>
</html>
<style>
    .resultado-loteria > .numbers { margin-bottom: 30px; } 
    .section-text ul { padding: 0; margin: 20px 0 0; margin-bottom: 0px; list-style: none; }
    .resultado-loteria > .numbers > li { font-family: 'futura-lt-book'; }
    .resultado-loteria > .numbers > li { display: inline-block; margin: 0 12px 0 0; font-family: "FuturaWeb",sans-serif; 
        font-size: 2em  ; color: #fff; background: #209869; border-radius: 35px; width: 67px; height: 67px; padding: 15px 0; text-align: center; 
        display: inline-block; vertical-align: middle; line-height: normal;
    }
    /*.fld{width: 200px;float: left;}*/
    .txtCenter{text-align: center};
    /*.div{height: 150px;width: 250px;border: 1px solid black;margin: 10px;};*/
</style>
<?php
$msgErrorMegasena = '';
$megasena = [];
$valorDoJogoMegaSena = 4.50;
$valorDoJogoLotoFacil = 2;
$numerosMegaSenaPrimeiro = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$numerosMegaSenaSegundo = [16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
$numerosMegaSenaTerceiro = [31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];
$numerosMegaSenaQuarto = [46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60];



//$numerosMegaSenaMaisSorteados = ['05', '53', '10', '04', '23', '51', '24', '33', '54', '17', '42', '28', '52', '30', '43', '32', '16', '13', '41', '02', '29', '34', '50', '36', '27', '37', '44', '06', '56', '45', '47', '49', '08', '12', '18', '01', '59', '35', '38', '31', '58', '03', '20', '11', '07', '40', '46', '60', '48', '57', '19', '39', '14', '09', '15', '25', '21', '22', '55', '26'];
$numerosMegaSenaMaisSorteados = ['53','10','05','42','04','37','33','23','27','30','28','54','34','29','43','44','41','35','11','16','17','24','36','51','38','32','49','02','06','13','56','08','52','46','50','18','58','12','45','01','20','25','40','07','57','60','39','19','59','47','09','31','14','48','03','22','15','21','55','26'];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[0];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[1];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[2];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[3];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[4];
$numerosQuentes[] = $numerosMegaSenaMaisSorteados[5];

//$numerosQuentesMegaSena = $numerosMegaSenaMaisSorteados[1];
//print $numerosQuentesUm . ',' . $numerosQuentesDois . ',' . $numerosQuentesTres . ',' . $numerosQuentesQuatro . ',' . $numerosQuentesCinco . ',' . $numerosQuentesSeis;
$msNumeroModoUm = [];
?>
<div class="div" style="float: left">
    <?php
    $contador = 0;
    foreach ($numerosMegaSenaMaisSorteados as $value) {
        if ($value >= 1 && $value <= 15) {
            $contador++;
            if ($contador <= 5) {
                $arMSUm[] = str_pad($value, 2, "0", STR_PAD_LEFT);
                $arMsTodos[] = str_pad($value, 2, "0", STR_PAD_LEFT);
            }
        }
    }
    $msNumeroModoUm[] = gerarNumerosNaoRepetidos(2, $arMSUm);
    ?>
</div>
<div class="div" style="float: left">
    <?php
    $contador = 0;
    foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
        if ($value >= 16 && $value <= 30) {
            $contador++;
            if ($contador <= 5) {
                $arMSDois[] = $value;
                $arMsTodos[] = $value;
            }
        }
    }
    $msNumeroModoUm[] = gerarNumerosNaoRepetidos(1, $arMSDois);
    ?>
</div>
<div class=""style="clear: left"></div>
<div class="div" style="float: left">
    <?php
    $contador = 0;
    foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
        if ($value >= 31 && $value <= 45) {
            $contador++;
            if ($contador <= 5) {
                $arMSTreis[] = $value;
                $arMsTodos[] = $value;
            }
        }
    }
//    var_dump($arMSTreis);
//    $msNumeroModoUm[] = $arMSTreis[mt_rand(0, 4)];
    $msNumeroModoUm[] = gerarNumerosNaoRepetidos(1, $arMSTreis);
    ?>
</div>
<div class="div"style="float: left">
    <?php
    $contador = 0;
    foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
        if ($value >= 46 && $value <= 60) {
            $contador++;
            if ($contador <= 5) {
                $arMSQuatro[] = $value;
                $arMsTodos[] = $value;
            }
        }
    }
//    var_dump($arMSQuatro);
    $msNumeroModoUm[] = gerarNumerosNaoRepetidos(2, $arMSQuatro);
    ?>
</div>
<br />

<?php
$msNumeroModoDois = gerarNumerosNaoRepetidos(6, $arMsTodos, 0, 19);
$msNumeroModoAll = gerarNumerosNaoRepetidosSemArray(6, 1, 60);


// *********************************************** LOTO FÁCIL *************************************
$lotoFacil = [];

$index = 0;
while ($index < 15) {
    $numeroSorteado = str_pad(mt_rand(1, 25), 2, "0", STR_PAD_LEFT);
    if (!in_array($numeroSorteado, $lotoFacil)) {
        $lotoFacil[] = $numeroSorteado;
        $index++;
    }
}

// lotofacil com mais numeros
$lotoFacilMais = [];

$index = 0;
while ($index < 21) {
    $numeroSorteado = str_pad(mt_rand(1, 25), 2, "0", STR_PAD_LEFT);
    if (!in_array($numeroSorteado, $lotoFacilMais)) {
        $lotoFacilMais[] = $numeroSorteado;
        $index++;
    }
}
sort($lotoFacilMais);
// print'<pre>';
// print_r($lotoFacilMais);
// print'</pre>';
if ($_REQUEST['lotofacil']) {
    $numerosEscolhidosLotofacil = explode(",", $_REQUEST['lotofacil']);
    $quantidadeNumerosEscolhidosLotofacil = count($numerosEscolhidosLotofacil);
    if ($quantidadeNumerosEscolhidosLotofacil > 13) {
        $msgErrorLotofacil = 'Escolha apenas 13 numeros. Você escolheu ' . $quantidadeNumerosEscolhidosLotofacil;
    }
    $lotoFacilMais = [];
    $lotoFacilMais = $numerosEscolhidosLotofacil;
}
sort($lotoFacilMais);

$lotoFacilUm       = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6],  $lotoFacilMais[8], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[13], $lotoFacilMais[16], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilDois     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[6], $lotoFacilMais[9],  $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19]];
$lotoFacilTres     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7],  $lotoFacilMais[8], $lotoFacilMais[10], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[18]];
$lotoFacilQuatro   = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[8], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilCinco    = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilSeis     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[7], $lotoFacilMais[8],  $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19]];
$lotoFacilSete     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[9],  $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilOito     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[3], $lotoFacilMais[5], $lotoFacilMais[7], $lotoFacilMais[8], $lotoFacilMais[9],  $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilNove     = [$lotoFacilMais[0], $lotoFacilMais[1], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[8],  $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[14], $lotoFacilMais[16], $lotoFacilMais[18], $lotoFacilMais[20]];
$lotoFacilDez      = [$lotoFacilMais[0], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[7], $lotoFacilMais[8],  $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilOnze     = [$lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7],  $lotoFacilMais[8], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[18], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilDoze     = [$lotoFacilMais[1], $lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[7], $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[17], $lotoFacilMais[18], $lotoFacilMais[20]];
$lotoFacilTrese    = [$lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[8],  $lotoFacilMais[9], $lotoFacilMais[11], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[20]];
$lotoFacilQuatorze = [$lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[8],  $lotoFacilMais[10], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[19]];
$lotoFacilQuinze   = [$lotoFacilMais[2], $lotoFacilMais[3], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[7], $lotoFacilMais[8], $lotoFacilMais[9],  $lotoFacilMais[10], $lotoFacilMais[11], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[16], $lotoFacilMais[19], $lotoFacilMais[20]];
$lotoFacilDezeseis = [$lotoFacilMais[3], $lotoFacilMais[4], $lotoFacilMais[5], $lotoFacilMais[6], $lotoFacilMais[8], $lotoFacilMais[9], $lotoFacilMais[10], $lotoFacilMais[12], $lotoFacilMais[13], $lotoFacilMais[14], $lotoFacilMais[15], $lotoFacilMais[16], $lotoFacilMais[17], $lotoFacilMais[19], $lotoFacilMais[20]];

// *********************************************** LOTO FÁCIL *************************************

$msNumeroModoUm = colocarUnicoArray($msNumeroModoUm);

sort($numerosQuentes);
sort($msNumeroModoUm);
sort($msNumeroModoDois);
sort($msNumeroModoAll);
sort($lotoFacil);

// muitas cartelas ------------------------------------------------------------
$contador = 0;
foreach ($numerosMegaSenaMaisSorteados as $value) {
    if ($value >= 1 && $value <= 15) {
        $contador++;
        if ($contador <= 10) {
            $arMSUm[] = str_pad($value, 2, "0", STR_PAD_LEFT);
            $arMsTodos[] = str_pad($value, 2, "0", STR_PAD_LEFT);
        }
    }
}
$msNumeroModoUm[] = gerarNumerosNaoRepetidos(4, $arMSUm);
$contador = 0;
foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
    if ($value >= 16 && $value <= 30) {
        $contador++;
        if ($contador <= 10) {
            $arMSDois[] = $value;
            $arMsTodos[] = $value;
        }
    }
}
$msNumeroModoUm[] = gerarNumerosNaoRepetidos(3, $arMSDois);
$contador = 0;
foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
    if ($value >= 31 && $value <= 45) {
        $contador++;
        if ($contador <= 10) {
            $arMSTreis[] = $value;
            $arMsTodos[] = $value;
        }
    }
}
$msNumeroModoUm[] = gerarNumerosNaoRepetidos(3, $arMSTreis);

$contador = 0;
foreach ($numerosMegaSenaMaisSorteados as $key => $value) {
    if ($value >= 46 && $value <= 60) {
        $contador++;
        if ($contador <= 15) {

            $arMSQuatro[] = $value;
            $arMsTodos[] = $value;
        }
    }
}
//    var_dump($arMSQuatro);
$msNumeroModoUm[] = gerarNumerosNaoRepetidos(3, $arMSQuatro);
?>
<?php
$msNumeroModoUm = colocarUnicoArray($msNumeroModoUm);

sort($msNumeroModoUm);

if ($_REQUEST['megasena']) {
    $numerosEscolhidosMegasena = explode(",", $_REQUEST['megasena']);
    $quantidadeNumerosEscolhidosMegasena = count($numerosEscolhidosMegasena);
    if ($quantidadeNumerosEscolhidosMegasena > 13) {
        $msgErrorMegasena = 'Escolha apenas 13 numeros. Você escolheu ' . $quantidadeNumerosEscolhidosMegasena;
    }
    $msNumeroModoUm = [];
    $msNumeroModoUm = $numerosEscolhidosMegasena;
}

$jogoUmMegasena = [$msNumeroModoUm[0], $msNumeroModoUm[1], $msNumeroModoUm[2], $msNumeroModoUm[6], $msNumeroModoUm[8], $msNumeroModoUm[11]];
$jogoDoisMegasena = [$msNumeroModoUm[0], $msNumeroModoUm[1], $msNumeroModoUm[3], $msNumeroModoUm[5], $msNumeroModoUm[7], $msNumeroModoUm[9]];
$jogoTresMegasena = [$msNumeroModoUm[0], $msNumeroModoUm[2], $msNumeroModoUm[3], $msNumeroModoUm[4], $msNumeroModoUm[7], $msNumeroModoUm[12]];
$jogoQuatroMegasena = [$msNumeroModoUm[0], $msNumeroModoUm[2], $msNumeroModoUm[3], $msNumeroModoUm[5], $msNumeroModoUm[8], $msNumeroModoUm[10]];
$jogoCincoMegasena = [$msNumeroModoUm[0], $msNumeroModoUm[4], $msNumeroModoUm[9], $msNumeroModoUm[10], $msNumeroModoUm[11], $msNumeroModoUm[12]];
$jogoSeisMegasena = [$msNumeroModoUm[1], $msNumeroModoUm[2], $msNumeroModoUm[4], $msNumeroModoUm[5], $msNumeroModoUm[9], $msNumeroModoUm[12]];
$jogoSeteMegasena = [$msNumeroModoUm[1], $msNumeroModoUm[3], $msNumeroModoUm[5], $msNumeroModoUm[6], $msNumeroModoUm[10], $msNumeroModoUm[11]];
$jogoOitoMegasena = [$msNumeroModoUm[1], $msNumeroModoUm[4], $msNumeroModoUm[6], $msNumeroModoUm[7], $msNumeroModoUm[11], $msNumeroModoUm[12]];
$jogoNoveMegasena = [$msNumeroModoUm[2], $msNumeroModoUm[6], $msNumeroModoUm[8], $msNumeroModoUm[9], $msNumeroModoUm[10], $msNumeroModoUm[11]];
$jogoDezMegasena = [$msNumeroModoUm[3], $msNumeroModoUm[4], $msNumeroModoUm[6], $msNumeroModoUm[8], $msNumeroModoUm[9], $msNumeroModoUm[12]];
$jogoOnzeMegasena = [$msNumeroModoUm[4], $msNumeroModoUm[5], $msNumeroModoUm[7], $msNumeroModoUm[8], $msNumeroModoUm[10], $msNumeroModoUm[12]];


// muitas cartelas ------------------------------------------------------------
?>
<div class="container">
    <h4 class="card-title">Mega-Sena</h4>
    <div class="row">
        <div class=".col-md-12 .col-lg-12 col-sm-3"style="margin-bottom:  25px">
            <div class="card" style="">
                <div class="card-body">
                    <h4 class="card-title">Nºs Quentes</h4>
                    <span class="txtCenter"><?= implode(", ", $numerosQuentes) ?></span>
                </div>
            </div>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-3"style="margin-bottom: 25px">
            <div class="card" style="">
                <div class="card-body">
                    <h4 class="card-title">Jogo Um</h4>
                    <span class="txtCenter"><?= implode(", ", $msNumeroModoUm) ?></span>
                </div>
            </div>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-3" style="margin-bottom: 25px">
            <div class="card" style="">
                <div class="card-body">
                    <h4 class="card-title">Jogo Dois</h4>
                    <span class="txtCenter"><?= implode(", ", $msNumeroModoDois) ?></span>
                </div>
            </div>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-3" style="margin-bottom: 25px">
            <div class="card" style="">
                <div class="card-body">
                    <h4 class="card-title">Jogo Aleatório</h4>
                    <span class="txtCenter"><?= implode(", ", $msNumeroModoAll) ?></span>
                </div>
            </div>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-6" style="margin-bottom: 25px">
            <div class="card" style="">
                <div class="card-body">
                    <h4 class="card-title">Mega-Sena</h4>
                    <h4 class="card-title">Muitos jogos baseado no mesmo número</h4>
                    <span class="txtCenter">Jogos baseados nos 13 números</span><br />
                    <?php
                    if ($msgErrorMegasena == '') {
                        ?>
                        <form action="random">
                            <input onkeyup="getQtdNumber()" class="form-control" id="doisvirgula" type="text" name="megasena" value="<?=implode(",",$msNumeroModoUm)?>">
                        </form>
                        
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">&nbsp;&nbsp;01 <?= converterMoeda($valorDoJogoMegaSena * 1) ?></span><?php print implode(", ", $jogoUmMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">&nbsp;&nbsp;02 <?= converterMoeda($valorDoJogoMegaSena * 2) ?></span><?php print implode(", ", $jogoDoisMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">03 <?= converterMoeda($valorDoJogoMegaSena * 3) ?></span><?php print implode(", ", $jogoTresMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">04 <?= converterMoeda($valorDoJogoMegaSena * 4) ?></span><?php print implode(", ", $jogoQuatroMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">05 <?= converterMoeda($valorDoJogoMegaSena * 5) ?></span><?php print implode(", ", $jogoCincoMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">06 <?= converterMoeda($valorDoJogoMegaSena * 6) ?></span><?php print implode(", ", $jogoSeisMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">07 <?= converterMoeda($valorDoJogoMegaSena * 7) ?></span><?php print implode(", ", $jogoSeteMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">08 <?= converterMoeda($valorDoJogoMegaSena * 8) ?></span><?php print implode(", ", $jogoOitoMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">09 <?= converterMoeda($valorDoJogoMegaSena * 9) ?></span><?php print implode(", ", $jogoNoveMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">10 <?= converterMoeda($valorDoJogoMegaSena * 10) ?></span><?php print implode(", ", $jogoDezMegasena) . '<br />'; ?></span>
                        <hr style="margin: 3px">
                        <span class="txtCenter"><span style="background-color: black;color: white;padding: 5px;margin-right: 5px">11 <?= converterMoeda($valorDoJogoMegaSena * 11) ?></span><?php print implode(", ", $jogoOnzeMegasena) . '<br />'; ?></span>
                        <?php
                    } else {
                        print $msgErrorMegasena;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" >
        <div class=".col-md-12 .col-lg-12 col-sm-12">
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title">Loto Fácil Aleatório</h4>
                    <span class="txtCenter"><?= implode(", ", $lotoFacil) ?></span>
                </div>
            </div>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-12">
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title">Loto Fácil 21 Números</h4>
                    <p id="qtdesc"></p>
                    <?php 
                    @sort($numerosEscolhidosLotofacil);
                    ?>
                    <form action="index.php">
                        <input onkeyup="getQtdNumber()" class="form-control" id="doisvirgula" type="text" name="lotofacil" value="<?=$_REQUEST['lotofacil']? implode(",",$numerosEscolhidosLotofacil):''?>">
                    </form>
                    <div class="row">
                    <?php 
                    marcarAcertosLotofacil($lotoFacilUm,"01",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilDois,"02",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilTres,"03",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilQuatro,"04",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilCinco,"05",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilSeis,"06",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilSete,"07",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilOito,"08",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilNove,"09",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilDez,"10",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilOnze,"11",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilDoze,"12",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilTrese,"13",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilQuatorze,"14",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilQuatorze,"15",$valorDoJogoLotoFacil);
                    marcarAcertosLotofacil($lotoFacilDezeseis,"16",$valorDoJogoLotoFacil);
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

function gerarNumerosNaoRepetidos($tamanho, array $array, $randIncial = 0, $randFinal = 4) {
    $msNumeroModoUm = [];
    $i = 0;
    while ($i < $tamanho) {
        $numeroSorteado = $array[mt_rand($randIncial, $randFinal)];
        if (!in_array($numeroSorteado, $msNumeroModoUm)) {
            $msNumeroModoUm[] = $numeroSorteado;
            $i++;
        }
    }
    return $msNumeroModoUm;
}

function gerarNumerosNaoRepetidosSemArray($tamanho, $randIncial = 0, $randFinal = 4) {
    $msNumeroModoUm = [];
    $i = 0;
    while ($i < $tamanho) {

        $numeroSorteado = str_pad(mt_rand($randIncial, $randFinal), 2, "0", STR_PAD_LEFT);
        ;
        if (!in_array($numeroSorteado, $msNumeroModoUm)) {
            $msNumeroModoUm[] = $numeroSorteado;
            $i++;
        }
    }
    return $msNumeroModoUm;
}

function colocarUnicoArray(array $ar) {
    foreach ($ar as $r) {
        foreach ($r as $rs) {
            $valor[] = $rs;
        }
    }
    return $valor;
}

function converterMoeda($moeda) {
    print 'R$ ' . number_format($moeda, 2, ',', '.');
}

function converterMoedaReturn($moeda) {
    return 'R$ ' . number_format($moeda, 2, ',', '.');
}
?>
<br />

<?php
$explodeMegasena = explode(",", $_REQUEST['megasenaEscolhidos']);
$explodeLotofacil = explode(",", $_REQUEST['lotofacilEscolhidos']);
$dezenasMegaSena = $explodeMegasena;
$dezenasLotofacil = $explodeLotofacil;

function combinacoesDe($k, $xs) {

    if ($k === 0)
        return array(array());
    if (count($xs) === 0)
        return array();
    $x = $xs[0];

    $xs1 = array_slice($xs, 1, count($xs) - 1);

    $res1 = combinacoesDe($k - 1, $xs1);

    for ($i = 0; $i < count($res1); $i++) {
        array_splice($res1[$i], 0, 0, $x);
    }
    $res2 = combinacoesDe($k, $xs1);

    return array_merge($res1, $res2);
}

//print '<pre>';
//print_r(combinacoesDe(15,$dezenas));
//print '</pre>';
$cont = 0;
?>
<div class="container">

    <div class="card" >
        <div class="card-body">
            <form method="Post" action="">
                <div class="row">
                    <div class=".col-md-12 .col-lg-12 col-sm-12">
                        <h2>Fechamento da cartela</h2><br />
                    </div>
                    <div class=".col-md-12 .col-lg-12 col-sm-6">
                        <label>Megasena</label>
                        <input style="width: 100%" name="megasenaEscolhidos" placeholder="MegaSena Informe numeros separados por virgula" value="<?= ($_REQUEST['megasenaEscolhidos']) ? $_REQUEST['megasenaEscolhidos'] : ''; ?>">
                    </div>
                    <div class=".col-md-12 .col-lg-12 col-sm-6">
                        <label>Loto Fácil</label>
                        <input  style="width: 100%" name="lotofacilEscolhidos"  placeholder="LotoFacil Informe numeros separados por virgula"value="<?= ($_REQUEST['lotofacilEscolhidos']) ? $_REQUEST['lotofacilEscolhidos'] : ''; ?>">
                    </div>
                </div>
                <br />
                <button type="submit" class="btn">Gerar Fechamento</button>
            </form>

        </div>
    </div>
    <div class="row">

        <div class=".col-md-12 .col-lg-12 col-sm-6">
            <h2>Mega Sena</h2>
            <?php
            if (count($dezenasMegaSena) >= 6) {
                foreach (combinacoesDe(6, $dezenasMegaSena) as $vj) {
                    $cont++;
                    ?>
                    <div class=".col-md-12 .col-lg-12 col-sm-12">
                        <div class="card" >
                            <div class="card-body">
                                <span style="background-color: black;color: white;padding: 5px;margin-right: 5px"> <?= $cont . ' ' . converterMoedaReturn($valorDoJogoMegaSena * $cont) ?></span> <?= implode(", ", $vj) . '<br />'; ?>                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{
                print 'Você precisa escolher no mínimo 6 numeros';
            }
            ?>
        </div>
        <div class=".col-md-12 .col-lg-12 col-sm-6">
            <h2>Loto Fácil</h2>
            <?php
            $cont = 0;
            if (count($dezenasLotofacil) >= 15) {

                foreach (combinacoesDe(15, $dezenasLotofacil) as $vjl) {
                    $cont++;
                    ?>
                    <div class=".col-md-12 .col-lg-12 col-sm-12">
                        <div class="card" >
                            <div class="card-body">
                                <span style="background-color: black;color: white;padding: 5px;margin-right: 5px"> <?= $cont . ' ' . converterMoedaReturn($valorDoJogoLotoFacil * $cont) ?></span>
                                <?= implode(", ", $vjl) . '<br />'; ?>                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                print 'Você precisa escolher no mínimo 15 numeros';
            }
            ?>
        </div>
    </div>
</div>

<?php 

function marcarAcertosLotofacil($numeros,$jogoDeNumero,$valorDoJogoLotoFacil){
    $ltf = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25");
    $qtdImpar = 0;
    $qtdPar = 0;
    $numeroPrimo=0;
    ?>
        <div class=".col-md-12 .col-lg-12 col-sm-6">
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title"><?=$jogoDeNumero .' = ';?>  <?= converterMoeda($valorDoJogoLotoFacil * $jogoDeNumero).' : '?></h4>
                    <div class="resultado-loteria">
                        <ul class="numbers megasena" id="ulDezenas">
                            <?php 
                                $qtdNumeros = 0;
                                foreach ($ltf as $key => $value) {
                                    $qtdNumeros++;
                                    $br = "";
                                    if($qtdNumeros == 5){
                                        $br = "<br />";
                                        $qtdNumeros =0;
                                    }
                                    if(in_array($value,$numeros)){
                                        // $jogarEsseNumero = 'style ="background-color: #209869"';
                                        !(intval($value) % 2) ? $qtdPar++ : $qtdImpar++;
                                        $jogarEsseNumero = 'style ="background-color: #340069"';
                                        if(isPrime(intval($value))){
                                            $numeroPrimo++;
                                            $nPrimo[] = $value;
                                        }
                                    }else{
                                        $jogarEsseNumero = 'style ="background-color: #E4E4E4; color:black"';
                                    }
                                    print "<li {$jogarEsseNumero}>{$value}</li> {$br}";
                                }
                            ?>
                        </ul>
                        <div style="text-align:right;font-size:1.5em;padding:0px;margin:0px">
                            <p style="font-weight: 20px;padding:0px;margin:0px; <?=($qtdImpar>9 or $qtdImpar<=7)?' color:red ':'';?>">Impar: <?=$qtdImpar?></p>
                            <p style="font-weight: 20px;padding:0px;margin:0px; <?= $qtdPar>=8?' color:red ':'';?> ">Par: <?=$qtdPar?></p>
                            <p style="font-weight: 20px;padding:0px;margin:0px; <?= ($numeroPrimo>7 or $numeroPrimo <5) ?' color:red ':'';?> ">Primos: <?=$numeroPrimo?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php   
}

function isPrime($num) {
    if($num == 1)
        return false;

    if($num == 2)
        return true;

    if($num % 2 == 0) {
        return false;
    }

    $ceil = ceil(sqrt($num));
    for($i = 3; $i <= $ceil; $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}
?>
<script type="text/javascript" src="../include/plugin/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../include/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
  $('#date').mask('00/00/0000');
  $('#time').mask('00:00:00');
  $('#date_time').mask('00/00/0000 00:00:00');
  $('#cep').mask('00000-000');
  $('#phone').mask('0000-0000');
  $('#phone_with_ddd').mask('(00) 0000-0000');
  $('#phone_us').mask('(000) 000-0000');
  $('#mixed').mask('AAA 000-S0S');
  $('#cpf').mask('000.000.000-00', {reverse: true});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('#money').mask('000.000.000.000.000,00', {reverse: true});
  $('#money2').mask("#.##0,00", {reverse: true});
  $('#doisvirgula').mask("00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00,00", {reverse: false});
  $('#ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('#ip_address').mask('099.099.099.099');
  $('#percent').mask('##0,00%', {reverse: true});
  $('#clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('#placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('#fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
function getQtdNumber(){
    var res = 0;
    var input =  document.getElementById("doisvirgula").value;
    res = input.split(","); 
    document.getElementById("qtdesc").innerText = "Quantidade de números escolhidos: "+res.length;
}
</script>
