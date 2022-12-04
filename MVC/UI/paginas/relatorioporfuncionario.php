<!doctype html>
<?php

    session_start();
    require_once('../verificalogin/verificalogin.php');
    require_once("../../BLL/agendamentoBLL.php");

    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    $qnt_result_pg = 7;
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $abll=new agendamentoBLL();
    $result = $abll->ListarHistoricoPorFuncionario($inicio, $qnt_result_pg);

    $row_pg = $abll->ContarListarHistoricoPorFuncionario();
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
    $max_links = 2;
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Relatório por Funcionário </title>

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
                </ul>

            </div>
        </nav>

        <div class="container text-center col-md-11 col-md-11">
            <div>
                <img class="img-fluid" src="../imagens/relatorios.png" alt="logo barbeiro" width="250">
            </div>

            <h1 class="text-center title">  Relatório por Funcionário </h1>

            <div class="row mx-auto justify-content-center">
                <button type="button" class="btn btn-primary col-md-4 col-sm-12  " onclick="location. href='relatoriogeral.php'"> Relatório Geral
                </button>
            </div>

            <br>

            <div class="row mx-auto justify-content-center">
                <button type="button" class="btn btn-primary col-md-4 col-sm-12  " onclick="location. href='relatorionaocompareceu.php'"> Relatório Cliente Não Compareceu
                </button>
            </div>

            <br>

            <form action="../persiste/relatorioporfuncionarioPERSISTE.php" method="post">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="input-group mb-3">
                            <input class="form-control " type="text" name="letra" id="letra_ajuda" required placeholder="Ex: Marcos Rocha da Lima" autofocus pattern="[a-zA-Záãâéêíîóôõú\s]+$">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary col-md-12 col-sm-12">Procurar </button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-primary col-md-12 col-sm-12" onclick="location. href='../pdf/gerarpdf_rel_porfuncionario.php'">Gerar PDF desse Relatório </button>
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
                                        <td>E-mail</td>
                                        <td>Nome do Cliente</td>
                                        <td>Telefone</td>
                                        <td>Serviço</td>
                                        <td>Preço</td>
                                        <td>Horário</td>
                                        <td>Quantidade de Agendamento</td>
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
                                                <?php 
                                    $horario_format = $row["horario"];
                                    $horario = date("d/m/Y H:i", strtotime($horario_format));
                                    echo $horario; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["qtd_agendamento"]; ?>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </div>
                                </div>
                    </table>
            </div>

            <ul class="pagination justify-content-center">
                    <?php if($pagina==1){ ?>
                            <li class="page-item disabled"><a class="page-link" href="relatorioporfuncionario.php?pagina=1" tabindex="-1">Primeira</a></li>
                    <?php } else{ ?>
                            <li class="page-item"><a class="page-link" href="relatorioporfuncionario.php?pagina=1" tabindex="-1">Primeira</a></li>
                    <?php } ?>
                    <?php
                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                        if($pag_ant >= 1){ ?>
                            <li class="page-item"><a class="page-link" href="relatorioporfuncionario.php?pagina=<?php echo $pag_ant ?>"><?php echo $pag_ant ?></a></li>
                    <?php }} ?>
                    <li class="page-item disabled"><a class="page-link" href="#"><?php echo $pagina ?></a></li>
                    <?php
                        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                        if($pag_dep <= $quantidade_pg){ ?>
                            <li class="page-item"><a class="page-link" href="relatorioporfuncionario.php?pagina=<?php echo $pag_dep ?>"><?php echo $pag_dep ?></a></li>
                    <?php }} ?>
                    <?php if($quantidade_pg==0 || $pagina==$quantidade_pg){ ?>
                            <li class="page-item disabled"><a class="page-link" href="relatorioporfuncionario.php?pagina=<?php echo $quantidade_pg ?>">Última</a></li>
                    <?php } else{ ?>
                            <li class="page-item"><a class="page-link" href="relatorioporfuncionario.php?pagina=<?php echo $quantidade_pg ?>">Última</a></li>
                    <?php } ?>
            </ul>

        </div>
        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#letra_ajuda").autocomplete({
                    source: 'proc_nome_func_rel_porfuncionario.php'
                });
            });
        </script>

    </body>

    </html>