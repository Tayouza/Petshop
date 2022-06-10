<?php
include_once "../DAO/Conexao.php";
include_once "../model/petModel.php";

class PetDao{
    public static function inserir($pet){
        $sql = "INSERT INTO pet(nome, id_tutor, raca, idade, infos)
        VALUES ('{$pet->getNome()}', 
                '{$pet->getTutor()}', 
                '{$pet->getRaca()}', 
                '{$pet->getIdade()}', 
                '{$pet->getInfos()}'
                )";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT pet.id, pet.nome, tutor.nome, raca, idade, infos 
                FROM pet
                LEFT JOIN cliente as tutor
                ON id_tutor = tutor.id
                ";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_id, $_nome, $_tutor, $_raca, $_idade, $_infos) = mysqli_fetch_row($result)){
                $pet = new Pet();
                $pet->setId($_id);
                $pet->setNome($_nome);
                $pet->setTutor($_tutor);
                $pet->setRaca($_raca);
                $pet->setIdade($_idade);
                $pet->setInfos($_infos);
                $lista->append($pet);
            }
        }
        return $lista;
    }

    public static function buscarId($id){
        $sql = "SELECT pet.id, pet.nome, tutor.nome, raca, idade, infos 
        FROM pet
        LEFT JOIN cliente as tutor
        ON id_tutor = tutor.id
        WHERE pet.id = {$id}";
        $result = Conexao::consultar($sql);
        if($result != null){
            list($_id, $_nome, $_tutor, $_raca, $_idade, $_infos) = mysqli_fetch_row($result);
            $pet = new Pet();
            $pet->setId($_id);
            $pet->setNome($_nome);
            $pet->setTutor($_tutor);
            $pet->setRaca($_raca);
            $pet->setIdade($_idade);
            $pet->setInfos($_infos);
            return $pet;
        }
        return null;
    }

    public static function editar($pet){
        $sql = "UPDATE pet SET 
                nome = '{$pet->getNome()}',
                sigla = '{$pet->getSigla()}' 
                WHERE id = {$pet->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id){
        $sql = "DELETE FROM pet WHERE pet.id = {$id}";
        Conexao::executar($sql);
    }
}