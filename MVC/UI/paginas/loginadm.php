<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title> Login do Administrador </title>

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
                    <a class="nav-link" href="AreaDoCliente.php"> Área do Cliente <span class="sr-only">(current)</span></a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container text-center">
        <div>
            <img class="img-fluid" src="../imagens/entrar.png" alt="logo barbeiro" width="304">
        </div>

        <h1 class="text-center title"> Login do Administrador </h1>

        <br>

        <form action="../persiste/loginadmPERSISTE.php" method="post">
            <div class="row mx-auto justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label>Login</label>

                        <input class="form-control  " type="text" required name="login" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mx-auto justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label>Senha</label>

                        <input class="form-control  " type="password" required name="senha">
                    </div>
                </div>
            </div>
            <div class="row mx-auto justify-content-center">
                <button type="submit" class="btn btn-primary col-md-3 col-sm-12  ">Entrar</button>

            </div>
            <br>

        </form>
    </div>

    <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>