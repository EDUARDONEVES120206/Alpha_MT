<html>

<head>
    <title>Deletar Parceria</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../img/logobranco.png">
    <link rel="stylesheet" href="../../css/sb-admin-2.css">
    <link rel="stylesheet" href="../../css/style4.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../img/logobranco.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <script>
        function confirmDeletion() {
            if (confirm("Tem certeza de que deseja deletar esta parceria?")) {
                // Se o usuário confirmar, envie o formulário de exclusão
                document.getElementById("deletionForm").submit();
            }
        }
    </script>
</head>

<body>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adm.php">
            <i><img src="../../img/logo.png" height="100px" widgh="100px"></i>

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
            <a class="nav-link collapsed" href="controle_usuario.php" rel="noreferrer noopener nofollow"
                data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Usuarios</span>
            </a>

        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="controle_parceiros.php" rel="noreferrer noopener nofollow">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Parceiros</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:history.go(-1)">
                <i class="fas fa-sign-out-alt"></i>
                <span>Voltar</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="../fechar_sessao.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span></a>
        </li>

    </ul>
    <div class="container-fluid">
        <div
            style="display:  flex; justify-content: center; align-items: center; width: 180vh; margin-top: -850px; margin-left: 40px;">
            <div class="col-xl-8 col-lg-7 ">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary">Excluir Parceiro</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <center>
                        <h1>Deletar Parceria</h1>
                        <?php
                        session_start();

                        if ($_SESSION['log'] != "ativo") {
                            echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
                            exit;
                        }
                        require_once('../../conexao/conexao.php');

                        // Verifique se o ID da parceria foi passado na URL
                        if (isset($_GET['id_parceria'])) {
                            $id_parceria = $_GET['id_parceria'];

                            $mysql = new BancodeDados();
                            $mysql->conecta();

                            // Recupera os detalhes da parceria antes da exclusão
                            $sql_select = "SELECT * FROM parceria WHERE id_parceria = $id_parceria";
                            $resultado = mysqli_query($mysql->con, $sql_select);

                            if ($resultado) {
                                $dados_parceria = mysqli_fetch_array($resultado);

                                // mostra os dados
                                echo "ID: " . $dados_parceria['id_parceria'] . "<br>";
                                echo "Nome: <b>" . $dados_parceria['nome'] . "</b><br>";
                                echo "Email: <b>" . $dados_parceria['email'] . "</b><br>";
                                echo "Telefone: <b>" . $dados_parceria['telefone'] . "</b><br>";
                                echo "Motivo: <b>" . $dados_parceria['motivo'] . "</b><br>";

                                // Feche a conexão com o banco de dados
                                $mysql->fechar();
                            } else {
                                // Trate o erro de consulta aqui
                                echo "Erro na consulta: " . mysqli_error($mysql->con);
                            }
                        } else {
                            echo "ID de parceria não foi fornecido na URL.";
                        }
                        ?>

                        <form method="POST" action="processar_delecao.php?id_parceria=<?php echo $id_parceria; ?>"
                            id="deletionForm">
                            <!-- Campo oculto para passar o ID da parceria -->
                            <input type="hidden" name="id_parceria" value="<?php echo $id_parceria; ?>">
                            <p>Tem certeza de que deseja deletar esta parceria?</p>
                            <input class="btn btn-second" type="button" value="Deletar" onclick="confirmDeletion()">
                        </form>
                        <form method="POST" action="../pedidos_parceiros.php">
                            <input class="btn btn-second" type="submit" value="Voltar">
                        </form>
                    </center>
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