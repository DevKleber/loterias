<?php
require_once '../../DB.php';
include_once '../../function/funcoes.php';
$cd = $_REQUEST['cd'];

$sql = "SELECT * FROM tb_endereco where cd_bairro_localidades = :cd_bairro_localidades order by ds_endereco ";
$stmt = DB::prepare($sql);
$stmt->bindParam(':cd_bairro_localidades', $cd, PDO::PARAM_INT);
$stmt->execute();
$select = $stmt->fetchAll();
$qtdRegistros = count($select);
if ($qtdRegistros > 0) {
    ?>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="form-group">
            <label for="">Endereço</label>

            <select class="chosen-select chosenlargura bs-select form-control" id="cd_endereco" name="item[cd_endereco]" onchange="ocultaEndereco()" placeholder="">
                <option></option>
                <?php
                foreach ($select as $value) {
                    ?>
                    <option value="<?php print $value->cd_endereco ?>"><?php print $value->ds_endereco ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <?php
} else {
    ?>

    <?php
}
?>
<div id="btnNewAdrass" class="col-md-2 col-sm-2 col-xs-12"><span onclick="newAdrass()" class="btn btn-warning">Novo endereço</span></div>