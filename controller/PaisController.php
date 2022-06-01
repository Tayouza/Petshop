<?php

require "../model/PaisModel.php";
require "../DAO/PaisDao.php";

if(isset($_REQUEST['inserir'])){

    $nome = $_POST['txtNome'];
    $sigla = $_POST['txtSigla'];

    $pais = new Pais($nome, $sigla);
    PaisDao::inserir($pais);

    header("Location: ../view/FrmPais.php");

}