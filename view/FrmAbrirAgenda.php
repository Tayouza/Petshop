<?php

include_once '../controller/AbrirAgendaController.php';
include_once '../DAO/AbrirAgendaDao.php';
include_once '../model/AbrirAgendaModel.php';

/*$value = AbrirAgendaDao::buscarPorHora('13:00');
var_dump($value);*/

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/horarios.css">
    <title>Abrir Agenda</title>
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
    <div class="container p-2">
        <fieldset>
            <legend>Editar Agenda</legend>
            <form action="../controller/AbrirAgendaController.php?inserir" method="POST">
                <label class="form-label">Novas datas e horários</label>
                <input type="date" name="txtData" id="data" class="form-control mb-2">
                <label class="form-label">Dia todo</label>
                <input type="checkbox" name="diaTodo" id="diaTodo" value="sim" checked>
                <input type="time" name="txtHora" id="hora" class="form-control mb-2">
                <input type="submit" value="Abrir" class="btn btn-success">
            </form>

            <form action="./FrmAbrirAgenda.php" method="GET" class="mt-4">
                <label class="form-label">Fechar data e horário</label>
                <select name="txtFecharData" id="fecharData" class="form-select mb-2">
                    <?php
                    $listaDatas = AbrirAgendaDao::buscar();
                    foreach ($listaDatas as $datas) {
                        echo "<option value='{$datas->getId()}'>";
                        echo $datas->getDataFormatada();
                        echo '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Selecionar dia" class="btn btn-primary">
            </form>
        </fieldset>
        <div class="horarios">
            <?php
            if (isset($_GET['txtFecharData'])) :
                $listaHorarios = AbrirAgendaDao::buscarHorarios($_GET['txtFecharData']);
                foreach ($listaHorarios as $horarios) :
            ?>
                    <div class="horario">
                        <span local="AbrirAgenda" key="<?= $horarios->getId() ?>" class="excluir">X</span>
                        <span><?= $horarios->getHora() ?></span>
                    </div>

                <?php
                endforeach;
                ?>

                <div class="horario">
                    <span local="AbrirAgenda" key="data-<?=$_GET['txtFecharData']?>" class="excluir">X</span>
                    <span>Todos Horarios</span>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
    <?php
    include "templates/footer.php";
    ?>