<?php

class table {

    public function renderOpenTable() {
        $table = '';
        $table .= '<div class="table-responsive">';
        $table .= "<table class='table'>";
        return $table;
    }

    public function renderOpenThead() {
        $thead = '';
        $thead .='<thead>';
        $thead .='<tr>';
        return $thead;
    }

    public function rederOpenTableThead() {
        $tt = '';
        $tt.=$this->renderOpenTable();
        $tt.=$this->renderOpenThead();
        return $tt;
    }

    public function rederTheadTd($descricao, $colspan, $width = null) {
        $largura = '';
        if ($width != null) {
            $largura = 'width="' . $width . '"';
        }
        $td = '';
        $td .='<td ' . $largura . ' colspan="' . $colspan . '">';
        $td .=$descricao;
        $td .='</td>';
        return $td;
    }

    public function renderCloseThead() {
        $thead = '';
        $thead .='</tr>';
        $thead .='</thead>';
        return $thead;
    }

    public function rederTbodyTd(array $ar, array $campos, $cd, array $bo,$noArquivo, array $config = null) {

        $tbd = '';
        $t = '';
        $tbd.=$this->renderCloseThead();
        foreach ($ar as $v) {
            $codigo = $v->$cd;
            $tbd .='<tr>';
            foreach ($campos as $vv) {

                foreach ($bo as $key => $value) {
                    if ($value === $vv) {
                        $v->$vv = $key($v->$vv);
                    }
                }
//               colocando img fixa tenho que corrigir isso
                if (preg_match("/img_/", $vv)) {
                    $tbd .="<td><img src='{$config['caminho']}" . $v->$vv . "' height='50'></td>"; //colocando img fixa tenho que corrigir isso
                } else {
                    $tbd .="<td>{$v->$vv}</td>"; // deixar só esse campo sem if else para mostrar os resultados na tebela.
                }
                if ($vv == 'update') {
                    $t = '<input type="checkbox" name="item[]" value="' . $v->cd_comprovante . '"></label>';
                }
            }
            if (empty($t)) {
//                href='?pagina=" . getUrl('pagina') . "&acao=excluir&" . $cd . "=" . $codigo . "'>
                $tbd.="<td>{$t}<a id='alterar' href='?pagina=" . getUrl('pagina') . "&acao=formAlterar&" . $cd . "=" . $codigo . "'><button style='padding-right: 15px; padding-left: 15px;' class='btn'><p class='glyphicon glyphicon-pencil aria-hidden='true'></p></button> </a>";
                $tbd.=" 
                        <button  onclick = \"excluir('$noArquivo','$codigo')\" class='btn' style='padding-right: 15px; padding-left: 15px;' > 
                            <p class='glyphicon glyphicon-remove' aria-hidden='true'> </p> 
                        </button> 
                       </td>";  
            } else {
                $tbd.="<td>{$t}<a href='?pagina=" . getUrl('pagina') . "&acao=formAlterar&" . $cd . "=" . $codigo . "'></td>";
            }
            $tbd .='</tr>';
        }
        return $tbd;
    }

    public function renderCloseTable() {
        $table = '';
        $table .= "</table'>";
        $table .= "</div'>";
        return $table;
    }

}