<?php
include_once "../DAO/PaisDao.php";
include_once "../DAO/EstadoDao.php";
include_once "../DAO/CidadeDao.php";
include_once "../DAO/ClienteDao.php";

$action = 'inserir';

if (isset($_REQUEST['editar'])) {
    $cliente = ClienteDao::buscarId($_GET['id']);
    $values['nome'] = $cliente->getNome();
    $values['nacionalidade'] = $cliente->getNacionalidade();
    $values['cpf'] = $cliente->getCpf();
    $values['email'] = $cliente->getEmail();
    $values['telefone'] = $cliente->getTelefone();
    $values['cep'] = $cliente->getCep();
    $values['endereco'] = $cliente->getEndereco();
    $values['numero'] = $cliente->getNumero();
    $values['complemento'] = $cliente->getComplemento();
    $values['pais'] = $cliente->getPais();
    $values['estado'] = $cliente->getEstado();
    $values['cidade'] = $cliente->getCidade();
    $action = "editar&id={$cliente->getId()}";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/loading.css">
    <title>Cadastro de cliente</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xxl navbar-light bg-light">
            <div class="d-flex container">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/logo.jpg" style="border-radius: 50%;" width="100px" alt="">
                </a>
                <h1><a href="../index.php" class="d-xxl-none" style="text-decoration: none; color: black">Petshop Tay</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">
                                <ion-icon name="home"></ion-icon> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmAgenda.php">
                                <ion-icon name="calendar"></ion-icon> agenda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmCliente.php">
                                <ion-icon name="people"></ion-icon> Cadastrar Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmPet.php">
                                <ion-icon name="paw"></ion-icon> Cadastrar Pet
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmCidade.php">
                                <ion-icon name="trail-sign"></ion-icon> Cadastrar Cidade
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmEstado.php">
                                <ion-icon name="map"></ion-icon> Cadastrar Estado
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmPais.php">
                                <ion-icon name="earth"></ion-icon> Cadastrar País
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FrmInfoAgendamento.php">
                                <ion-icon name="information-circle"></ion-icon> informações sobre agendamento
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container p-2">
        <fieldset>
            <legend>Cadastro de cliente</legend>
            <form method="POST" action="../controller/ClienteController.php?<?= $action ?>">
                <label class="form-label">Nome: </label>
                <input type="text" value="<?= $values['nome'] ?? '' ?>" placeholder="Nome" class="form-control" name="txtNome" required>

                <label class="form-label">Nacionalidade: </label>
                <input type="text" value="<?= $values['nacionalidade'] ?? '' ?>" placeholder="Nacionalidade" class="form-control" name="txtNacionalidade" required>

                <label class="form-label">CPF ou Passaporte: </label>
                <input type="text" value="<?= $values['cpf'] ?? '' ?>" placeholder="CPF ou Passaporte" class="form-control" name="txtCPF" id="cpf" required>

                <label class="form-label">E-mail: </label>
                <input type="email" value="<?= $values['email'] ?? '' ?>" placeholder="E-mail" class="form-control" name="txtEmail" required>

                <label class="form-label">Telefone: </label>
                <input type="tel" value="<?= $values['telefone'] ?? '' ?>" placeholder="Telefone" class="form-control" id="telefone" name="txtTelefone" required>

                <label class="form-label">CEP: (8 digitos)</label>
                <input type="text" value="<?= $values['cep'] ?? '' ?>" placeholder="CEP" id="cep" onblur="getEndereco()" class="form-control" pattern="\d{5}-?\d{3}" name="txtCep" required>

                <!--loading buscar cep-->
                <div class="loading">
                    <div class="spinner-border" role="status">
                        <span class="sr-only"></span>
                    </div>
                </div>

                <label class="form-label">Endereço: </label>
                <input type="text" value="<?= $values['endereco'] ?? '' ?>" placeholder="Endereço" name="txtEndereco" id="endereco" class="form-control" required>

                <label class="form-label">Número: </label>
                <input type="text" value="<?= $values['numero'] ?? '' ?>" placeholder="Número" name="txtNumero" class="form-control" required>

                <label class="form-label">Complemento: </label>
                <input type="text" value="<?= $values['complemento'] ?? '' ?>" placeholder="Complemento" name="txtComplemento" class="form-control" required>

                <label class="form-label">Cidade: </label>
                <select class="form-select" name="cidade" id="cidade" required>
                    <?php
                    $listaCidade = CidadeDao::buscar();
                    foreach ($listaCidade as $cidades) {
                        echo "<option " . ($values['cidade'] == $cidades->getNome() ? 'selected' : '') . " value='{$cidades->getNome()}' nome='{$cidades->getNome()}'>{$cidades->getNome()}</option>";
                    }
                    ?>
                </select>

                <label class="form-label">Estado: </label>
                <select class="form-select" name="estado" id="estado" required>
                    <?php
                    $listaEstado = EstadoDao::buscar();
                    foreach ($listaEstado as $estados) {
                        echo "<option ". ($values['estado'] == $estados->getNome() ? 'selected' : '') ." value='{$estados->getNome()}' uf='{$estados->getUf()}' nome='{$estados->getNome()}'>{$estados->getNome()}</option>";
                    }
                    ?>
                </select>
                
                <label class="form-label">Pais: </label>
                <select class="form-select" name="pais" id="pais" required>
                    <?php
                    $listaPais = PaisDao::buscar();
                    foreach ($listaPais as $paises) {
                        echo "<option ". ($values['pais'] == $paises->getNome() ? 'selected' : '') ." value='{$paises->getNome()}'>{$paises->getNome()}</option>";
                    }
                    ?>
                </select>


                <a href="FrmPet.php" class="btn btn-primary my-3">Cadastre o seu Pet</a>
                <input type="reset" value="Limpar" class="btn btn-warning">
                <input type="submit" value="<?= isset($_REQUEST['editar']) ? 'Editar' : 'Cadastrar' ?>" class="btn btn-success">
            </form>
        </fieldset>
        <fieldset>
            <legend>Dados recém cadastrados</legend>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Nome</th>
                            <th>Nacionalidade</th>
                            <th>CPF ou Passaporte</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Cep</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Complemento</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Pais</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $listaCliente = ClienteDao::buscar();
                        foreach ($listaCliente as $cliente) {
                            echo '<tr class="text-nowrap">';
                            echo "<td>{$cliente->getNome()}</td>";
                            echo "<td>{$cliente->getNacionalidade()}</td>";
                            echo "<td>{$cliente->getCpf()}</td>";
                            echo "<td>{$cliente->getEmail()}</td>";
                            echo "<td>{$cliente->getTelefone()}</td>";
                            echo "<td>{$cliente->getCep()}</td>";
                            echo "<td>{$cliente->getEndereco()}</td>";
                            echo "<td>{$cliente->getNumero()}</td>";
                            echo "<td>{$cliente->getComplemento()}</td>";
                            echo "<td>{$cliente->getCidade()}</td>";
                            echo "<td>{$cliente->getEstado()}</td>";
                            echo "<td>{$cliente->getPais()}</td>";
                            echo "<td class='text-center'>
                                    <a href='FrmCliente.php?editar&id={$cliente->getId()}' class='btn btn-success'>Editar</a>
                                    <a local='Cliente' key='{$cliente->getId()}' class='btn btn-danger excluir'>Excluir</a>
                                </td>";
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    <?php
    include "templates/footer.php";
    ?>