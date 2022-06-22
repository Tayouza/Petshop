<?php
include_once "../DAO/Conexao.php";
include_once "../model/InfoAgendamentoModel.php";

class InfoAgendamentoDao{
    public static function inserir($infoAgendamento){
        $sql = "INSERT INTO infoAgendamento(nome, sigla) VALUES ('{$infoAgendamento->getNome()}', '{$infoAgendamento->getSigla()}')";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT tutor.nome, pet.nome, ah.hora
                FROM pet 
                INNER JOIN cliente as tutor
                ON pet.id_tutor = tutor.id
                INNER JOIN agendapet as ap
                ON ap.id_pet = pet.id
                INNER JOIN agendahora as ah
                ON ap.id_data = ah.id
                ORDER BY tutor.nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_tutorNome, $_petNome, $_hora) = mysqli_fetch_row($result)){
                $infoAgendamento = new InfoAgendamento();
                $infoAgendamento->setNomeTutor($_tutorNome);
                $infoAgendamento->setNomePet($_petNome);
                $infoAgendamento->setHora($_hora);
                $lista->append($infoAgendamento);
            }
        }
        return $lista;
    }

    public static function buscarCpf($cpf){
        $sql = "SELECT tutor.nome, pet.nome, ad.data, ah.hora
        FROM pet 
        INNER JOIN cliente as tutor
        ON pet.id_tutor = tutor.id
        INNER JOIN agendapet as ap
        ON ap.id_pet = pet.id
        INNER JOIN agendahora as ah
        ON ap.id_data = ah.id
        INNER JOIN agendadata as ad
        ON ah.id_data = ad.id
        WHERE tutor.cpf = '{$cpf}'
        ORDER BY tutor.nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_tutorNome, $_petNome, $_data, $_hora) = mysqli_fetch_row($result)){
                $infoAgendamento = new InfoAgendamento();
                $infoAgendamento->setNomeTutor($_tutorNome);
                $infoAgendamento->setNomePet($_petNome);
                $infoAgendamento->setData($_data);
                $infoAgendamento->setHora($_hora);
                $lista->append($infoAgendamento);
            }
        }
        return $lista;
    }
}