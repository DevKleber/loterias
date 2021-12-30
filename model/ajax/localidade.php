<?php
require_once '../../DB.php';
include_once '../../function/funcoes.php';
$cd = $_REQUEST['cd'];

$sql = "SELECT * FROM tb_bairro_localidades where cd_bairro = :cd_bairro order by no_bairro_localidades ";
$stmt = DB::prepare($sql);
$stmt->bindParam(':cd_bairro', $cd, PDO::PARAM_INT);
$stmt->execute();
$select = $stmt->fetchAll();
?>
<select disable="" class="chosen-select chosenlargura bs-select form-control" id="cd_bairro_localidades" name="item[cd_bairro_localidades]"  onchange="endereco(this.value)" placeholder="">
    <option disabled="" selected=""></option>
    <?php
    foreach ($select as $value) {
        ?>
        <option value="<?php print $value->cd_bairro_localidades ?>"><?php print utf8_decode($value->no_bairro_localidades) ?></option>
        <?php
    }
    ?>
</select>