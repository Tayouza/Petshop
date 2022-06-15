<?php

require "../model/AbrirAgendaModel.php";
require "../DAO/AbrirAgendaDao.php";

if (isset($_REQUEST['inserir'])) {

    if (!empty($_POST['txtData'])) {
        $data = $_POST['txtData'];
        
        if ($_POST['diaTodo'] == 'sim') {
            AbrirAgendaDao::inserirDiaTodo($data);
        } else if (empty($_POST['txtHora'])) {
            header("Location: ../view/FrmAbrirAgenda.php");
        } else {
            $agenda = new AbrirAgenda($data, $_POST['txtHora']);
            AbrirAgendaDao::inserir($agenda);
        }
        header("Location: ../view/FrmAbrirAgenda.php");
    }
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $agenda = new AbrirAgendaDao();
    $agenda::excluir($id);
    header("Location: ../view/FrmAbrirAgenda.php");
}

if (isset($_REQUEST['txtData'])) {
    var_dump($_GET);
}
