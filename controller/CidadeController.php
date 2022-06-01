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
