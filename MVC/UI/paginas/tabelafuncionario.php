<!doctype html>
<?php

    session_start();
    require_once('../verificalogin/verificalogin.php');
    require_once("../../BLL/funcionarioBLL.php");

    $fbll=new funcionarioBLL();
    $result = $fbll->Listar();
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Funcionários Cadastrados </title>

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
                        <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaAdministradorLob.php"> Área do Administrador <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaDoCliente.php"> Área do Cliente <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="AreaDoFuncionario.php"> Cadastrar Funcionários <span class="sr-only">(current)</span></a>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container text-center">
            <div>
                <img class="img-fluid" src="../imagens/tabelafuncionario.png" alt="logo barbeiro" width="250">
            </div>

            <h1 class="text-center title"> Funcionários Cadastrados </h1>

            <form action="../persiste/tabelafuncionarioPERSISTE.php" method="post">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input class="form-control " type="text" name="letra" id="letra_ajuda" required placeholder="Ex: Marcos Rocha da Lima" autofocus pattern="[a-zA-Záãâéêíîóôõú\s]+$">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary col-md-12 col-sm-12">Procurar </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
                                                <?php echo $row["Nome"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["Telefone"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["Email"]; ?>
                                            </td>
                                            <td class="text-center tamanho ">
                                                <a href="../persiste/demitirfuncionarioPERSISTE.php?id_funcionario=<?php echo $row["Id_Funcionario"]; ?>" onclick="return confirm('Deseja mesmo demitir esse funcionário? Ao demití-lo, todos os agendamentos (Fila de Clientes e Relatórios) que contenham o nome deste funcionário também serão apagados!');"> <img src="../imagens/demitir.png" style="height: 40px; width: 40px"> </a>
                                            </td>
                                            <td>
                                                <a href="AtualizarFuncionario.php?id_funcionario=<?php echo $row["Id_Funcionario"]; ?>"> <img src="../imagens/atualizar.png" style="height: 40px; width: 40px"> </a>
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

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#letra_ajuda").autocomplete({
                    source: 'proc_nome_func.php'
                });
            });
        </script>
    </body>

    </html>