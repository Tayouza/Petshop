<?php
include_once "../DAO/Conexao.php";
include_once "../model/CidadeModel.php";

class CidadeDao
{
    public static function inserir($cidade)
    {
        $sql = "INSERT INTO cidade(nome, id_estado, id_pais)
                VALUES ('{$cidade->getNome()}',
                '{$cidade->getEstado()}',
                '{$cidade->getPais()}')";

        Conexao::executar($sql);
    }

    public static function buscar()
    {
        $sql = "SELECT id, nome, id_estado, id_pais FROM cidade ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (list($_id, $_nome, $_estado, $_pais) = mysqli_fetch_row($result)) {
                $cidade = new cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $cidade->setEstado($_estado);
                $cidade->setPais($_pais);
                $lista->append($cidade);
            }
        }
        return $lista;
    }

    public static function buscarId($id)
    {
        $sql = "SELECT id, nome, id_estado, id_pais FROM cidade WHERE id = {$id}";
        $result = Conexao::consultar($sql);
        if ($result != null) {
            list($_id, $_nome, $_estado, $_pais) = mysqli_fetch_row($result);
            $cidade = new cidade();
            $cidade->setId($_id);
            $cidade->setNome($_nome);
            $cidade->setEstado($_estado);
            $cidade->setPais($_pais);
        }
        return $cidade;
    }

    public static function editar($cidade)
    {
        $sql = "UPDATE cidade SET 
                nome = '{$cidade->getNome()}', 
                id_estado = '{$cidade->getEstado()}', 
                id_pais = '{$cidade->getPais()}' 
                WHERE id = {$cidade->getId()}";
        Conexao::executar($sql);                
    }

    public static function excluir($id){
        $sql = "DELETE FROM cidade WHERE cidade.id = {$id}";
        Conexao::executar($sql);
    }

    public static function inserirSoComNome($cidade)
    {
        $sql = "INSERT INTO cidade(nome)
                VALUES ('{$cidade->getNome()}')";

        Conexao::executar($sql);
    }
}
