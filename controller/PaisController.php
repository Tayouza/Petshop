<?php

require "../model/PaisModel.php";
require "../DAO/PaisDao.php";

if(isset($_REQUEST['inserir'])){

    $nome = $_POST['txtNome'];
    $sigla = $_POST['txtSigla'];

    $pais = new Pais($nome, $sigla);

    echo 'Você cadastrou o Pais: '.$pais->getNome().', com a Sigla: '.$pais->getSigla();

    PaisDao::inserir($pais);


}