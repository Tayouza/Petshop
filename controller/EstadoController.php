<?php

include_once '../model/EstadoModel.php';
include_once '../DAO/EstadoDao.php';


if(isset($_REQUEST['inserir'])){
    $nome = $_POST['txtNome'];
    $uf = $_POST['txtSigla'];
    $pais = $_POST['txtPais'];

    $estado = new Estado($nome, $uf, $pais);
    echo "{$estado->getNome()} {$estado->getUf()} {$estado->getPais()}";
    EstadoDao::inserir($estado);

    header("Location: ../view/FrmEstado.php");
}