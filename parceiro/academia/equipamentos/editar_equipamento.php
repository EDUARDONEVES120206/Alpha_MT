<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}

$host = "localhost";
$user = "root";
$senha = "prof@etec";
$banco = "alpha";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve equipment data based on the ID
    $sql = "SELECT * FROM tbequipamento WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Display the equipment data and provide a form for editing
            ?>
            <html>

            <head>
                <title>AlphaMT - Academia</title>
                <link rel="shortcut icon" type="img/mini_logo.png" href="../../../img/logobranco.png">
                <link rel="stylesheet" href="../../../css/sb-admin-3.css">
                <link rel="stylesheet" href="../../../css/style10.css">
                <link rel="stylesheet" href="../../../css/style4.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


                <link href="sidebars.css" rel="stylesheet">
            </head>

            <body>
                <nav class="menu-lateral">

                    <div class="btn-expandir">
                        <i class="bi bi-list" id="btn-exp"></i>
                    </div>

                    <ul>

                        <li class="item-menu ativo">
                            <a href="home_academia.php">
                                <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                                <span class="txt-link">Inicio</span>
                            </a>
                        </li>
                        <li class="item-menu">
                            <a href="perfil/perfil_academia.php">
                                <span class="icon"><i class="bi bi-person-circle"></i></span>
                                <span class="txt-link">Perfil</span>
                            </a>
                        </li>
                        <li class="item-menu">
                            <a href="equipamentos/cadastro_equipamento_academia.php">
                                <span class="icon"><i class="fas fa-dumbbell"></i></span>
                                <span class="txt-link">Equipamentos</span>
                            </a>
                        </li>
                        <li class="item-menu">
                            <a href="perfil/gerenciar_plano_academia.php">
                                <span class="icon"><i class="bi bi-folder"></i></span>
                                <span class="txt-link">Plano</span>
                            </a>
                        </li>
                        <li class="item-menu">
                            <a href="#">
                                <span class="icon"><i class="bi bi-gear"></i></span>
                                <span class="txt-link">Suporte</span>
                            </a>
                        </li>
                        <li class="item-menu">
                            <a href="../../fechar_sessao.php">
                                <span class="icon"><i class="bi bi-door-open"></i></span>
                                <span class="txt-link">Sair</span>
                            </a>
                        </li>


                    </ul>

                </nav>
                <br><br>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-6 col-lg-6" style="margin-right: 20px;">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Cadastro de Equipamentos</h6>
                                </div>
                                
                                <a class="btn btn-second" href="cadastro_equipamento_academia.php">Cancelar </a>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>
            <?php
        } else {
            echo "Equipamento não encontrado.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a instrução SQL.";
    }
} else {
    echo "Requisição inválida.";
}

mysqli_close($conexao);
?>