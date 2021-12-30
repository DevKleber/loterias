<style type="text/css">


</style>
<div class="page-content">
    <div class="" id="" style="">
        <br />
        <h2 class="mdl-card__title-text">Concurso </h2>
        <div class="mdl-layout mdl-js-layout" >
            <main class="mdl-layout__content">
                <div class="mdl-card mdl-shadow--12dp"style="width: 100%;">

                    <div class="mdl-card__supporting-text">
                        <form action="" name="formJogo" id="formJogo">
                            <div class="mdl-textfield mdl-js-textfield" style="width: 98%;">
                                <input class="mdl-textfield__input" type="text" id="" value="<?=$numeroConcurso+1?>" name="item[nu_concurso]" />
                                <label class="mdl-textfield__label" for="username">Nº concurso</label>
                            </div>
                            <div class="mdl-list__item " id="" style="padding-left: 2px; padding-right: 2px; padding-top: 0px;">
                                <ul class="numbers mega-sena">
                                    <?php 
                                    $contParaJogo =0;
                                    for($i=0;$i<60;$i++){
                                        $contParaJogo++;
                                        ?>
                                        <li id="numerosdacartela_<?= ($i+1)?>" onclick="escolhaNumero('<?=$i+1?>')"> <?= $i+1 ?></li>
                                        
                                        <?php
                                        if($contParaJogo == 15 || $contParaJogo == 30 || $contParaJogo == 45){
                                            print '<hr>';
                                        }
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
                    <iframe height='400px'  src='random/index.php'></iframe>
            </main>
        </div>
    </div>
</div>
