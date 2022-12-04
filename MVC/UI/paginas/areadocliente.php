<!doctype html>
<?php
    require_once("../../BLL/servicoBLL.php");
    require_once("../../BLL/funcionarioBLL.php");

    $sbll=new servicoBLL();
    $results=$sbll->Listar();

    $fbll=new funcionarioBLL();
    $resultf=$fbll->Listar();
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Área do Cliente </title>
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
                        <a class="nav-link" href="LoginAdm.php"> Área do Administrador <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/cliente.png" alt="logo barbeiro" width="304">
            </div>

            <h1 class="text-center title"> Área do Cliente </h1>
            <br>

            <form action="areadocliente2.php" method="post">
                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Nome do Cliente</label>
                            <input class="form-control  " type="text" name="nome_cli" required placeholder="Ex: João Alvez da Silva" autofocus pattern="[a-zA-Záãâéêíîóôõú\s]+$">
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Telefone</label>

                            <input class="form-control  " type="text" name="telefone_cli" required placeholder="Ex: 18981916791" pattern="[0-9]{10,11}">
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label> Serviço </label>

                            <select class="form-control" name="servico_id_servico" required>
                                <option> </option>
                                <?php while($row = $results->fetch()){?>
                                    <option value=<?php echo $row[ 'id_servico']?>>
                                        <?php echo $row["nome"]; ?>
                                    </option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label> Barbeiro </label>
                            <select class="form-control" name="funcionario_id_funcionario" required onchange="HabilitarDesabilitarData(this.value)">
                                <option> </option>
                                <?php while($row = $resultf->fetch()){ ?>
                                    <option value=<?php echo $row[ "Id_Funcionario"]?>>
                                        <?php echo $row["Nome"]; ?>
                                    </option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <button type="submit" class="btn btn-primary col-md-3 col-sm-12  ">Escolher Dia</button>
                </div>

            </form>
            <br>
        </div>
        <br>

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>