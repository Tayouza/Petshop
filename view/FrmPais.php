<?php

include_once '../DAO/PaisDao.php';

$action = 'inserir';
$listaPais = PaisDao::buscar();

if (isset($_REQUEST['editar'])) {
    $paisId = PaisDao::buscarId($_GET['id']);
    $values['nome'] = $paisId->getNome();
    $values['sigla'] = $paisId->getSigla();
    $action = "editar&id={$paisId->getId()}";
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de País</title>
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
            <legend>Cadastro de país</legend>
            <form method="POST" action="../controller/PaisController.php?<?= $action ?>">
                <label class="form-label">Nome: </label>
                <input type="text" value="<?= $values['nome'] ?? ''?>" placeholder="Nome" class="form-control" name="txtNome">
                <label class="form-label">Sigla: </label>
                <input type="text" value="<?= $values['sigla'] ?? ''?>" class="form-control" name="txtSigla" placeholder="Sigla">
                <input type="reset" value="Limpar" class="btn btn-warning my-2">
                <input type="submit" value="<?=isset($_REQUEST['editar']) ? 'Editar' : 'Cadastrar'?>" class="btn btn-success">
            </form>
        </fieldset>
    </div>
    <div class="container p-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sigla</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaPais as $pais) {
                    echo "<tr>";
                    echo "<td> {$pais->getNome()} </td>";
                    echo "<td> {$pais->getSigla()} </td>";
                    echo "<td class='text-center'>
                            <a href='FrmPais.php?editar&id={$pais->getId()}' class='btn btn-success'>Editar</a>
                            <a local='Pais' key='{$pais->getId()}' class='btn btn-danger excluir'>Excluir</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    include "templates/footer.php";
    ?>