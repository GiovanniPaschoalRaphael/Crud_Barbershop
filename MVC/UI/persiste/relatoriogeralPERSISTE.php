<!doctype html>
<?php
    require_once("../../BLL/agendamentoBLL.php");

    $letra=$_POST["letra"];
    $abll=new agendamentoBLL();
    if($abll->ResultadoProcurarHistoricoGeral($letra)){
        if(false)
            echo '<script> alert ("Falha ao procurar!"); </script>';
        else
            $result=$abll->ResultadoProcurarHistoricoGeral($letra);
    }
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Relatório Geral - Clientes Pesquisados </title>

        <link rel="shortcut icon" href="../imagens/logobarber.png" type="image/x-png">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
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
                        <a class="nav-link" href="../paginas/relatoriogeral.php"> Relatório Geral <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/procurar.png" alt="logo barbeiro" width="250">
            </div>

            <h1 class="text-center title"> Relatório Geral - Clientes Pesquisados </h1>

            <br>

            <div class="row justify-content-center">
                <div class="col-12 col-md-2">
                    <button type="button" class="btn btn-primary col-md-12 col-sm-12" onclick="location. href='../paginas/relatoriogeral.php'"> Voltar
                    </button>
                </div>
            </div>

            <br>

            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <a href="../pdf/gerarpdf_rel_geral_pesq.php?letra=<?php echo $letra; ?>"> <button type="button" class="btn btn-primary col-md-12 col-sm-12"> Gerar PDF desse Relatório </button> </a>
                    <br>
                    <br>
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
                                        <td>Quantidade de Comparecimento</td>
                                    </tr>

                                    <?php while($row = $result->fetch()){?>

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
                                            <td>
                                                <?php echo $row["qtd_comparecimento"]; ?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                </div>
                            </div>
                        </thead>    
                    </table>
                </div>
        </div>
        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </body>

    </html>