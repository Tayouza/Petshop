<?php

include_once '../model/ClienteModel.php';
include_once '../DAO/ClienteDao.php';


if (isset($_REQUEST['inserir'])) {
    $nome = $_POST['txtNome'];
    $nacionalidade = $_POST['txtNacionalidade'];
    $cpf = $_POST['txtCPF'];
    $email = $_POST['txtEmail'];
    $telefone = $_POST['txtTelefone'];
    $cep = $_POST['txtCep'];
    $endereco = $_POST['txtEndereco'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    $cliente = new Cliente(
        $nome,
        $nacionalidade,
        $cpf,
        $email,
        $telefone,
        $cep,
        $endereco,
        $numero,
        $complemento
    );

    $cliente->setCidade($cidade);
    $cliente->setEstado($estado);
    $cliente->setPais($pais);

    ClienteDao::inserir($cliente);

    header("Location: ../view/FrmCliente.php");
}

if (isset($_REQUEST['editar'])) {
    $cidade = new Cidade();
    $cidade->setNome($_POST['txtNome']);
    $cidade->setEstado($_POST['txtEstado']);
    $cidade->setPais($_POST['txtPais']);
    $cidade->setId($_GET['id']);
    CidadeDao::editar($cidade);
    header("Location: ../view/FrmCidade.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $cidade = new CidadeDao();
    $cidade::excluir($id);
    header("Location: ../view/FrmCidade.php");
}

if (isset($_REQUEST['inserirJson'])) {
    $dados = (array) json_decode(file_get_contents("php://input"));
    $cidade = new Cidade($dados['nome'], $dados['estado'], $dados['pais']);
    CidadeDao::inserir($cidade);

    header("Location: ../view/FrmCidade.php");
}
