<html>

<head>
    <link rel="shortcut icon" type="image/png" href="../img/logobranco.png">
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <body>
        <nav class="menu-lateral">

            <div class="btn-expandir">
                <i class="bi bi-list" id="btn-exp"></i>
            </div>

            <ul>
                <li class="item-menu">
                    <a href="home.php">
                        <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                        <span class="txt-link">Inicio</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="academias.php">
                        <span class="icon"><i class="bi bi-geo-alt"></i></span>
                        <span class="txt-link">Academias</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="conta_usuario.php">
                        <span class="icon"><i class="bi bi-person-circle"></i></span>
                        <span class="txt-link">Conta</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="../loja/loja.php">
                        <span class="icon"><i class="bi bi-bag"></i></span>
                        <span class="txt-link">Loja</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="#">
                        <span class="icon"><i class="bi bi-gear"></i></span>
                        <span class="txt-link">Configurações</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="../fechar_sessao.php">
                        <span class="icon"><i class="bi bi-door-open"></i></span>
                        <span class="txt-link">Sair</span>
                    </a>
                </li>

            </ul>

        </nav>

        <?php
    session_start();
    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";
    } 

    include('conectar.php');

        if (isset($_SESSION['login'])) {
            $login = $_SESSION['login'];
        
            $sql = "SELECT data_hora, tempo FROM tbcardio WHERE login = '$login' ORDER BY data_hora DESC LIMIT 7";
            $result = $conn->query($sql);
        
            if ($result === false) {
                die("Erro na consulta SQL: " . $conn->error);
            }
        
            $dados = array();
        
            while ($row = $result->fetch_assoc()) {
                $dados[] = array(
                    'data_hora' => $row['data_hora'],
                    'tempo' => $row['tempo']
                );
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Ops, algo não esta certo, entre novamente!!');
            window.location.href='../fechar_sessao.php';</script>";
        }
        
        $conn->close();

        $variavel1 = isset($dados[0]['tempo']) ? $dados[0]['tempo'] : '';
        $variavel2 = isset($dados[1]['tempo']) ? $dados[1]['tempo'] : '';
        $variavel3 = isset($dados[2]['tempo']) ? $dados[2]['tempo'] : '';
        $variavel4 = isset($dados[3]['tempo']) ? $dados[3]['tempo'] : '';
        $variavel5 = isset($dados[4]['tempo']) ? $dados[4]['tempo'] : '';
        $variavel6 = isset($dados[5]['tempo']) ? $dados[5]['tempo'] : '';
        $variavel7 = isset($dados[6]['tempo']) ? $dados[6]['tempo'] : '';
        
        $data_hora1 = isset($dados[0]['data_hora']) ? $dados[0]['data_hora'] : '';
        $data_hora2 = isset($dados[1]['data_hora']) ? $dados[1]['data_hora'] : '';
        $data_hora3 = isset($dados[2]['data_hora']) ? $dados[2]['data_hora'] : '';
        $data_hora4 = isset($dados[3]['data_hora']) ? $dados[3]['data_hora'] : '';
        $data_hora5 = isset($dados[4]['data_hora']) ? $dados[4]['data_hora'] : '';
        $data_hora6 = isset($dados[5]['data_hora']) ? $dados[5]['data_hora'] : '';
        $data_hora7 = isset($dados[6]['data_hora']) ? $dados[6]['data_hora'] : '';


        ?>

        <div id="column">
            <div>
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:['Tempo 1','Tempo 2', 'Tempo 3', 'Tempo 4', 'Tempo 5', 'Tempo 6','Tempo 7'],
                        datasets: [{
                            label: 'Tempo de cardio em segundos ',
                            data: [<?php echo$variavel1?>, <?php echo$variavel2?>, <?php echo$variavel3?>, <?php echo$variavel4?>, <?php echo$variavel5?>, <?php echo$variavel6?>,<?php echo$variavel7?>],
                            borderColor: 'red',
                            backgroundColor: 'red',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

            <script>
                var menuItem = document.querySelectorAll('.item-menu')

                function selectLink() {
                    menuItem.forEach((item) =>
                        item.classList.remove('ativo')
                    )
                    this.classList.add('ativo')
                }

                menuItem.forEach((item) =>
                    item.addEventListener('click', selectLink)
                )

                var btnExp = document.querySelector('#btn-exp')
                var menuSide = document.querySelector('.menu-lateral')

                btnExp.addEventListener('click', function() {
                    menuSide.classList.toggle('expandir')
                })
            </script>
            <br>
            <h1 class="cronometro">Cronômetro</h1>
            <div class="cronometro" id="cronometro">00:00:00</div>
            <br>
            <button id="iniciar" onclick="iniciarCronometro()">Iniciar</button>
            <button id="parar" onclick="pararCronometro()">Parar</button>
            <button id="guardar" onclick="guardarTempo()">Guardar</button>
            <form action="armazenar_tempo.php" method="POST" id="formulario">
                <input type="hidden" name="tempo" id="tempoInput">
            </form>

            <script>
                let tempoTotal = 0;
                let cronometro;
                let emExecucao = false;

                function iniciarCronometro() {
                    if (!emExecucao) {
                        emExecucao = true;
                        cronometro = setInterval(function() {
                            tempoTotal++;
                            exibirTempo(tempoTotal);
                        }, 1000);
                    }
                }

                function pararCronometro() {
                    if (emExecucao) {
                        emExecucao = false;
                        clearInterval(cronometro);
                    }
                }

                function guardarTempo() {
                    if (!emExecucao) {
                        document.getElementById('tempoInput').value = tempoTotal;
                        document.getElementById('formulario').submit();
                    }
                }


                function exibirTempo(tempo) {
                    const horas = Math.floor(tempo / 3600);
                    const minutos = Math.floor((tempo % 3600) / 60);
                    const segundos = tempo % 60;
                    const tempoFormatado = padZero(horas) + ":" + padZero(minutos) + ":" + padZero(segundos);
                    document.getElementById('cronometro').innerHTML = tempoFormatado;
                }

                function padZero(valor) {
                    return valor.toString().padStart(2, '0');
                }
            </script>
            <br>
            <a href="home.php"> <button>Voltar</button> </a>
        </div>

    </body>

</html>
