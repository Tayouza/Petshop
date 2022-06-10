<?php

require "../model/PetModel.php";
require "../DAO/PetDao.php";

if (isset($_REQUEST['inserir'])) {
    if (!empty($_POST['txtNome'] &&
        !empty($_POST['txtTutor']) &&
        !empty($_POST['txtRaca']) &&
        !empty($_POST['txtIdade']) &&
        !empty($_POST['infos']))) {

        $nome = $_POST['txtNome'];
        $tutor = $_POST['txtTutor'];
        $raca = $_POST['txtRaca'];
        $idade = $_POST['txtIdade'];
        $infos = $_POST['infos'];

        $pet = new Pet($nome, $tutor, $raca, $idade, $infos);
        PetDao::inserir($pet);
    }

    header("Location: ../view/FrmPet.php");
}

if (isset($_REQUEST['editar'])) {
    $pet = new Pet();
    $pet->setNome($_POST['txtNome']);
    $pet->setTutor($_POST['txtTutor']);
    $pet->setRaca($_POST['txtRaca']);
    $pet->setIdade($_POST['txtIdade']);
    $pet->setInfos($_POST['infos']);
    $pet->setId($_GET['id']);
    PetDao::editar($pet);
    header("Location: ../view/FrmPet.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $pet = new PetDao();
    $pet::excluir($id);
    header("Location: ../view/FrmPet.php");
}
