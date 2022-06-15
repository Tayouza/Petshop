<?php
include_once "../DAO/Conexao.php";
include_once "../model/AbrirAgendaModel.php";

class AbrirAgendaDao
{
    public static function inserir($abrirAgenda)
    {
        $dataJaNoBanco = self::buscarPorData($abrirAgenda->getData());
        if ($dataJaNoBanco->getId() == null) {  //data não está no banco 
            $sql = "INSERT INTO agendadata(data) VALUES ('{$abrirAgenda->getData()}')";
            Conexao::executar($sql);
            $dataJaNoBanco = self::buscarPorData($abrirAgenda->getData());
            $sql = "INSERT INTO agendahora(hora, id_data) VALUES ('{$abrirAgenda->getHora()}', '{$dataJaNoBanco->getId()}')";
            Conexao::executar($sql);
        } else {
            $horaJaNoBanco = self::buscarPorHora($abrirAgenda->getHora(), $dataJaNoBanco->getId());
            if ($horaJaNoBanco->getId() == null) {
                $sql = "INSERT INTO agendahora(hora, id_data) VALUES ('{$abrirAgenda->getHora()}', '{$dataJaNoBanco->getId()}')";
                Conexao::executar($sql);
            }
        }
    }

    public static function inserirDiaTodo($data)
    {
        $dataJaNoBanco = self::buscarPorData($data);
        $hora = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
        if ($dataJaNoBanco->getId() == null) {  //data não está no banco 
            $sql = "INSERT INTO agendadata(data) VALUES ('{$data}')";
            Conexao::executar($sql);
            for ($i = 0; $i < count($hora); $i++) {
                $dataJaNoBanco = self::buscarPorData($data);
                $horaJaNoBanco = self::buscarPorHora($hora[$i], $dataJaNoBanco->getId());
                if ($horaJaNoBanco->getId() == null) {
                    $sql = "INSERT INTO agendahora(hora, id_data) VALUES ('{$hora[$i]}', '{$dataJaNoBanco->getId()}')";
                    Conexao::executar($sql);
                }
            }
        } else {
            for ($i = 0; $i < count($hora); $i++) {
                $horaJaNoBanco = self::buscarPorHora($hora[$i], $dataJaNoBanco->getId());
                if ($horaJaNoBanco->getId() == null) {
                    $sql = "INSERT INTO agendahora(hora, id_data) VALUES ('{$hora[$i]}', '{$dataJaNoBanco->getId()}')";
                    Conexao::executar($sql);
                }
            }
        }
    }

    public static function buscar()
    {
        $sql = "SELECT id, data FROM agendadata";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (list($_id, $_data) = mysqli_fetch_row($result)) {
                $abrirAgenda = new AbrirAgenda();
                $abrirAgenda->setId($_id);
                $abrirAgenda->setData($_data);
                $abrirAgenda->setDataFormatada($_data);
                $lista->append($abrirAgenda);
            }
        }
        return $lista;
    }

    public static function buscarPorData($data)
    {
        $sql = "SELECT id, data FROM agendadata WHERE data = '{$data}'";
        $result = Conexao::consultar($sql);
        if ($result != null) {
            list($_id, $_data) = mysqli_fetch_row($result);
            $abrirAgenda = new abrirAgenda();
            $abrirAgenda->setId($_id);
            $abrirAgenda->setData($_data);
            $abrirAgenda->setDataFormatada($_data);
            return $abrirAgenda;
        }
        return null;
    }

    public static function buscarPorHora($hora, $id_data)
    {
        $sql = "SELECT id, hora FROM agendahora WHERE hora = '{$hora}' AND id_data = '{$id_data}'";
        $result = Conexao::consultar($sql);
        if ($result != null) {
            list($_id, $_hora) = mysqli_fetch_row($result);
            $abrirAgenda = new abrirAgenda();
            $abrirAgenda->setId($_id);
            $abrirAgenda->setHora($_hora);
            return $abrirAgenda;
        }
        return null;
    }

    public static function buscarHorarios($id_data)
    {
        $sql = "SELECT id, hora FROM agendahora WHERE id_data = '{$id_data}'";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if ($result != null) {
            while (list($_id, $_hora) = mysqli_fetch_row($result)) {
                $abrirAgenda = new AbrirAgenda();
                $abrirAgenda->setId($_id);
                $abrirAgenda->setHora($_hora);
                $lista->append($abrirAgenda);
            }
        }
        return $lista;
    }

    public static function editar($abrirAgenda)
    {
        $sql = "UPDATE abrirAgenda SET 
                data = '{$abrirAgenda->getNome()}',
                hora = '{$abrirAgenda->getSigla()}' 
                WHERE id = {$abrirAgenda->getId()}";
        Conexao::executar($sql);
    }

    public static function excluir($id)
    {
        $exploded = explode('-', $id);
        if($exploded[0] == 'data'){
            $sql = "DELETE FROM agendadata WHERE agendadata.id = {$exploded[1]}";
        }else{
            $sql = "DELETE FROM agendahora WHERE agendahora.id = {$exploded[0]}";
        }
        Conexao::executar($sql);
    }
}
