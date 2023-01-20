<?php

include_once '../DAO/InfoAgendamentoDao.php';
include_once '../DAO/ClienteDao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/erro.css">
    <title>Informações de agendamento</title>
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
            <legend>Informações de agendamento</legend>
            <form method="GET">
                <label class="form-label">Informe o CPF</label>
                <input type="search" placeholder="CPF do tutor" class="form-control" name="CPF" id="cpf">
                <input type="submit" value="Buscar" class="btn btn-success mt-2">
            </form>
        </fieldset>
    </div>
    <div class="informacoes container">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nome do Tutor</th>
                    <th>Nome do PET</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['CPF'])) :
                    if(count(ClienteDao::buscarPorCpf($_GET['CPF'])) === 0):
                        echo "<p class='erro-msg'>Não existe nenhum cliente com este CPF!</p>";
                    else:
                        $listas = InfoAgendamentoDao::buscarPetPorCpf($_GET['CPF']);
                        if (count($listas) !== 0) :
                            foreach ($listas as $lista) {
                                echo "<tr class='text-center'>";
                                echo    "<td>{$lista->getNomeTutor()}</td>";
                                echo    "<td>{$lista->getNomePet()}</td>";
                                echo    "<td>{$lista->getData()}</td>";
                                echo    "<td>{$lista->getHora()}</td>";
                                echo "</tr>";
                            }
                ?>
            </tbody>
        </table>
<?php
                        else :
                            echo "<p class='erro-msg'>Nenhuma agenda com este CPF foi encontrada!</p>";
                        endif;
                    endif;
                endif;
?>
    </div>
    <?php
    include "templates/footer.php";
    ?>