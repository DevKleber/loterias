
<?php

class megasena extends Crud {

    protected $table = "megasena_jogo";
    protected $orderby = "cd_tipotreino_itens";


    public function listarAll($concurso) {
        $usuario = $_COOKIE['MEGA_ID_USER'];      
        $join = array("
            where cd_user = $usuario and nu_concurso = $concurso
            ");
            
        $ar = $this->selectAll("*", $this->table, $join, "");
        return $ar;
    }
    public function listarAllLotoFacil($concurso) {
        $usuario = $_SESSION['MEGA_ID_USER'];        
        $join = array("
            where cd_user = $usuario and nu_concurso = '$concurso'
            ");
        $ar = $this->selectAll("*", 'megasena_jogo_lotofacil', $join, "");
        return $ar;
    }

    public function find($cd) {
        $join = array("
            where cd_user = $cd 
            ");
        $ar = $this->selectAll("*", "megasena_user", $join, "");
        return $ar;
    }   

    public function incluir() {
        self::insert($this->table, $this->dados());
        self::commit();
    }

    public function incluirUser($login,$senha) {
        $dados = $this->dados();
        $dados['login'] = $login;
        $dados['senha'] = $senha;
        $codigo = self::insert("megasena_user", $dados);

        self::commit();
        setcookie("MEGA_ID_USER",$codigo,strtotime( '+1080 days' ));
        $_SESSION['mega_cd_user'] = $codigo;
    }

    public function saveNumeros() {
        $usuario = $_COOKIE['MEGA_ID_USER'];  

        $numeros = $_REQUEST['numeros'];
        $dezenas = explode(",", $numeros);
        $dados  = $_REQUEST["item"];
        
        $dados['nu_um'] = $dezenas[0];
        $dados['nu_dois'] = $dezenas[1];
        $dados['nu_tres'] = $dezenas[2];
        $dados['nu_quatro'] = $dezenas[3];
        $dados['nu_cinco'] = $dezenas[4];
        $dados['nu_seis'] = $dezenas[5];
        $dados['cd_user'] = $usuario;
        
        self::insert("megasena_jogo", $dados);
        self::commit();
    }


    public function excluir() {
        self::delete($_REQUEST["cd"], $this->table);
        self::commit();
    }

    
    public function dados() {
        $dados = $_REQUEST["item"];
        return $dados;
    }


}
