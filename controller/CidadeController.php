<?php

if(isset($_REQUEST['inserir'])){

    $nome = $_POST['txtNome'];
    $sigla = $_POST['txtSigla'];
    $pais = $_POST['txtPais'];
    $cep = $_POST['txtCep'];

    echo $nome.' '.$sigla.' '.$pais.' '.$cep;

}