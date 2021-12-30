<?php

require_once 'obj.php';

abstract class Crud extends DB {

    protected $table;
    protected $orderby;

    public function insert($table, array $dados, $bool = true) {
        try {
            if ($bool == true) {

                $this->beginTransaction();
            }

            $sql = "INSERT INTO $table ({$this->colunas($table)->selecaoParametros}) VALUES ({$this->colunas($table)->selecaoValores})";
            $stmt = DB::prepare($sql);
            foreach ($dados as $key => $v) {
                $stmt->bindValue(':' . $key, $v);
            }
           // print'<pre>';
           // var_dump($stmt->debugDumpParams());
           // print'</pre>';
            if ($stmt->execute()) {
                $cd = DB::getInstance()->lastInsertId();
                return $cd;
            } else {
                echo json_encode("Erro ao Inserir!");
                return false;
            }
        } catch (PDOException $e) {
//           echo 'Error: ' . $e->getMessage();
            $ret = array('erro' => 'Error: ' . $e->getMessage());
            echo json_encode('Error: ' . $e->getMessage());
            
        }
    }

    public function update($tabela, $dados, $bool = true) {
        try {
            if ($bool == true) {

                $this->beginTransaction();
            }
            $up = $this->colunasAlterar($dados, $tabela);

            $sql = "UPDATE {$tabela} SET {$up} WHERE {$this->colunas($tabela)->primeiroRegistro} = :{$this->colunas($tabela)->primeiroRegistro}";
            $stmt = DB::prepare($sql);

            foreach ($dados as $key => $v) {
                $stmt->bindValue(':' . $key, $v);
            }
//            print'<pre>';
//            $stmt->debugDumpParams();
//            print'</pre>';

            if ($stmt->execute()) {
                return true;
            } else {
                echo json_encode("Erro ao Alterar!");
                return false;
            }
        } catch (PDOException $e) {
            echo '<br />Error: ' . $e->getMessage();
        }
    }

    public function find($id, $table, array $join = NULL) {
        $sql[] = "SELECT * FROM $table";
        $sql[] = implode('', (array) $join);
        $sql[] = "  WHERE {$this->colunas($table)->primeiroRegistro} = :{$this->colunas($table)->primeiroRegistro}";
        $stmt = DB::prepare(implode("", $sql));
        $stmt->bindParam(':' . $this->colunas($table)->primeiroRegistro, $id, PDO::PARAM_INT);
        $stmt->execute();
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
        return $stmt->fetch();
    }

    public function search($campo, $id, $table) {
        $sql = "SELECT * FROM $table WHERE {$this->colunas($table, $campo)->busca} = :{$this->colunas($table, $campo)->busca}";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':' . $this->colunas($table, $campo)->busca, $id);
        $stmt->execute();
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
        return $stmt->fetch();
    }

    public function selectAll($campos, $tabela, array $join, $filtro) {
        // selecionar campos automatico {$this->colunas()->select} no lugar do (*)
        $sql [] = "SELECT {$campos} FROM $tabela pd ";
        $sql [] = implode('', $join);
        $sql [] = $filtro;
        // $sql [] = " order by {$this->orderby}";

        $stmt = DB::prepare(implode("", $sql));
        $stmt->execute();
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
        return $stmt->fetchAll();
    }

    public function delete($id, $table, $bool = true) {
        try {
            if ($bool == true) {
                $this->beginTransaction();
            }

            $sql = "DELETE FROM $table WHERE {$this->colunas($table)->primeiroRegistro} = :{$this->colunas($table)->primeiroRegistro}";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':' . $this->colunas($table)->primeiroRegistro, $id, PDO::PARAM_INT);
//            print'<pre>';
//            $stmt->debugDumpParams();
//            print'</pre>';
            if ($stmt->execute()) {
                return true;
            } else {
                echo json_encode("Erro ao Excluido!");
                return false;
            }
        } catch (PDOException $e) {
            $this->rollBack();
            echo json_encode('Error: ' . $e->getMessage());
        }
    }

    public function deleteFk($id, $table, $bool = true, $fk) {
        if ($bool == true) {
            $this->beginTransaction();
        }
        $sql = "DELETE FROM $table WHERE {$fk} = :{$fk}";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':' . $fk, $id, PDO::PARAM_INT);
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
        if ($stmt->execute()) {
//            echo json_encode("Excluido com sucesso!");
            return true;
        } else {
            echo json_encode("Erro ao Excluido!");
            return false;
        }
    }

    public function deleteAll($table, $bool = true) {
        if ($bool == true) {
            $this->beginTransaction();
        }
        $sql = "DELETE FROM $table";
        $stmt = DB::prepare($sql);
//        $stmt->bindParam(':' . $this->colunas($table)->primeiroRegistro, $id, PDO::PARAM_INT);
//        print'<pre>';
//        $stmt->debugDumpParams();
//        print'</pre>';
        if ($stmt->execute()) {
            //modalSalvo("Excluido com sucesso");
            echo json_encode("Excluido com sucesso!");
            return true;
        } else {
            echo json_encode("Erro ao excluir!");
            return false;
        }
    }

    public function colunasAlterar(array $dados, $tabela = null) {
        foreach ($dados as $key => $v) {
            $indiceUpdatet [] = $key . '=:' . $key;
        }
        $primarykey = $this->colunas($tabela)->primeiroRegistro;
        $pk = $primarykey . '=:' . $primarykey;

        $remover = array($pk);
        $resultado = array_diff($indiceUpdatet, $remover);


        return implode(",", $resultado);
    }

    public function colunas($table, $campo = null) {
        $obj = new stdObject ();

        $Query = DB::prepare("SHOW COLUMNS FROM " . $table);
        $Query->execute();

        while ($e = $Query->fetch(PDO::FETCH_ASSOC)) {
            $cln [] = $e ['Field'];
            $obj->colunas [] = '<td>' . $e ['Field'] . '</td>';
            $indice [] = ':' . $e ['Field'];

            $selecaoParametro [] = $e ['Field'];
            $selecaoValores [] = ':' . $e ['Field'];

            $indiceUpdate [] = $e ['Field'] . '=:' . $e ['Field'];
            if ($campo != null) {
                if ($e['Field'] == $campo) {
                    $busca = $e['Field'];
                }
            }
        }
        unset($indiceUpdate[0]);

        unset($selecaoParametro[0]);
        unset($selecaoValores[0]);
//        seeArray($cln);
//        seeArray($indice);
        $obj->primeiroRegistro = $cln [0];
        @ $obj->busca = $busca;
        $obj->select = implode(",", $cln);
        $obj->indiceInsert = implode(",", $indice);

        $obj->selecaoParametros = implode(",", $selecaoParametro);
        $obj->selecaoValores = implode(",", $selecaoValores);

        $obj->indiceUp = implode(",", $indiceUpdate);

        return $obj;
        // return implode(",",$colunas);
    }

    public function beginTransaction() {
        DB::getInstance()->beginTransaction();
    }

    public function rollBack() {
        DB::getInstance()->rollBack();
    }

    public function commit() {
        if (DB::getInstance()->commit()) {
            echo json_encode("ok");
        }
    }

}
