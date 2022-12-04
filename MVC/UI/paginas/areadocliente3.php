<!doctype html>
<?php
    if(empty($_POST["nome_cli"]))
        header('Location: areadocliente.php');
    else{
        $nome_cli = $_POST["nome_cli"];
        $telefone_cli = $_POST["telefone_cli"];
        $servico_id_servico = $_POST["servico_id_servico"];
        $funcionario_id_funcionario = $_POST["funcionario_id_funcionario"];
        $data = $_POST["data"];
        $data_final = implode('-', array_reverse(explode('/', $data)));
    }

    require_once("../../BLL/agendamentoBLL.php");

    $abll = new agendamentoBLL();
    $result = $abll->VerificarHoraFuncionario($funcionario_id_funcionario, $data_final);
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
                <img class="img-fluid" src="../imagens/tempo.png" alt="logo barbeiro" width="304">
            </div>

            <h1 class="text-center title"> Área do Cliente </h1>

            <br>

            <form action="areadocliente2.php" method="post">
                <input type="hidden" name="nome_cli" value="<?php echo $nome_cli; ?>">
                <input type="hidden" name="telefone_cli" value="<?php echo $telefone_cli; ?>">
                <input type="hidden" name="servico_id_servico" value="<?php echo $servico_id_servico; ?>">
                <input type="hidden" name="funcionario_id_funcionario" value="<?php echo $funcionario_id_funcionario; ?>">
                <button type="submit" class="btn btn-primary col-md-2 col-sm-12">Voltar</button>
            </form>

            <br>

            <form action="../persiste/areadoclientePERSISTE.php" method="post">
                <input type="hidden" name="nome_cli" value="<?php echo $nome_cli; ?>">
                <input type="hidden" name="telefone_cli" value="<?php echo $telefone_cli; ?>">
                <input type="hidden" name="servico_id_servico" value="<?php echo $servico_id_servico; ?>">
                <input type="hidden" name="funcionario_id_funcionario" value="<?php echo $funcionario_id_funcionario; ?>">
                <input type="hidden" name="data" value="<?php echo $data; ?>">

                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label> Hora </label>
                            <select class="form-control" name="hora" required>
                                <?php while($row = $result->fetch()){ 
                                    if($row["horario"] == '08:00:00')
                                        $oito_horas_ocupado = true;
                                    if($row["horario"] == '09:00:00')
                                        $nove_horas_ocupado = true;
                                    if($row["horario"] == '10:00:00')
                                        $dez_horas_ocupado = true;
                                    if($row["horario"] == '11:00:00')
                                        $onze_horas_ocupado = true;
                                    if($row["horario"] == '12:00:00')
                                        $doze_horas_ocupado = true;
                                    if($row["horario"] == '13:00:00')
                                        $treze_horas_ocupado = true;
                                    if($row["horario"] == '14:00:00')
                                        $quatorze_horas_ocupado = true;
                                    if($row["horario"] == '15:00:00')
                                        $quinze_horas_ocupado = true;
                                    if($row["horario"] == '16:00:00')
                                        $dezesseis_horas_ocupado = true;
                                    if($row["horario"] == '17:00:00')
                                        $dezessete_horas_ocupado = true;
                                } ?>
                                <option> </option>
                                <?php if($oito_horas_ocupado == true){ ?>
                                    <option value="08:00" disabled> 08:00 às 09:00 </option>
                                <?php } else{ ?>
                                    <option value="08:00"> 08:00 às 09:00 </option>
                                <?php } ?>
                                <?php if($nove_horas_ocupado == true){ ?>
                                    <option value="09:00" disabled> 09:00 às 10:00 </option>
                                <?php } else{ ?>
                                    <option value="09:00"> 09:00 às 10:00 </option>
                                <?php } ?>
                                <?php if($dez_horas_ocupado == true){ ?>
                                    <option value="10:00" disabled> 10:00 às 11:00 </option>
                                <?php } else{ ?>
                                    <option value="10:00"> 10:00 às 11:00 </option>
                                <?php } ?>
                                <?php if($onze_horas_ocupado == true){ ?>
                                    <option value="11:00" disabled> 11:00 às 12:00 </option>
                                <?php } else{ ?>
                                    <option value="11:00"> 11:00 às 12:00 </option>
                                <?php } ?>
                                <?php if($doze_horas_ocupado == true){ ?>
                                    <option value="12:00" disabled> 12:00 às 13:00 </option>
                                <?php } else{ ?>
                                    <option value="12:00"> 12:00 às 13:00 </option>
                                <?php } ?>
                                <?php if($treze_horas_ocupado == true){ ?>
                                    <option value="13:00" disabled> 13:00 às 14:00 </option>
                                <?php } else{ ?>
                                    <option value="13:00"> 13:00 às 14:00 </option>
                                <?php } ?>
                                <?php if($quatorze_horas_ocupado == true){ ?>
                                    <option value="14:00" disabled> 14:00 às 15:00 </option>
                                <?php } else{ ?>
                                    <option value="14:00"> 14:00 às 15:00 </option>
                                <?php } ?>
                                <?php if($quinze_horas_ocupado == true){ ?>
                                    <option value="15:00" disabled> 15:00 às 16:00 </option>
                                <?php } else{ ?>
                                    <option value="15:00"> 15:00 às 16:00 </option>
                                <?php } ?>
                                <?php if($dezesseis_horas_ocupado == true){ ?>
                                    <option value="16:00" disabled> 16:00 às 17:00 </option>
                                <?php } else{ ?>
                                    <option value="16:00"> 16:00 às 17:00 </option>
                                <?php } ?>
                                <?php if($dezessete_horas_ocupado == true){ ?>
                                    <option value="17:00" disabled> 17:00 às 18:00 </option>
                                <?php } else{ ?>
                                    <option value="17:00"> 17:00 às 18:00 </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <button type="submit" class="btn btn-primary col-md-3 col-sm-12  ">Agendar</button>
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