<!doctype html>
<?php
    require_once("../../BLL/agendamentoBLL.php");

    $letra=$_POST["letra"];
    $obj=new agendamentoBLL();
    if($obj->ResultadoProcurarFila($letra)){
        if(false)
            echo '<script> alert ("Falha ao procurar!"); </script>';
        else
            $result=$obj->ResultadoProcurarFila($letra);
      }
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Clientes Pesquisados </title>

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
                        <a class="nav-link" href="../paginas/index.php"> Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="../paginas/AreaAdministradorLob.php"> Área do Administrador <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="../paginas/AreaDoCliente.php"> Área do Cliente <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="../paginas/filadeclientes.php"> Fila de Clientes <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/procurar.png" alt="logo barbeiro" width="227">
            </div>

            <h1 class="text-center title"> Clientes Pesquisados </h1>

            <div class="row mx-auto justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <a href="../paginas/filadeclientes.php">
                            <button class="btn btn-primary col-md-6 col-sm-12  ">Voltar
                            </button>
                        </a>
                    </div>
                </div>
            </div>

                <div class="table-responsive">

                    <table class="table table-dark text-center">
                        <thead>
                            <div class="row mx-auto justify-content-center">
                                <div class="col-12 col-lg-6">
                                    <tr>
                                        <td>Nome</td>
                                        <td>Telefone </td>
                                        <td>Serviço</td>
                                        <td>Preço</td>
                                        <td>Barbeiro</td>
                                        <td>Horário</td>
                                        <td>Compareceu</td>
                                        <td>Não Compareceu</td>
                                    </tr>

                                    <?php while($row = $result->fetch()){ ?>

                                        <tr>
                                            <td>
                                                <?php echo $row["nome_cli"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["telefone_cli"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["nome"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["preco"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["nome_func"]; ?>
                                            </td>
                                            <td>
                                                <?php 
                                    $horario_format = $row["horario"];
                                    $horario = date("d/m/Y H:i", strtotime($horario_format));
                                    echo $horario; ?>
                                            </td>
                                            <td class="text-center tamanho ">
                                                <a href="../persiste/compareceuPERSISTE.php?id_agendamento=<?php echo $row["id_agendamento"]; ?>" onclick="return confirm('Este cliente realmente compareceu?');"> <img src="../imagens/compareceu.png" style="height: 40px; width: 40px"> </a>
                                            </td>
                                            <td>
                                                <a href="../persiste/naocompareceuPERSISTE.php?id_agendamento=<?php echo $row["id_agendamento"]; ?>" onclick="return confirm('Este cliente realmente não compareceu?');"> <img src="../imagens/naocompareceu.png" style="height: 40px; width: 40px"> </a>
                                            </td>
                                        </tr>

                                        <?php } ?>

                                </div>
                            </div>
                            </tbody>
                        </thead>
                    </table>
                </div>
        </div>

        <br>

                <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
                <script src="../bootstrap/js/popper.min.js"></script>
                <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>