<!doctype html>
<?php

    session_start();
    require_once('../verificalogin/verificalogin.php');
    require_once("../../BLL/funcionarioBLL.php");

    $id_funcionario=$_GET["id_funcionario"];

    $obj=new funcionarioBLL();
    $result = $obj->ProcurarId($id_funcionario);
?>

    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Atualizar Funcionário </title>

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

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaDoFuncionario.php"> Funcionários <span class="sr-only">(current)</span></a>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/atualizarfuncionario.png" alt="logo barbeiro" width="155">
            </div>

            <h1 class="text-center title"> Atualizar Funcionário </h1>

            <form action="../persiste/atualizarfuncionarioPERSISTE.php" method="post">

                <?php while($row = $result->fetch()){?>

                    <div class="row mx-auto justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <input class="form-control  " type="hidden" name="id_funcionario" value="<?php echo $row["id_funcionario"]; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">

                                <label>Nome</label>

                                <input class="form-control  " type="text" name="nome_func" value="<?php echo $row["nome_func"]; ?>" required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>Telefone</label>

                                <input class="form-control  " type="text" name="telefone_func" required pattern="[0-9]{10,11}" value="<?php echo $row["telefone_func"]; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto justify-content-center">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label>E-mail</label>

                                <input class="form-control  " type="email" name="email_func" required value="<?php echo $row["email_func"]; ?>">

                                <?php } ?>

                            </div>
                        </div>
                    </div>

                    <div class="row mx-auto justify-content-center">
                        <button type="submit" class="btn btn-primary col-md-3 col-sm-12">Atualizar Funcionário</button>

                    </div>
                    <br>
            </form>
        </div>

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>