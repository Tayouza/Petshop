<?php

include_once "../DAO/ClienteDao.php";
include_once "../DAO/PetDao.php";

$action = 'inserir';
$listaClientes = ClienteDao::buscar();

if (isset($_REQUEST['editar'])) {
    $petId = PetDao::buscarId($_GET['id']);
    $values['nome'] = $petId->getNome();
    $values['tutor'] = $petId->getTutor();
    $values['raca'] = $petId->getRaca();
    $values['idade'] = $petId->getIdade();
    $values['infos'] = $petId->getInfos();
    $action = "editar&id={$petId->getId()}";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Pet</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="FrmAbrirAgenda.php">
                            <ion-icon name="list-outline"></ion-icon> Abrir Agenda
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <fieldset>
            <legend>Cadastro de pet</legend>
            <form method="POST" action="../controller/PetController.php?<?= $action ?>">
                <label class="form-label">Nome: </label>
                <input type="text" value="<?= $values['nome'] ?? '' ?>" placeholder="Nome" class="form-control" name="txtNome">
                <label class="form-label">Tutor: </label>
                <select class="form-select" name="txtTutor">
                    <?php
                    foreach ($listaClientes as $clientes) {
                        echo "<option ". ($values['tutor'] == $clientes->getNome() ? 'selected' : '') ." value='{$clientes->getId()}'>{$clientes->getNome()}</option> ";
                    }
                    ?>
                </select>
                <label class="form-label">Raça: </label>
                <input type="text" value="<?= $values['raca'] ?? '' ?>" placeholder="Raça" class="form-control" name="txtRaca">
                <label class="form-label">Idade: </label>
                <input type="text" value="<?= $values['idade'] ?? '' ?>" placeholder="Idade" class="form-control" name="txtIdade">
                <label class="form-label">Informações adicionais: </label>
                <textarea placeholder="Informações adicionais" class="form-control" name="infos"><?= $values['infos'] ?? '' ?></textarea>
                <input type="reset" value="Limpar" class="btn btn-warning mt-2">
                <input type="submit" value="Cadastrar" class="btn btn-success mt-2">
            </form>
        </fieldset>
        <fieldset>
            <legend>Dados recém cadastrados</legend>
            <div class="overflow-auto">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tutor</th>
                            <th>Raça</th>
                            <th>Idade</th>
                            <th>Informações adicionais</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $listaPets = PetDao::buscar();
                        foreach ($listaPets as $pets) {
                            echo "
                                <tr>
                                    <td>{$pets->getNome()}</td>
                                    <td>{$pets->getTutor()}</td>
                                    <td>{$pets->getRaca()}</td>
                                    <td>{$pets->getIdade()}</td>
                                    <td>{$pets->getInfos()}</td>
                                    <td class='text-center'>
                                        <a href='FrmPet.php?editar&id={$pets->getId()}' class='btn btn-success'>Editar</a>
                                        <a local='Pet' key='{$pets->getId()}' class='btn btn-danger excluir'>Excluir</a>
                                    </td>
                                </tr>
                            ";
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