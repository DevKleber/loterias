<style>
    ul.numbersLotofacil,ul.numbersFinalLotofacil.Lotofacil{
        padding-left: 0px;
        margin-top: 0px;
    }
    .numbersFinalLotofacil > li {
        background: #209869 none repeat scroll 0 0;
        border-radius: 61%;
        color: #fff;
        display: inline-block;
        font-family: "FuturaWeb",sans-serif;
        font-size: 2rem;
        /*height: 10%;*/
        margin: 0 1px 1px 0;
        padding: 18px 0;
        text-align: center;
        width: 60.5px;
    }
    .numbersLotofacil > li {
        background: grey none repeat scroll 0 0;
        border-radius: 60%;
        color: #fff;
        display: inline-block;
        font-family: "FuturaWeb",sans-serif;
        font-size: 2rem;
        /*height: 10%;*/
        margin: 0 1px 1px 0;
        padding: 18px 0;
        text-align: center;
        width: 57.5px;
    }

    @media (max-width: 576px) {
        /* Small devices (landscape phones, 576px and up) */
        .imgcomemoracao,.imgtamanho{
            width:100%!important
        }
    }

    @media (max-width: 768px) {
        /* Medium devices (tablets, 768px and up) */
        .ocultarFone {
            display: none
        }
    }
</style>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://loteria.albertino.eti.br/lotofacil/last",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "A-Token: huk9F0edjE78lcQJ19ztKKr97Ih/swxvTkY12vXR1k4uweByJtsEgyGIdld0U60+9Gy3QRMs0KN/E2V3HHb82XZCCOJaX2/Ry4iju5JXeFuTIhqQGZkSSVLt+kiVjrC2YhxnOfW+ZCBRY7WvnMe+3n/sQ/L4VfVgxx7B75Wr6DA=",
    "Cache-Control: no-cache",
    "Postman-Token: 48b39129-1063-4e5e-ae3b-c9d7036781b1"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}
$ltf = json_decode($response)[0];

$numbrs = explode("|",$ltf->Dezenas);

$arr = str_split($data, 1);
$totalentrado = 0;
$jogo = 0;
$numerosArrayLotofacil = 0;
foreach ($arr as $value) {
    if (is_numeric($value)) {
        $totalentrado++;
        if ($totalentrado == 3) {
            $totalentrado = 1;
            $jogo++;
        }
        if ($totalentrado == 1) {
            $numeroUm = $value;
        }if ($totalentrado == 2) {
            $numeroJogo = $numeroUm . $value;
            $numerosLotofacil[$jogo] = $numeroJogo;
        }
    }
}
$numeroConcursoLotofacil = $ltf->Concurso;
$numeroConcursoLotofacilData = $ltf->Data;
?>
<div class="demo-list-action mdl-list ">
    <br />
    <span style="font-size: 3em;color:#0066b3">Resultado</span> Concurso nº <?= $numeroConcursoLotofacil ?><br /><br />
    <span onclick="" style="margin-left: 5px;"><span style="font-size: 1.4em"><?=$numeroConcursoLotofacilData?></span></span>

    <div class="" id="" style="">
        <div class="mdl-list__item " id="" style="padding-left: 2px; padding-right: 2px;">
            <span class="mdl-list__item-primary-content">
                <ul class="numbersFinalLotofacil Lotofacil" id="numerosLotofacil">
                    <?php
                    foreach ($numbrs as $key => $numerosSorteados) {
                        ?>
                        <li id="<?= $numerosSorteados ?>"> <?= $numerosSorteados ?></li>
                        <?php
                    }
                    ?>
                </ul>
            </span>
        </div>
    </div>
</div>
<?php
$numeroConcursoBuscaLotoFacil = $numeroConcursoLotofacil;
$urlAtiva = 'nao';
if (isset($_REQUEST['concursolotofacil'])) {
    $urlAtiva = 'sim';
    $numeroConcursoBuscaLotoFacil = $_REQUEST['concursolotofacil'];
}
?>

<h4 style="padding-left: 10px">Meus jogos <br />concurso nº 
            <!-- <a style="color: black!important" href="?concurso=<?= ($numeroConcursoBuscaLotoFacil - 1) ?>"> -->
    <i onclick="concursoAbrirLotofacil(<?= ($numeroConcursoBuscaLotoFacil - 1) ?>)" class="material-icons">skip_previous</i> 
    <!-- </a> -->
    <?= $numeroConcursoBuscaLotoFacil ?> 
    <!-- <a style="color: black!important" href="?concurso=<?= ($numeroConcursoBuscaLotoFacil + 1) ?>"> -->
    <i onclick="concursoAbrirLotofacil(<?= ($numeroConcursoBuscaLotoFacil + 1) ?>)" class="material-icons">skip_next</i>
    <!-- </a> -->
</h4><br />
<script>
    function concursoAbrirLotofacil(numero) {
        window.location.href = "?concursolotofacil=" + numero;
    }
</script>
<?php
// fim pegando dados 
$cont = 0;
$acertos = 0;
foreach ($megasena->listarAllLotoFacil($numeroConcursoBuscaLotoFacil) as $valueJogos) {
    $cont++;
    ?>
    <div class="demo-list-action mdl-list ">
        <span onclick="" style="margin-left: 5px;">Concurso nº <?= $valueJogos->nu_concurso ?></span>
        <div class="" id="divVencedoraLotofacil<?= $cont ?>" style="">
            <div class="mdl-list__item "  style="padding-left: 2px; padding-right: 2px; padding-bottom: 0px;">
                <span class="mdl-list__item-primary-content">
                    <ul class="numbersLotofacil lotofacil">
                        <li id="nu_um_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_um, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_dois_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_dois, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_tres_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_tres, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_quatro_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_quatro, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_cinco_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_cinco, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_seis_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_seis, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_sete_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_sete, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_oito_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_oito, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_nove_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_nove, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_dez_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_dez, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_onze_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_onze, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_doze_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_doze, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_treze_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_treze, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_quatorze_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_quatorze, 2, "0", STR_PAD_LEFT) ?></li>
                        <li id="nu_quinze_jogo_lotofacil<?= $cont ?>"> <?= str_pad($valueJogos->nu_quinze, 2, "0", STR_PAD_LEFT) ?></li>
                        <?php
                        if ($urlAtiva == "nao" || $valueJogos->nu_concurso == $numeroConcursoLotofacil) {

                            foreach ($numbrs as $key => $numbers) {
                                if ($numbers == $valueJogos->nu_um) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_um_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_dois) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_dois_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_tres) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_tres_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_quatro) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_quatro_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_cinco) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_cinco_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_seis) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_seis_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_sete) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_sete_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_oito) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_oito_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_nove) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_nove_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_dez) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_dez_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_onze) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_onze_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_doze) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_doze_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_treze) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_treze_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_quatorze) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_quatorze_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                                if ($numbers == $valueJogos->nu_quinze) {
                                    $acertos++;
                                    ?> 
                                    <script type="text/javascript">
                                        document.getElementById('nu_quinze_jogo_lotofacil<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                    </script>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </ul>
                </span>
            </div>
            <span onclick="" style="margin-left: 5px;">Numeros de acertos: <?= $acertos ?></span>
            <?php
            
            if ($acertos >= 11 and $acertos <= 13) {
                print '<h3>Você ganhou</h3>';
                $img = img();
                ?> 
                <script type="text/javascript">
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.margin = '15px';
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.padding = '15px';
                    var div = document.getElementById('divVencedoraLotofacil<?= $cont ?>');
                    div.innerHTML += '<?=$img?>';
                    
                </script>
                <?php
            }
            if ($acertos == 14) {
                print '<h2>Você ganhouu</h2>';
                $img = img();
                ?> 
                <script type="text/javascript">
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.margin = '15px';
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.padding = '15px';
                    var div = document.getElementById('divVencedoraLotofacil<?= $cont ?>');
                    div.innerHTML += '<?=$img?>';
                </script>
                <?php
            }
            if ($acertos == 15) {
                print '<h1>VOCÊ GANHOUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU</h1>';
                $img = img();
                ?> 
                <script type="text/javascript">
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.margin = '15px';
                    document.getElementById('divVencedoraLotofacil<?= $cont ?>').style.padding = '15px';
                    var div = document.getElementById('divVencedoraLotofacil<?= $cont ?>');
                    div.innerHTML += '<?=$img?>';
                </script>
                <?php
            }
            ?>
        </div>
    </div>

    <hr style="width: 100%; margin-right: auto;margin-left: auto">
    <?php
    $acertos = 0;
}
?>


<div class="page-content" style="display: none">
    <div class="" id="lancarJogoLotofacil" style="">
        <br />
        <h2 class="mdl-card__title-text">Concurso </h2>
        <div class="mdl-layout mdl-js-layout" >
            <main class="mdl-layout__content">
                <div class="mdl-card mdl-shadow--12dp"style="width: 100%;">

                    <div class="mdl-card__supporting-text">
                        <form action="" name="formJogo" id="formJogo">
                            <div class="mdl-textfield mdl-js-textfield" style="width: 98%;">
                                <input class="mdl-textfield__input" type="text" id="" value="<?= $numeroConcursoLotofacil + 1 ?>" name="item[nu_concurso]" />
                                <label class="mdl-textfield__label" for="username">Nº concurso</label>
                                <label class="mdl-textfield__label" for="username"><?php print_r($proximoPremioLotoFacil); ?></label>
                            </div>
                            <div class="mdl-list__item " id="" style="padding-left: 2px; padding-right: 2px; padding-top: 0px;">
                                <ul class="numbers mega-sena">
                                    <?php
                                    $pularLinhaLotofacil = 0;
                                    $contParaJogoLotoFacilLotoFacil = 0;
                                    for ($i = 0; $i < 25; $i++) {
                                        $pularLinhaLotofacil++;
                                        $contParaJogoLotoFacil++;
                                        ?>
                                        <li id="numerosdacartela_<?= ($i + 1) ?>" onclick="escolhaNumero('<?= $i + 1 ?>')"> <?= $i + 1 ?></li>

                                        <?php
                                        if ($pularLinhaLotofacil == 5) {
                                            $pularLinhaLotofacil = 0;
                                            print '<br />';
                                        }
//                                        if($contParaJogoLotoFacil == 5 || $contParaJogoLotoFacil == 10 || $contParaJogoLotoFacil == 15|| $contParaJogoLotoFacil == 20|| $contParaJogoLotoFacil == 25){
//                                            print '<hr>';
//                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div id="numeroParaProximoJogo"><h3></h3></div>
                        </form>
                    </div>
                </div>

                <div class="mdl-card__actions mdl-card--border" >
                    <button onclick="salvarNumeros()" style="float: left" class="mdl-button mdl-button--fab mdl-js-button mdl-js-ripple-effect"><i class="material-icons">send</i></button>
                </div>
            </main>
        </div>
    </div>


</div>
<script>
    document.getElementById(lancarJogoLotofacil).style.display = 'none';
</script>

<?php 
function img(){
    $img = '';
    $aleatorio = rand(1, 5);
    // $aleatorio = 6;
    switch ($aleatorio) {
        case 1:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/pdt-moneyrain-01.gif"></div>';
            break;
        case 2:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/YNq8G_f-maxage-0.gif"></div>';
            break;
        case 3:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/11sBLVxNs7v6WA.gif"></div>';
            break;
        case 4:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/giphy.gif"></div>';
            break;
        case 5:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/bran__4.gif"></div>';
            break;
        case 6:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/l4pTfx2qLszoacZRS.gif"></div>';
            break;
        case 7:
            $img = '<div class="imgcomemoracao"><img class="imgtamanho" src="imagens/comemoracoes/l4pSXkg0Ss5mlxc8o.gif"></div>';
            break;
    }
    return $img;
}