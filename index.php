<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Loteria</title>
        
         <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="imagens/ico.png">

        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="#E64A19">
        <meta name="apple-mobile-web-app-title" content="megasena">
        <link rel="apple-touch-icon-precomposed" href="imagens/icon75x75.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#E64A19">


        <!-- Bootstrap -->
        <link href="include/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="include/plugin/icon.css">
        <link rel="stylesheet" href="include/plugin/material.min.css">
        <script defer src="include/plugin/jquery-3.1.1.min.js"></script>
        <script defer src="include/plugin/material.min.js"></script>
        <script type="text/javascript" src="include/script/acao.js"></script>
        
        <style>
            html.mdl-js body div.mdl-layout__container div.mdl-layout.mdl-js-layout.mdl-layout--fixed-header.mdl-layout--fixed-tabs.has-drawer.has-tabs.is-upgraded div.mdl-layout__drawer.is-visible div a{color: #544346;}
        </style>
    </head>
    <body>
        <?php
        error_reporting(0);
        ini_set(“display_errors”, 0 );
        require_once 'DB.php';
        require_once 'autoload/autoload.php';
        require_once 'model/megasena.php';
        $megasena = new megasena();
        require_once('restrito.php');
        

        ?>

        <!-- Simple header with fixed tabs. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
             mdl-layout--fixed-tabs">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title" onclick="location.reload();">Megasena</span>
                    <!-- <div style="padding-left: 94.6%;"><a href="index.php?sair=true"><i  class="material-icons">exit_to_app</i></a></div> -->
                </div>
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a id="tab_megasena" href="#fixed-tab-1" class="mdl-layout__tab is-active"><img src="imagens/01_Mega_Sena_WPC.png" height="100%"></a>
                    <a id="tab_quina" href="#fixed-tab-2" class="mdl-layout__tab "><img src="imagens/02_Quina.png" height="100%"></a>
                    <a id="tab_lotofacil" href="#fixed-tab-3" class="mdl-layout__tab "><img src="imagens/10_Lotofacil.png" height="100%"></a>
                    <a id="tab_lotomania" href="#fixed-tab-4" class="mdl-layout__tab "><img src="imagens/lotomania.png" height="100%"></a>
                </div>
                <!--                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#fixed-tab-1" class="mdl-layout__tab is-active"><i class="material-icons">filter_vintage</i></a>
                    <a href="#fixed-tab-2" class="mdl-layout__tab"><i class="material-icons">border_clear</i></a>
                    <a href="#fixed-tab-3" class="mdl-layout__tab"><img src="http://loterias.caixa.gov.br/wps/wcm/connect/c6e414a7-ab65-4a06-b812-745798a9f362/10_Lotofacil.png?MOD=AJPERES&CACHEID=c6e414a7-ab65-4a06-b812-745798a9f362"height="100%"></a>
                    <a href="#fixed-tab-4" class="mdl-layout__tab"><i class="material-icons">monetization_on</i></a>
                </div>-->
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Mega-Sena  </span>
                <div style="margin-left: 10%;color: black;"><i onclick="abrirLogin()"  class="material-icons">exit_to_app</i></div>

            </div>
            <main class="mdl-layout__content">
                <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                    <?php require 'view/listar/terceiro.php'; ?>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                    <?php require 'view/exercicio/index.php'; ?>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-3">
                    <?php require_once 'view/listar/principal.php'; ?>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-4">
                    <?php require 'view/listar/quarto.php'; ?>
                </section>
            </main>
        </div>
    </body>
</html>
<script>
function abrirLogin(){
    window.location.href = "?sair=true";
}
</script>
<!-- INSERT INTO arocw805_277_1.megasena_jogo_lotofacil
(nu_um, nu_dois, nu_tres, nu_quatro, nu_cinco, nu_seis, nu_sete, nu_oito, nu_nove, nu_dez, nu_onze, nu_doze, nu_treze, nu_quatorze, nu_quinze, cd_user, nu_concurso)
VALUES
(01, 02, 04, 05, 06, 07, 08, 11, 13, 14, 16, 20, 22, 23, 25, 1, 1650),   
(01, 02, 04, 05, 06, 08, 12, 14, 15, 16, 19, 20, 21, 22, 23, 1, 1650),
(01, 02, 04, 05, 07, 08, 10, 11, 13, 15, 16, 19, 20, 21, 22, 1, 1650),
(01, 02, 04, 06, 07, 11, 13, 14, 15, 18, 19, 21, 22, 23, 25, 1, 1650),
(01, 02, 04, 08, 10, 12, 13, 14, 18, 19, 20, 21, 22, 23, 25, 1, 1650),
(01, 02, 05, 06, 07, 10, 11, 12, 13, 14, 16, 18, 21, 22, 23, 1, 1650),
(01, 02, 05, 06, 08, 10, 12, 14, 15, 16, 20, 21, 22, 23, 25, 1, 1650),
(01, 02, 05, 07, 10, 11, 12, 14, 15, 16, 18, 21, 22, 23, 25, 1, 1650),
(01, 02, 06, 07, 08, 10, 11, 12, 13, 14, 15, 18, 20, 22, 25, 1, 1650),
(01, 04, 05, 06, 07, 10, 11, 12, 13, 15, 16, 18, 19, 23, 25, 1, 1650),
(02, 04, 05, 06, 07, 08, 10, 11, 15, 16, 19, 20, 22, 23, 25, 1, 1650),
(02, 04, 05, 06, 10, 12, 13, 14, 15, 16, 18, 19, 21, 22, 25, 1, 1650),
(04, 05, 06, 07, 08, 10, 11, 12, 14, 16, 18, 19, 20, 21, 25, 1, 1650),
(04, 05, 06, 07, 08, 10, 11, 13, 15, 16, 18, 19, 20, 21, 23, 1, 1650),
(04, 05, 07, 08, 10, 11, 12, 13, 14, 15, 16, 18, 20, 23, 25, 1, 1650),
(05, 06, 07, 08, 11, 12, 13, 15, 16, 18, 19, 20, 21, 23, 25, 1, 1650); -->