<?php

$action = 'inserir';
include_once "../DAO/PaisDao.php";
include_once "../DAO/EstadoDao.php";
include_once "../model/EstadoModel.php";


$listaEstados = EstadoDao::buscar();
$listaPais = PaisDao::buscar();

if (isset($_REQUEST['editar'])) {
    $estadoId = EstadoDao::buscarPorId($_GET['id']);
    $values['nome'] = $estadoId->getNome();
    $values['uf'] = $estadoId->getUf();
    $values['pais'] = $estadoId->getPais();
    $action = "editar&id={$estadoId->getId()}";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de Estado</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light">
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
    <div class="container p-2">
        <fieldset>
            <legend>Cadastro de estado</legend>
            <form method="POST" action="../controller/EstadoController.php?<?= $action ?>">
                <label class="form-label">Nome: </label>
                <input type="text" placeholder="Nome" class="form-control" value="<?= $values['nome'] ?? '' ?>" name="txtNome" required>
                <label class="form-label">UF: </label>
                <input type="text" placeholder="Sigla UF" class="form-control" value="<?= $values['uf'] ?? '' ?>" name="txtSigla" required>
                <label class="form-label">País: </label>
                <select class="form-select" name="txtPais" required>
                    <?php
                    foreach ($listaPais as $pais) {
                        echo "<option " . ($values['pais'] == $pais->getId() ? 'selected' : '') . " value='{$pais->getId()}'>{$pais->getNome()}</option>";
                    }
                    ?>
                </select>
                <input type="reset" value="Limpar" class="btn btn-warning">
                <input type="submit" value="<?= isset($values) ? 'Editar' : 'Cadastrar'  ?>" class="btn btn-success my-2">
            </form>
        </fieldset>
    </div>
    <div class="container p-2">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>Nome</th>
                        <th>UF</th>
                        <th>País</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaEstados as $estado) {
                        echo "<tr class='text-nowrap'>";
                        echo "<td> {$estado->getNome()} </td>";
                        echo "<td> {$estado->getUf()} </td>";
                        foreach ($listaPais as $pais) {
                            if ($pais->getId() == $estado->getPais()) {
                                echo "<td> {$pais->getNome()} </td>";
                            }
                        }
                        echo "<td class='text-center'>
                                <a href='FrmEstado.php?editar&id={$estado->getId()}' class='btn btn-success'>Editar</a>
                                <a local='Estado' key='{$estado->getId()}' class='btn btn-danger excluir'>Excluir</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include "templates/footer.php";
    ?>