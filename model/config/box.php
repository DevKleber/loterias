<?php

class box {

    public function boxLink($mostrar) {
        $dvLink = '';
        if (!$mostrar == '') {
            $dvLink .='<a href="?md='.  getUrl('md').'&rt='.  getUrl('rt').'&pagina=' . getUrl('pagina') . '&acao=form"><button class="btn red" style="color: white;">' . $mostrar . '</button></a>';
            return $dvLink;
        } else {
            return false;
        }
    }

    public function boxInicio($titulo, $valorBotaoIncluir) {
        $dvInicio = '';
        $dvInicio .='
            <div class="portlet grey-cascade box">  
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>' . $titulo . '
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                                ' . $this->boxLink($valorBotaoIncluir) . '
                            </div>
                        </div>
                        <div class="portlet-body">
                ';
        return $dvInicio;
    }
    public function boxInicioDefault($titulo, $valorBotaoIncluir) {
        $dvInicio = '';
        $dvInicio .='
            <div class="portlet panel-default box">  
                        <div class="portlet-title">
                            <div class="caption" style="color:#686868">
                                <i class="fa fa-cogs"></i>' . $titulo . '
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                                ' . $this->boxLink($valorBotaoIncluir) . '
                            </div>
                        </div>
                        <div class="portlet-body">
                ';
        return $dvInicio;
    }

    public function boxFim() {
        $dvFim = '';
        $dvFim .='</div>';
        return $dvFim;
    }

}
