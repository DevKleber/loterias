<style>
    ul.numbers,ul.numbersFinal.mega-sena{
        padding-left: 0px;
        margin-top: 0px;
    }
    .numbersFinal > li {
        background: #209869 none repeat scroll 0 0;
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
    .numbers > li {
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
    #divVencedora{box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;}
</style>

<div class="page-content">
    <div class="view" id="view">

        <!-- List items with avatar and action -->
        <style>
            .demo-list-action {
                width: auto;
            }
        </style>
        <?php
        // pegando dados do site da caixa economica mega sena
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://loteria.albertino.eti.br/megasena/last",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "A-Token: huk9F0edjE78lcQJ19ztKKr97Ih/swxvTkY12vXR1k4uweByJtsEgyGIdld0U60+9Gy3QRMs0KN/E2V3HHb82XZCCOJaX2/Ry4iju5JXeFuTIhqQGZkSSVLt+kiVjrC2YhxnOfW+ZCBRY7WvnMe+3n/sQ/L4VfVgxx7B75Wr6DA=",
            "Cache-Control: no-cache",
            "Postman-Token: e8899660-032f-4d95-a6da-df04ff7c6386"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } 
        $ms = json_decode($response)[0];
        $dezenas = explode("|",$ms->Dezenas);
        
        
        // die();
        // $c = curl_init();
        // $cookie_file = __DIR__ . DIRECTORY_SEPARATOR . 'megasena.txt';
        // curl_setopt_array($c, array(
        //     CURLOPT_URL => 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/megasena',
        //     CURLOPT_REFERER => 'http://www.loterias.caixa.gov.br',
        //     CURLOPT_USERAGENT => 'Foo Spider',
        //     CURLOPT_HEADER => true,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_CONNECTTIMEOUT => 16,
        //     CURLOPT_TIMEOUT => 16,
        //     CURLOPT_MAXREDIRS => 1,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_COOKIESESSION => true,
        //     CURLOPT_COOKIEFILE => $cookie_file,
        //     CURLOPT_COOKIEJAR => $cookie_file
        // ));

        // try {
        //     $content = curl_exec($c);
        //     $data = curl_getinfo($c);
        //     $data['content'] = $content;
        //     unset($content);
        //     $data['errno'] = curl_errno($c);
        //     $data['errmsg'] = curl_error($c);
        //     if ((int) $data['errno'] !== 0 || (int) $data['http_code'] !== 200) {
        //         echo 'error number: ' . $data['errno'];
        //         echo 'error message: ' . $data['errmsg'];
        //         echo 'http status: ' . $data['http_code'];
        //         //print_r($data);
        //         exit;
        //     }
        // } catch (HttpException $ex) {
        //     print_r($ex);
        //     exit;
        // }

        // curl_close($c);

        // $doc = new DOMDocument();
        // $doc->loadHTML($data['content']);
        // unset($data);
        // $tags = $doc->getElementsByTagName('div');
        // $dezenas = $doc->getElementsByTagName('ul');
        // $proximo = $doc->getElementsByTagName('div');
        // $probabilidade = $doc->getElementsByTagName('table');
        // $premiacao = $doc->getElementsByTagName('div');

        // $data = null;

        // foreach ($tags as $tag) {
        //     if ($tag->getAttribute('class') == 'title-bar clearfix') {
        //         $data = trim($tag->textContent);
        //         break;
        //     }
        // }

        // foreach ($dezenas as $dez) {
        //     if ($dez->getAttribute('class') == 'numbers mega-sena') {
        //         $dataDezenas = trim($dez->textContent);
        //         break;
        //     }
        // }
        // foreach ($proximo as $prx) {
        //     if ($prx->getAttribute('class') == 'next-prize clearfix') {
        //         $proximoPremio = trim($prx->textContent);
        //         break;
        //     }
        // }
        // foreach ($probabilidade as $prob) {
        //     if ($prob->getAttribute('class') == 'limited table-d') {
        //         $dataProbabilidade = trim($prob->textContent);
        //         break;
        //     }
        // }
        // foreach ($premiacao as $premiac) {
        //     if ($premiac->getAttribute('class') == 'related-box gray-text no-margin') {
        //         $dataPremiacao = trim($premiac->textContent);
        //         break;
        //     }
        // }

        // $dezenas = implode(",".$dezenas);
        // $proximoCocurso = substr($proximoPremio, 43, 54);
        $numeroConcurso = $ms->Concurso;
        $numeroConcursoBusca = $numeroConcurso;
        $urlAtiva = 'nao';
        if (isset($_REQUEST['concurso'])) {
            $urlAtiva = 'sim';
            $numeroConcursoBusca = $_REQUEST['concurso'];
        }
        ?>

        <div class="demo-list-action mdl-list ">
            <h3>Resultado oficial</h3>
            <span onclick="" style="margin-left: 5px;">Concurso nº <?= $ms->Concurso ?></span>
            <span onclick="" style="margin-left: 5px;">Data <?= $ms->Data ?></span><br />
            <div class="" id="" style="">
                <div class="mdl-list__item " id="" style="padding-left: 2px; padding-right: 2px;">
                    <span class="mdl-list__item-primary-content">
                        <ul class="numbersFinal mega-sena" id="numerosMega">
                            <?php
                            foreach ($dezenas as $key => $numerosSorteados) {
                                ?>
                                <li id="<?= $numerosSorteados ?>" onclick="escolhaNumeros()"> <?= $numerosSorteados ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </span>
                </div>
            </div>
        </div>

        <h4 style="padding-left: 10px">Meus jogos <br />concurso nº 
            <!-- <a style="color: black!important" href="?concurso=<?= ($numeroConcursoBusca - 1) ?>"> -->
            <i onclick="concursoAbrir(<?= ($numeroConcursoBusca - 1) ?>)" class="material-icons">skip_previous</i> 
            <!-- </a> -->
            <?= $numeroConcursoBusca ?> 
            <!-- <a style="color: black!important" href="?concurso=<?= ($numeroConcursoBusca + 1) ?>"> -->
            <i onclick="concursoAbrir(<?= ($numeroConcursoBusca + 1) ?>)" class="material-icons">skip_next</i>
            <!-- </a> -->
        </h4><br />
        <script>
            function concursoAbrir(numero) {
                window.location.href = "?concurso=" + numero;
            }
        </script>
        <?php
        // fim pegando dados 
        $cont = 0;
        $acertos = 0;

        foreach ($megasena->listarAll($numeroConcursoBusca) as $valueJogos) {
            $cont++;
            ?>
            <div class="demo-list-action mdl-list "id="divVencedora<?= $cont ?>" style="margin-top: 10px;margin-bottom: 10px">
                <span onclick="" style="margin-left: 5px;">Concurso nº <?= $valueJogos->nu_concurso ?></span>
                <div class="" id="" style="">
                    <div class="mdl-list__item " id="" style="padding-left: 2px; padding-right: 2px; padding-bottom: 0px;">
                        <span class="mdl-list__item-primary-content">
                            <ul class="numbers mega-sena">
                                <li id="nu_um_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_um, 2, "0", STR_PAD_LEFT) ?></li>
                                <li id="nu_dois_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_dois, 2, "0", STR_PAD_LEFT) ?></li>
                                <li id="nu_tres_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_tres, 2, "0", STR_PAD_LEFT) ?></li>
                                <li id="nu_quatro_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_quatro, 2, "0", STR_PAD_LEFT) ?></li>
                                <li id="nu_cinco_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_cinco, 2, "0", STR_PAD_LEFT) ?></li>
                                <li id="nu_seis_jogo<?= $cont ?>"> <?= str_pad($valueJogos->nu_seis, 2, "0", STR_PAD_LEFT) ?></li>
                                <?php
                                if ($urlAtiva == "nao" || $valueJogos->nu_concurso == $numeroConcurso) {

                                    foreach ($dezenas as $key => $numbers) {
                                        if ($numbers == $valueJogos->nu_um) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_um_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                        if ($numbers == $valueJogos->nu_dois) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_dois_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                        if ($numbers == $valueJogos->nu_tres) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_tres_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                        if ($numbers == $valueJogos->nu_quatro) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_quatro_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                        if ($numbers == $valueJogos->nu_cinco) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_cinco_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                        if ($numbers == $valueJogos->nu_seis) {
                                            $acertos++;
                                            ?> 
                                            <script type="text/javascript">
                                                document.getElementById('nu_seis_jogo<?= $cont ?>').style.backgroundColor = '#209869'; // ou a cor que quiser
                                            </script>
                                            <?php
                                        }
                                    }
                                }
                                ?>

                            </ul>
                        </span>
                    </div>
                </div>

                <span onclick="" style="margin-left: 5px;">Numeros de acertos: <?= $acertos ?></span>
                <?php
                if ($acertos == 4) {
                    print '<h2>Você ganhouu</h2>';
                    ?> 
                    <script type="text/javascript">
                        document.getElementById('divVencedora<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    </script>
                    <?php
                }
                if ($acertos == 5) {
                    print '<h2>Você ganhouu</h2>';
                    ?> 
                    <script type="text/javascript">
                        document.getElementById('divVencedora<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    </script>
                    <?php
                }
                if ($acertos == 6) {
                    print '<h1>VOCÊ GANHOUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU PORRAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h1>';
                    ?> 
                    <script type="text/javascript">
                        document.getElementById('divVencedora<?= $cont ?>').style.boxShadow = '0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)'; // ou a cor que quiser
                    </script>
                    <?php
                }
                $acertos = 0;
                ?>
            </div>
            <?php
                print '<hr style="width: 100%; margin-right: auto;margin-left: auto">';
        }
        ?>
    </div>
    <script type="text/javascript">
        function mostrar(codigo) {
            $(".ocultar").hide();
            var display = document.getElementById(codigo).style.display;
            if (display == "none") {
                document.getElementById(codigo).style.display = 'block';
            } else {
                document.getElementById(codigo).style.display = 'none';

            }
        }

        document.getElementById("numerosMega").style.color = '#ffffff';
        document.getElementByClass("numeroMega").style.color = '#ffffff';

    </script>
