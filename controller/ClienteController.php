<?php

include_once '../model/ClienteModel.php';
include_once '../DAO/ClienteDao.php';


if (isset($_REQUEST['inserir'])) {

    if (!empty($_POST['txtNome'] &&
        !empty($_POST['txtNacionalidade']) &&
        !empty($_POST['txtCPF']) &&
        !empty($_POST['txtEmail']) &&
        !empty($_POST['txtTelefone']) &&
        !empty($_POST['txtCep']) &&
        !empty($_POST['txtEndereco']) &&
        !empty($_POST['txtNumero']) &&
        !empty($_POST['txtComplemento']) &&
        !empty($_POST['cidade']) &&
        !empty($_POST['estado']) &&
        !empty($_POST['pais']))) {
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
        $uf = $_POST['txtUf'];

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

        $cliente->setPaisNome($pais);

        if (isset($uf))
            $cliente->setEstadoNome($estado, $uf, $pais);
        else
            $cliente->setEstadoNome($estado);

        $cliente->setCidadeNome($cidade, $estado, $pais);

        ClienteDao::inserir($cliente);
    }

    header("Location: ../view/FrmCliente.php");
}

if (isset($_REQUEST['editar'])) {
    if (!empty($_POST['txtNome'] &&
        !empty($_POST['txtNacionalidade']) &&
        !empty($_POST['txtCPF']) &&
        !empty($_POST['txtEmail']) &&
        !empty($_POST['txtTelefone']) &&
        !empty($_POST['txtCep']) &&
        !empty($_POST['txtEndereco']) &&
        !empty($_POST['txtNumero']) &&
        !empty($_POST['txtComplemento']) &&
        !empty($_POST['cidade']) &&
        !empty($_POST['estado']) &&
        !empty($_POST['pais']))) {
        $cliente = new Cliente();
        $cliente->setNome($_POST['txtNome']);
        $cliente->setNacionalidade($_POST['txtNacionalidade']);
        $cliente->setCpf($_POST['txtCPF']);
        $cliente->setEmail($_POST['txtEmail']);
        $cliente->setTelefone($_POST['txtTelefone']);
        $cliente->setCep($_POST['txtCep']);
        $cliente->setEndereco($_POST['txtEndereco']);
        $cliente->setNumero($_POST['txtNumero']);
        $cliente->setComplemento($_POST['txtComplemento']);
        $cliente->setPaisNome($_POST['pais']);
        $cliente->setEstadoNome($_POST['estado']);
        $cliente->setCidadeNome($_POST['cidade']);
        $cliente->setId($_GET['id']);
        ClienteDao::editar($cliente);
    }
    header("Location: ../view/FrmCliente.php");
}

if (isset($_REQUEST['excluir'])) {
    $id = $_GET['id'];
    $cliente = new ClienteDao();
    $cliente::excluir($id);
    header("Location: ../view/FrmCliente.php");
}
