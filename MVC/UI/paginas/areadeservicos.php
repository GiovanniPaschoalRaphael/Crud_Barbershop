<!doctype html>
<?php
    session_start();
    require_once('../verificalogin/verificalogin.php');
    require_once("../../BLL/servicoBLL.php");

    $sbll=new servicoBLL();
    $result = $sbll->Listar();
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Cadastrar Serviços </title>

        <link rel="shortcut icon" href="../imagens/logobarber.png" type="image/x-png">

    </head>

    <body style="background-image: url('../imagens/fundo1.png'); background-repeat: no-repeat; background-size: cover">
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark mb-3">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaAdministradorLob.php"> Área do Administrador <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaDoCliente.php"> Área do Cliente <span class="sr-only">(current)</span></a>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <br>
            <br>
            <div>
                <img class="img-fluid" src="../imagens/servicos.png" alt="logo barbeiro" width="138">
            </div>

            <br>
            <h1 class="text-center title"> Cadastrar Serviços </h1>

            <form action="../persiste/areadeservicosPERSISTE.php" method="post">
                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <br>
                            <br>
                            <label>Nome do serviço</label>

                            <input class="form-control  " type="text" name="nome" required placeholder="Ex: Cabelo + Barba" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Preço</label>

                            <input class="form-control  " type="text" name="preco" required placeholder="Ex: 45" pattern="[0-9]+$">
                        </div>
                    </div>
                </div>
                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-6 col-sm-12  ">Cadastrar Serviço
                            </button>
                        </div>
            </form>
            </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <a href="tabelaservico.php">
                        <button class="btn btn-primary col-md-6 col-sm-12  ">Serviços Cadastrados
                        </button>
                    </a>
                </div>
            </div>
            <br>
        </div>

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>