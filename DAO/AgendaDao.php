<?php
include_once "../DAO/Conexao.php";
include_once "../model/AgendaModel.php";

class AgendaDao{
    public static function inserir($agenda){
        $sql = "INSERT INTO agendapet(id_pet, id_data) VALUES ('{$agenda->getPet()}', '{$agenda->getData()}')";
        Conexao::executar($sql);
        $sql = "UPDATE agendahora SET ativo = false WHERE id = '{$agenda->getData()}'";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, nome, sigla FROM agenda ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_id, $_pet, $_data) = mysqli_fetch_row($result)){
                $agenda = new Agenda();
                $agenda->setId($_id);
                $agenda->setPet($_pet);
                $agenda->setData($_data);
                $lista->append($agenda);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, id_pet, id_data FROM agendapet WHERE id = {$id}";
        $result = Conexao::consultar($sql);
        if($result != null){
            list($_id, $_pet, $_data) = mysqli_fetch_row($result);
            $agenda = new Agenda();
            $agenda->setId($_id);
            $agenda->setPet($_pet);
            $agenda->setData($_data);
            return $agenda;
        }
        return null;
    }

    public static function buscarNome($id){
        $sql = "SELECT pet.nome FROM agendapet INNER JOIN pet ON agendapet.id_pet = pet.id WHERE id_data = {$id}";
        $result = Conexao::consultar($sql);
        if($result != null){
            list($_pet) = mysqli_fetch_row($result);
            $agenda = new Agenda();
            $agenda->setPet($_pet);
            return $agenda->getPet();
        }
        return null;
    }

    public static function editar($agenda){
        $sql = "UPDATE agenda SET 
                nome = '{$agenda->getNome()}',
                sigla = '{$agenda->getSigla()}' 
                WHERE id = {$agenda->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id){
        $sql = "DELETE FROM agendapet WHERE id_data = {$id}";
        Conexao::executar($sql);
        $sql = "UPDATE agendahora SET ativo = true WHERE id = {$id}";
        Conexao::executar($sql);
    }
}