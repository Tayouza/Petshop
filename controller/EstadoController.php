<?php
include '../view/templates/header.php';
include_once '../model/EstadoModel.php';
include_once '../DAO/EstadoDao.php';


if (isset($_REQUEST['inserir'])) {
    if (!empty($_POST['txtNome'] && !empty($_POST['txtSigla']) && !empty($_POST['txtPais']))) {
        $nome = $_POST['txtNome'];
        $uf = $_POST['txtSigla'];
        $pais = $_POST['txtPais'];

        $estado = new Estado($nome, $uf, $pais);
        EstadoDao::inserir($estado);
    }

    header("Location: ../view/FrmEstado.php");
}

if (isset($_REQUEST['editar'])) {
    if (!empty($_POST['txtNome'] && !empty($_POST['txtSigla']) && !empty($_POST['txtPais']))) {
        $estado = new Estado();
        $estado->setNome($_POST['txtNome']);
        $estado->setUf($_POST['txtSigla']);
        $estado->setPais($_POST['txtPais']);
        $estado->setId($_GET['id']);
        EstadoDao::editar($estado);
    }
    header("Location: ../view/FrmEstado.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $estado = new EstadoDao();
    $estado::excluir($id);
    header("Location: ../view/FrmEstado.php");
}
