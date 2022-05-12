<?php
require "../DAO/Conexao.php";

class PaisDao{
    public static function inserir($pais){
        $sql = "INSERT INTO pais(nome, sigla) VALUES ('{$pais->getNome()}', '{$pais->getSigla()}')";
        Conexao::executar($sql);
    }
}