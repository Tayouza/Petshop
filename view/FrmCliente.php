<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            <form>
                <label class="form-label">Nome: </label>
                <input type="text" placeholder="Nome" class="form-control">
                
                <label class="form-label">Nacionalidade: </label>
                <input type="text" placeholder="Nacionalidade" class="form-control">
                
                <label class="form-label">CPF ou Passaporte: </label>
                <input type="text" placeholder="CPF ou Passaporte" class="form-control">
                
                <label class="form-label">E-mail: </label>
                <input type="email" placeholder="E-mail" class="form-control">
                
                <label class="form-label">Telefone: </label>
                <input type="tel" placeholder="Telefone" class="form-control">
                
                <label class="form-label">Endereço: </label>
                <input type="text" placeholder="Endereço" class="form-control">
                
                <label class="form-label">Número: </label>
                <input type="text" placeholder="Número" class="form-control">
                
                <label class="form-label">Cidade: </label>
                <select class="form-select">
                    <option></option>
                </select>
                
                <label class="form-label">Complemento: </label>
                <input type="text" placeholder="Complemento"  class="form-control">
                
                <a href="/cadPet.html" class="btn btn-primary my-2">Cadastre o seu Pet</a>
                <input type="reset" value="Limpar" class="btn btn-warning">
                <input type="submit" value="Cadastrar" class="btn btn-success">
            </form>
        </fieldset>
        <fieldset>
            <legend>Dados recém cadastrados</legend>
            <div class="overflow-auto">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nacionalidade</th>
                            <th>CPF ou Passaporte</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Cidade</th>
                            <th>Complemento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Taylor Souza</td>
                            <td>Brasileiro</td>
                            <td>999.999.999-99</td>
                            <td>tayouzadev@gmail.com</td>
                            <td>(51)99999-9999</td>
                            <td>Rua A</td>
                            <td>123</td>
                            <td>Centro</td>
                            <td>-</td>
                            <td>
                                <input type="button" value="Alterar" class="btn btn-warning mb-1">
                                <input type="button" value="Remover" class="btn btn-success">
                            </td>
                        </tr>
                        <tr>
                            <td>Carlinhos Aguiar</td>
                            <td>Brasileiro</td>
                            <td>999.999.999-99</td>
                            <td>Caragui@gmail.com</td>
                            <td>(51)99999-9999</td>
                            <td>Rua B</td>
                            <td>985</td>
                            <td>Iguain</td>
                            <td>-</td>
                            <td>
                                <input type="button" value="Alterar" class="btn btn-warning mb-1">
                                <input type="button" value="Remover" class="btn btn-success">
                            </td>
                        </tr>
                        <tr>
                            <td>Mauricio Souto</td>
                            <td>Uruguiaio</td>
                            <td>999.999.999-99</td>
                            <td>Maumau@hotmail.com</td>
                            <td>(51)99999-9999</td>
                            <td>Rua C</td>
                            <td>789</td>
                            <td>Bicinho</td>
                            <td>Casa 2</td>
                            <td>
                                <input type="button" value="Alterar" class="btn btn-warning mb-1">
                                <input type="button" value="Remover" class="btn btn-success">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>