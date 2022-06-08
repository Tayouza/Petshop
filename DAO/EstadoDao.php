<?php
include_once "../DAO/Conexao.php";
include_once "../model/EstadoModel.php";

class EstadoDao
{
    public static function inserir($estado)
    {
        $sql = "INSERT INTO estado(nome, uf, id_pais)
                VALUES ('{$estado->getNome()}',
                '{$estado->getUf()}',
                '{$estado->getPais()}')";

        Conexao::executar($sql);
    }

    public static function buscar()
    {
        $sql = "SELECT id, nome, uf, id_pais FROM estado ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (list($_id, $_nome, $_uf, $_pais) = mysqli_fetch_row($result)) {
                $estado = new Estado();
                $estado->setId($_id);
                $estado->setNome($_nome);
                $estado->setUf($_uf);
                $estado->setPais($_pais);
                $lista->append($estado);
            }
        }
        return $lista;
    }

    public static function buscarId($id){
        $sql = "SELECT id, nome, uf, id_pais FROM estado WHERE estado.id = {$id}";
        $result = Conexao::consultar($sql);
        if ($result != null) {
            list($_id, $_nome, $_uf, $_pais) = mysqli_fetch_row($result);
            $estado = new Estado();
            $estado->setId($_id);
            $estado->setNome($_nome);
            $estado->setUf($_uf);
            $estado->setPais($_pais);
            return $estado;
        }
        return null;
    }

    public static function editar($estado)
    {
        $sql = "UPDATE estado SET 
                nome = '{$estado->getNome()}', 
                uf = '{$estado->getUf()}', 
                id_pais = '{$estado->getPais()}' 
                WHERE id = {$estado->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id)
    {
        $sql = "DELETE FROM estado WHERE estado.id = {$id}";
        Conexao::executar($sql);
    }

    public static function inserirSemPais($estado)
    {
        $sql = "INSERT INTO estado(nome, uf)
                VALUES ('{$estado->getNome()}',
                '{$estado->getUf()}')";

        Conexao::executar($sql);
    }
}
