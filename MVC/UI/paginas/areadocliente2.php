<!doctype html>
<?php
    require_once("../../BLL/agendamentoBLL.php");

    if(empty($_POST["nome_cli"]))
        header('Location: areadocliente.php');
    else{
        $nome_cli = $_POST["nome_cli"];
        $telefone_cli = $_POST["telefone_cli"];
        $servico_id_servico = $_POST["servico_id_servico"];
        $funcionario_id_funcionario = $_POST["funcionario_id_funcionario"];
    }

    $abll = new agendamentoBLL();
    $result = $abll->PegarDatasAgendamentosFuncionario($funcionario_id_funcionario);
    $arrayDatas = [];
    while($row = $result->fetch()){
        $horario_format = $row["horario"];
        $horario = date("d/m/Y", strtotime($horario_format));
        array_push($arrayDatas, $horario);
    }

    $diasOcupadosFuncionario = [];
    foreach ($arrayDatas as $data){
        $i = 0;
        $dataOcupada = $data;
        foreach ($arrayDatas as $data2){
            if($dataOcupada == $data2)
                $i++;
        }
        if($i == 10)
            array_push($diasOcupadosFuncionario, $dataOcupada);
    }
?>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <title> Área do Cliente </title>
        <link rel="shortcut icon" href="../imagens/logobarber.png" type="image/x-png">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-datepicker.css">
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
                <img class="img-fluid" src="../imagens/calendario.png" alt="logo barbeiro" width="304">
            </div>

            <h1 class="text-center title"> Área do Cliente </h1>
            <br>

            <button class="btn btn-primary col-md-2 col-sm-12" onclick="location.href='areadocliente.php'">Voltar</button>

            <br>
            <br>

            <form action="areadocliente3.php" method="post">
                <input type="hidden" name="nome_cli" value="<?php echo $nome_cli; ?>">
                <input type="hidden" name="telefone_cli" value="<?php echo $telefone_cli; ?>">
                <input type="hidden" name="servico_id_servico" value="<?php echo $servico_id_servico; ?>">
                <input type="hidden" name="funcionario_id_funcionario" value="<?php echo $funcionario_id_funcionario; ?>">
                    
                <div class="row mx-auto justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label> Data </label>
                            <input type="text" class="form-control" name="data" id="data" required autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row mx-auto justify-content-center">
                    <button type="submit" class="btn btn-primary col-md-3 col-sm-12  ">Escolher Hora</button>
                </div>

            </form>
            <br>
        </div>
        <br>

        <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="../bootstrap/js/popper.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../bootstrap/js/bootstrap-datepicker.min.js"></script>
        <script src="../bootstrap/js/bootstrap-datepicker.pt-BR.min.js"></script>

        <script>
            var diasOcupadosFuncionario = <?php echo json_encode($diasOcupadosFuncionario); ?>;
            var options = {
                format: 'dd/mm/yyyy',
                language: 'pt-BR',
                startDate: '0d',
                daysOfWeekDisabled: [0,6],
                autoclose: true,
                datesDisabled: diasOcupadosFuncionario,
            };
            $('#data').datepicker(options).on("changeDate", function (e) {
                var TimeZoned = new Date(e.date.setTime(e.date.getTime() + 
                            (e.date.getTimezoneOffset())));
                $(this).datepicker('setDate', TimeZoned);
            });
        </script>
    </body>

    </html>