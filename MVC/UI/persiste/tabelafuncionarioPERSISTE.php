<!doctype html>
<?php
    require_once("../../BLL/funcionarioBLL.php");

    $letra=$_POST["letra"];
    $obj=new funcionarioBLL();
    if($obj->ResultadoProcurarFuncionario($letra)){
        if(false)
            echo '<script> alert ("Falha ao procurar!"); </script>';
        else
            $result=$obj->ResultadoProcurarFuncionario($letra);
      }
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Funcionários Pesquisados </title>

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
                        <a class="nav-link" href="../paginas/AreaDoFuncionario.php"> Cadastrar Funcionários <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="../paginas/tabelafuncionario.php"> Funcionários Cadastrados <span class="sr-only">(current)</span></a>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/procurar.png" alt="logo barbeiro" width="227">
            </div>

            <h1 class="text-center title"> Funcionários Pesquisados </h1>

            <div class="row mx-auto justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <a href="../paginas/tabelafuncionario.php">
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
                                        <td>E-mail</td>
                                        <td> Demitir </td>
                                        <td> Atualizar </td>
                                    </tr>

                                    <?php while($row = $result->fetch()){?>

                                        <tr>
                                            <td>
                                                <?php echo $row["nome_func"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["telefone_func"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["email_func"]; ?>
                                            </td>
                                            <td class="text-center tamanho ">
                                                <a href="../persiste/demitirfuncionarioPERSISTE.php?id_funcionario=<?php echo $row["id_funcionario"]; ?>" onclick="return confirm('Deseja mesmo demitir esse funcionário? Ao demití-lo, todos os agendamentos (Fila de Clientes e Relatórios) que contenham o nome deste funcionário também serão apagados!');"> <img src="../imagens/demitir.png" style="height: 40px; width: 40px"> </a>
                                            </td>
                                            <td>
                                                <a href="../paginas/AtualizarFuncionario.php?id_funcionario=<?php echo $row["id_funcionario"]; ?>"> <img src="../imagens/atualizar.png" style="height: 40px; width: 40px"> </a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                </div>
                            </div>
                            </tbody>
                    </table>
                </div>
            </div>

            <br>
        </div>

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>