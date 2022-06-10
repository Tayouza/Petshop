<?php

require "../model/PaisModel.php";
require "../DAO/PaisDao.php";

if (isset($_REQUEST['inserir'])) {

    if (!empty($_POST['txtNome'] && !empty($_POST['txtSigla']))) {
        $nome = $_POST['txtNome'];
        $sigla = $_POST['txtSigla'];

        $pais = new Pais($nome, $sigla);
        PaisDao::inserir($pais);
    }

    header("Location: ../view/FrmPais.php");
}

if (isset($_REQUEST['editar'])) {
    if (!empty($_POST['txtNome'] && !empty($_POST['txtSigla']))) {
        $pais = new Pais();
        $pais->setNome($_POST['txtNome']);
        $pais->setSigla($_POST['txtSigla']);
        $pais->setId($_GET['id']);
        PaisDao::editar($pais);
    }
    header("Location: ../view/FrmPais.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $pais = new PaisDao();
    $pais::excluir($id);
    header("Location: ../view/FrmPais.php");
}
