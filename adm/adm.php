<!DOCTYPE html>
<html lang="pt-4">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AlphaMt - ADM</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <i><img src="../img/logo.png" height="100px" widgh="100px"></i>

                <div class="sidebar-brand-text mx-3">AlphaMt<sup>adm</sup></div>
            </a>




            <hr class="sidebar-divider my-0">


            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>

                    <span>Painel de Controle</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Barra de Acessibilidade
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="controle_usuario.php" rel="noreferrer noopener nofollow" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Usuários</span>
                </a>

            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="controle_parceiros.php" rel="noreferrer noopener nofollow">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Parceiros</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../fechar_sessao.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Painel de Controle</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar relatório</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="../adm/controle_usuario.php"> Controle de Usuarios </a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                                                                                require_once('../conexao/conexao.php');
                                                                                                                $mysql = new BancodeDados();
                                                                                                                $mysql->conecta();



                                                                                                                $nivel1 = 'usuario';



                                                                                                                $pedidos_pendentes = 0;
                                                                                                                $pedido_pendente = true;

                                                                                                                $sqlstring1 = "SELECT * FROM tbusuario WHERE nivel = '$nivel1'  ORDER BY nome";
                                                                                                                $query1 = @mysqli_query($mysql->con, $sqlstring1);
                                                                                                                while ($dados1 = mysqli_fetch_array($query1)) {
                                                                                                                    if ($pedido_pendente) {
                                                                                                                        $pedidos_pendentes++;
                                                                                                                    }
                                                                                                                }
                                                                                                                echo "<p>$pedidos_pendentes Usuarios </p>";




                                                                                                                $mysql->fechar();
                                                                                                                ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="https://etecspgov-my.sharepoint.com/:x:/g/personal/eduardo_neves26_etec_sp_gov_br/EYs0XBsf1PdIjs1SkUq0ldMBFWCpUaEdsHtmYREBjna5nw?email=eduardo.neves26%40etec.sp.gov.br&e=IZfp2X" target="_blank" rel="noreferrer noopener nofollow"> Faturamento</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                require_once('../conexao/conexao.php');
                                                $mysql = new BancodeDados();
                                                $mysql->conecta();

                                                $qnts = 0;
                                                $qnt = true;

                                                $nivel1 = '1';


                                                $sqlstring1 = "SELECT * FROM tbusuario WHERE plano = '$nivel1'  ORDER BY nome";
                                                $query1 = @mysqli_query($mysql->con, $sqlstring1);
                                                while ($dados1 = mysqli_fetch_array($query1)) {
                                                    if ($qnt) {
                                                        $qnts++;
                                                    }
                                                }

                                                $total1 = $qnts * "15";



                                                $mysql->fechar();


                                                require_once('../conexao/conexao.php');
                                                $mysql2 = new BancodeDados();
                                                $mysql2->conecta();

                                                $qnts2 = 0;
                                                $qnt2 = true;

                                                $nivel2 = '2';


                                                $sqlstring2 = "SELECT * FROM tbusuario WHERE plano = '$nivel2'  ORDER BY nome";
                                                $query2 = @mysqli_query($mysql2->con, $sqlstring2);
                                                while ($dados2 = mysqli_fetch_array($query2)) {
                                                    if ($qnt2) {
                                                        $qnts2++;
                                                    }
                                                }
                                                $total2 = $qnts2 * "18";


                                                $mysql2->fechar();


                                                require_once('../conexao/conexao.php');
                                                $mysql3 = new BancodeDados();
                                                $mysql3->conecta();

                                                $qnts3 = 0;
                                                $qnt3 = true;

                                                $nivel3 = '3';


                                                $sqlstring3 = "SELECT * FROM tbusuario WHERE plano = '$nivel3'  ORDER BY nome";
                                                $query3 = @mysqli_query($mysql3->con, $sqlstring3);
                                                while ($dados3 = mysqli_fetch_array($query3)) {
                                                    if ($qnt3) {
                                                        $qnts3++;
                                                    }
                                                }
                                                $total3 = $qnts3 * "24";

                                                echo $total1 + $total2 + $total3;


                                                $mysql3->fechar();


                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="../adm/controle_parceiros.php"> Controle de Parceiros </a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                                                                                require_once('../conexao/conexao.php');
                                                                                                                $mysql = new BancodeDados();
                                                                                                                $mysql->conecta();



                                                                                                                $nivel1 = 'academia';



                                                                                                                $pedidos_pendentes = 0;
                                                                                                                $pedido_pendente = true;

                                                                                                                $sqlstring1 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel1'  ORDER BY nome";
                                                                                                                $query1 = @mysqli_query($mysql->con, $sqlstring1);
                                                                                                                while ($dados1 = mysqli_fetch_array($query1)) {
                                                                                                                    if ($pedido_pendente) {
                                                                                                                        $pedidos_pendentes++;
                                                                                                                    }
                                                                                                                }
                                                                                                                echo "<p>$pedidos_pendentes Academias </p>";




                                                                                                                $mysql->fechar();
                                                                                                                ?>



                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="../adm/pedidos_parceiros.php"> Solitações Pendentes </a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                                require_once('../conexao/conexao.php');
                                                                                                $mysql = new BancodeDados();
                                                                                                $mysql->conecta();



                                                                                                $nivel1 = 'profissionais';
                                                                                                $nivel2 = 'academia';
                                                                                                $nivel3 = 'loja';



                                                                                                $pedidos_pendentes = 0;
                                                                                                $pedido_pendente = true; // Assuming it should start as false

                                                                                                $sqlstring1 = "SELECT * FROM parceria WHERE nivel = '$nivel1'  ORDER BY nome";
                                                                                                $query1 = @mysqli_query($mysql->con, $sqlstring1);
                                                                                                while ($dados1 = mysqli_fetch_array($query1)) {
                                                                                                    if ($pedido_pendente) {
                                                                                                        $pedidos_pendentes++;
                                                                                                    }
                                                                                                }

                                                                                                $sqlstring2 = "SELECT * FROM parceria WHERE nivel = '$nivel2'  ORDER BY nome";
                                                                                                $query2 = @mysqli_query($mysql->con, $sqlstring2);
                                                                                                while ($dados2 = mysqli_fetch_array($query2)) {
                                                                                                    if ($pedido_pendente) {
                                                                                                        $pedidos_pendentes++;
                                                                                                    }
                                                                                                }

                                                                                                $sqlstring3 = "SELECT * FROM parceria WHERE nivel = '$nivel3'  ORDER BY nome";
                                                                                                $query3 = @mysqli_query($mysql->con, $sqlstring3);
                                                                                                while ($dados3 = mysqli_fetch_array($query3)) {
                                                                                                    if ($pedido_pendente) {
                                                                                                        $pedidos_pendentes++;
                                                                                                    }
                                                                                                }

                                                                                                echo "<p>$pedidos_pendentes Pedidos pendentes</p>";


                                                                                                $mysql->fechar();
                                                                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">


                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Graficos</h6>
                                    <div class="dropdown no-arrow">
                                    </div>
                                </div>
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const ctx = document.getElementById('myChart');

                                    new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
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
                            </div>
                        </div>
                        <?php
                        include('connect.php');

                        // Verificar a conexão
                        if ($conn->connect_error) {
                            die("Conexão falhou: " . $conn->connect_error);
                        }

                        // Consulta SQL para contar o número de pessoas nos planos 1, 2 e 3
                        $sql = "SELECT plano, COUNT(*) as total FROM tbusuario WHERE plano IN (1, 2, 3) GROUP BY plano";
                        $result = $conn->query($sql);

                        // Inicializar variáveis
                        $totalPessoasPlano1 = 0;
                        $totalPessoasPlano2 = 0;
                        $totalPessoasPlano3 = 0;

                        if ($result->num_rows > 0) {
                            // Loop através dos resultados
                            while ($row = $result->fetch_assoc()) {
                                $plano = $row['plano'];
                                $total = $row['total'];

                                // Armazenar os totais em variáveis separadas
                                if ($plano == 1) {
                                    $totalPessoasPlano1 = $total;
                                } elseif ($plano == 2) {
                                    $totalPessoasPlano2 = $total;
                                } elseif ($plano == 3) {
                                    $totalPessoasPlano3 = $total;
                                }
                            }
                        }
                        $sql = "SELECT COUNT(*) as total FROM tbfuncionario";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Obter o resultado como um array associativo
                            $row = $result->fetch_assoc();

                            // Atribuir o total à variável
                            $totalFuncionarios = $row['total'];
                        }
                        $sql = "SELECT COUNT(*) as total FROM tbparceiro";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Obter o resultado como um array associativo
                            $row = $result->fetch_assoc();

                            // Atribuir o total à variável
                            $totalParceiros = $row['total'];
                        }
                        $sql = "SELECT COUNT(*) as total FROM parceria";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Obter o resultado como um array associativo
                            $row = $result->fetch_assoc();

                            // Atribuir o total à variável
                            $totalParceirosnum = $row['total'];
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }
                        // Fechar a conexão
                        $conn->close();
                        ?>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Fontes de receita</h6>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        <canvas id="myChar"></canvas>
                                    </div>

                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <script>
                                        const cti = document.getElementById('myChar');

                                        new Chart(cti, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ['Plano 1', 'Plano 2', 'Plano 3', 'Funcionários', 'Parceiros', 'Parcerias pendentes'],
                                                datasets: [{
                                                    data: [<?php echo $totalPessoasPlano1 ?>, <?php echo $totalPessoasPlano2 ?>, <?php echo $totalPessoasPlano3 ?>, <?php echo $totalFuncionarios ?>, <?php echo $totalParceiros ?>, <?php echo $totalParceirosnum ?>],
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Projetos</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Academia 1 <span class="float-right">20%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Academia 2 <span class="float-right">40%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Academia 3 <span class="float-right">60%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Academia 4 <span class="float-right">80%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Academia 5 <span class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Cores do Sistema -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                            Primeira
                                            <div class="text-white-50 small">#4e73df</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                            Successo
                                            <div class="text-white-50 small">#1cc88a</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            Informações
                                            <div class="text-white-50 small">#36b9cc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            Alerta
                                            <div class="text-white-50 small">#f6c23e</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            Perigo
                                            <div class="text-white-50 small">#e74a3b</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                            Não essencial
                                            <div class="text-white-50 small">#858796</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-light text-black shadow">
                                        <div class="card-body">
                                            Leve
                                            <div class="text-black-50 small">#f8f9fc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-dark text-white shadow">
                                        <div class="card-body">
                                            Pesado
                                            <div class="text-white-50 small">#5a5c69</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Imagens</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="../img/logobranco.png" alt="...">
                                    </div>
                                    <p>Adicione algumas ilustrações SVG de qualidade ao seu projeto, cortesia da <a href="https://www.instagram.com/i.t.s.a.s/">I.T.S.A.S.</a></p>

                                </div>
                            </div>

                            <!-- Approach -->


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;2023 Todos direitos reservado a
                            <a href="https://www.instagram.com/i.t.s.a.s/ " color="purple">I.T.S.A.S.™</a>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->


</body>

</html>