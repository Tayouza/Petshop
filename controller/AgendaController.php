<?php

require "../model/AgendaModel.php";
require "../DAO/AgendaDao.php";

if (isset($_REQUEST['inserir'])) {

    if (!empty($_POST['txtPet'] && !empty($_POST['txtData']))) {
        $pet = $_POST['txtPet'];
        $data = $_POST['txtData'];

        $agenda = new Agenda($pet, $data);
        AgendaDao::inserir($agenda);
    }

    header("Location: ../view/FrmAgenda.php");
}

if (isset($_REQUEST['editar'])) {
    if (!empty($_POST['txtPet'] && !empty($_POST['txtData']))) {
        $agenda = new Agenda();
        $agenda->setPet($_POST['txtPet']);
        $agenda->setData($_POST['txtData']);
        $agenda->setId($_GET['id']);
        AgendaDao::editar($agenda);
    }
    header("Location: ../view/FrmAgenda.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $agenda = new AgendaDao();
    AgendaDao::excluir($id);
    header("Location: ../view/FrmAgenda.php");
}
