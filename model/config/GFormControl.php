<?php

class GFormControl {

    // Rendereiza a abertura do form
    public function renderOpenForm($action, $personalizacao = NULL, $class = NULL) {
        $form = '';
        $form .= '<form ' . $personalizacao . ' class="' . $class . '" name="form" id="form" >';
        return $form;
    }

    // Renderiza o LABEL que contém a descrição do campo
    public function renderLabel($label) {
        return '<label for="">' . $label . '</label>';
    }

    public function rederLinha() {
        return '<div class="row"></div>';
    }

    public function rederInput(array $config) {
        $id = isset($config["id"]) ? $config["id"] : "";
        $class = isset($config["class"]) ? $config["class"] : "";
        $name = isset($config["name"]) ? $config["name"] : "";
        $value = isset($config["value"]) ? $config["value"] : "";
        $type = isset($config["type"]) ? $config["type"] : "";
        $label = isset($config["label"]) ? $config["label"] : "";
        $obrigatorio = isset($config["obrigatorio"]) ? "required=''" : "";
        $placeholder = isset($config["placeholder"]) ? $config["placeholder"] : "";
        $largura = isset($config["largura"]) ? $config["largura"] : "12";
        $onclick = isset($config["onclick"]) ? $config["onclick"] : "";
        $onblur = isset($config["onblur"]) ? $config["onblur"] : "";



        $formatoData = '';
        if (!empty($class)) {
            $formatoData = "data-date-format='dd/mm/yyyy'";
        }
        $input = '';
        $div = '';
        $divFecha = '';
//        $input .= ' <div class="row">';
        if (strnatcasecmp($type, "hidden")) {
            $div = '<div class = "col-md-' . $largura . ' col-sm-' . $largura . ' col-xs-12">
                    <div class="form-group">';
            $div .= $this->renderLabel($label);
            $divFecha = '</div></div>';
        } else {
            
        }
        $input .= $div;
        $input .= "<input type='{$type}' onclick='{$onclick}' onblur='{$onblur}' class='form-control " . $class . "' {$formatoData} id='{$id}'name='" . $name . "' placeholder='" . $placeholder . "' value='{$value}' {$obrigatorio} ><br />";

        $input .= $divFecha;

//        $input .= '</div>';

        return $input;
    }

    public function rederInputImg(array $config) {
        $id = isset($config["id"]) ? $config["id"] : "";
        $class = isset($config["class"]) ? $config["class"] : "";
        $name = isset($config["name"]) ? $config["name"] : "";
        $value = isset($config["value"]) ? $config["value"] : "";
        $type = isset($config["type"]) ? $config["type"] : "";
        $label = isset($config["label"]) ? $config["label"] : "";
        $obrigatorio = isset($config["obrigatorio"]) ? "required=''" : "";
        $placeholder = isset($config["placeholder"]) ? $config["placeholder"] : "";
        $altura = isset($config["altura"]) ? $config["altura"] : "200";
        $largura = isset($config["largura"]) ? $config["largura"] : "200";
        $caminho = isset($config["caminho"]) ? $config["caminho"] : "";
        $labelButton = isset($config["labelButton"]) ? $config["labelButton"] : "Selecione uma imagem";



        $formatoData = '';
        if (!empty($class)) {
            $formatoData = "data-date-format='dd/mm/yyyy'";
        }
        $input = '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
        $input .= '<div class="form-group">';
        $input .= $this->renderLabel($label);
        $input .= "<div class='fileupload fileupload-new' data-provides='fileupload'>";
        $input .= "<div class='fileupload-new thumbnail' style='width: {$largura}px; height: {$altura}px;'>";
        $input .= "<img src='{$caminho}' alt='' />";
        $input .= "</div>";
        $input .= "<div class='fileupload-preview fileupload-exists thumbnail' style='max-width: {$largura}px; max-height: {$altura}px; line-height: 20px;'></div><br />";
        $input .= "<div>";
        $input .= "<span class='btn btn-file'><span class='fileupload-new'>{$labelButton}</span>";
        $input .= "<span class='fileupload-exists'>Alterar imagem</span>";
        $input .= "<input type='file' id='{$id}' name='{$name}' class='default {$class}'/>";
        $input .= "</span><br />";
        $input .= "<a href='#' class='btn fileupload-exists' data-dismiss='fileupload'>Remover imagem</a>";
        $input .= '</div>';
        $input .= '</div>';
        $input .= '</div>';
        $input .= '</div>';
        return $input;
    }

    public function rederSelectOptionPersonalizado(array $ar, $label, $name, $id) {

        $so .='<div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">';
        $so .= '<div class="form-group">';
        $so .= $this->renderLabel($label);

        $so .= '<select data-placeholder="" name="' . $name . '"id="' . $id . '" class="chosen-select chosenlargura bs-select form-control"  tabindex="2" required="">';
        $so .= '<option></option>';
        foreach ($ar as $key => $v) {

            $so .= '<option value="' . $key . '" >' . $v . '</option>';
        }
        $so .= '</select></div></div>';

        return $so;
    }

    public function rederSelectOption(array $ar, $label, $name, $id, $value, $show, $largura = NULL, $funcao = null, $placeholder = NULL, $javascript = null) {
        $largura = isset($largura) ? $largura : "12";
        $placeholder = isset($placeholder) ? $placeholder : "";
        $javascript = isset($javascript) ? $javascript : "";
        print $placeholder;

        $so = '';

        $so .= '<div class = "col-md-' . $largura . ' col-sm-' . $largura . ' col-xs-12">';
        $so .= '<div class="form-group">';

        $so .= $this->renderLabel($label);

        $so .= '<select placeholder="' . $placeholder . '" onchange="' . $javascript . '" name="' . $name . '"id="' . $id . '" class="chosen-select chosenlargura bs-select form-control" >';
        $so .= '<option selected disabled>' . $placeholder . '</option>';
        
        foreach ($ar as $v) {
            $mostrar = isset($funcao) ? $funcao($v->$show) : $v->$show;

            $so .= '<option value="' . $v->$value . '" >' . $mostrar . '</option>';
        }
        $so .= '</select></div></div>';

        return $so;
    }

    public function rederSelectOptionAlterar(array $ar, $label, $name, $id, $value, $show, $codigoPessoaSelecionada = null, $largura = null, $javascript = null) {
        $javascript = isset($javascript) ? $javascript : "";
        $largura = isset($largura) ? $largura : "12";
        $so = '';
        $so .= '<div class = "col-md-' . $largura . ' col-sm-' . $largura . ' col-xs-12">';
        $so .= '<div class="form-group">';
        $so .= $this->renderLabel($label);

        $so .= '<select data-placeholder="" name="' . $name . '"id="' . $id . '" onchange="' . $javascript . '" class="chosen-select chosenlargura bs-select form-control"  tabindex="2" >';
        $so .= '<option></option>';
        foreach ($ar as $v) {
            $selecionado = (trim($v->$id) === trim($codigoPessoaSelecionada)) ? $selecionado = ' selected ' : '';
            $so .= '<option value="' . $v->$value . '" ' . $selecionado . '>' . $v->$show . '</option>';
        }
        $so .= '</select></div></div>';

        return $so;
    }

    public function rederBlue($divida) {
        $so = '';

        return $so;
    }

    public function rederbutton($valor, $onclick = null, $name = null, $class = "btn-primary") {
        return '<a  onclick="' . $onclick . '" name="' . $name . '" class="btn ' . $class . '">' . $valor . '</a>';
    }

    public function rederchexbox($id, $name, $label, $descricao) {
        return " <div class='form-group'>
        {$this->renderLabel($label)}<br />
            <label>
                    <div class='checker'>
                        <span class=''>
                <input type='checkbox' id='$id' class='$id' value='1' name='$name' /></span>
                            {$descricao}
                    </div></label></div>";
    }

    public function textArea($id, $name, $label, $largura, $row, $class, $conteudo) {
        $largura = !empty($largura) ? $largura : '';
        $row = !empty($largura) ? $row : 5;
        $class = !empty($class) ? $class : '';
        $conteudo = !empty($conteudo) ? $conteudo : '';
        return '<div class="col-lg-12 col-md-' . $largura . ' col-sm-' . $largura . ' col-xs-12">'
                . '<div class="form-group"> '
                . $this->renderLabel($label)
                . '<textarea  rows="' . $row . '" class="form-control ' . $class . ' " name="' . $name . '" id="' . $id . '" '
                . 'placeholder="">' . $conteudo . '</textarea></div></div>';
    }

    // Renderiza o fechamento da Form
    public function renderCloseForm() {
        $form = '';
        $form .= '</form>';

        return $form;
    }

    /**
     * *** MÉTODOS PÚBLICOS
     */
    public function render() {
        $html .= $this->renderOpenForm();
        $html .= $this->rederInput($id, $class, $value, $type, $label);
        $html .= $this->renderCloseForm();

        return $html;
    }

}
