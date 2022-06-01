<?php
include_once "../DAO/Conexao.php";
include_once "../model/paisModel.php";

class PaisDao{
    public static function inserir($pais){
        $sql = "INSERT INTO pais(nome, sigla) VALUES ('{$pais->getNome()}', '{$pais->getSigla()}')";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, nome FROM pais ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_id, $_nome) = mysqli_fetch_row($result)){
                $pais = new Pais();
                $pais->setId($_id);
                $pais->setNome($_nome);
                $lista->append($pais);
            }
        }
        return $lista;
    }
}