<?php

include_once '../model/CidadeModel.php';
include_once '../DAO/CidadeDao.php';


if (isset($_REQUEST['inserir'])) {
    $nome = $_POST['txtNome'];
    $estado = $_POST['txtEstado'];
    $pais = $_POST['txtPais'];

    $cidade = new Cidade($nome, $estado, $pais);
    CidadeDao::inserir($cidade);

    header("Location: ../view/FrmCidade.php");
}

if(isset($_REQUEST['editar'])){
    $cidade = new Cidade();
    $cidade->setNome($_POST['txtNome']);
    $cidade->setEstado($_POST['txtEstado']);
    $cidade->setPais($_POST['txtPais']);
    $cidade->setId($_GET['id']);
    CidadeDao::editar($cidade);
    header("Location: ../view/FrmCidade.php");
}

if(isset($_REQUEST['excluir'])){
    $id = $_GET['id'];
    $cidade = new CidadeDao();
    $cidade::excluir($id);
    header("Location: ../view/FrmCidade.php");
}
