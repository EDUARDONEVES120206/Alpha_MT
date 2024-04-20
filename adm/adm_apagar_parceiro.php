<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit;
}
require_once('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if (isset($_GET['cpf_cnpj'])) {
    $cpf_cnpj = $_GET['cpf_cnpj'];

    $sql = "SELECT * FROM tbparceiro WHERE cpf_cnpj = '$cpf_cnpj'";
    $query = mysqli_query($mysql->con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $partnerData = mysqli_fetch_assoc($query);
    } else {
        echo "Parceiro não encontrado.";
        exit;
    }
}

if (isset($_POST['delete'])) {
    $deleteSql = "DELETE FROM tbparceiro WHERE cpf_cnpj = '$cpf_cnpj'";
    $deleteQuery = mysqli_query($mysql->con, $deleteSql);

    if ($deleteQuery) {
        echo "<script language='javascript' type='text/javascript'>
          alert('Parceiro removido com sucesso.');window.location.href='controle_parceiros.php';
          </script>";
        exit;
    } else {
        echo "<script language='javascript' type='text/javascript'>
          alert('Ops, tivemos um erro ao remover.');window.location.href='controle_parceiros.php';
          </script>";
        ;
    }
}

$mysql->fechar();
?>

<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - ADM</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/sb-admin-2.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="../css/sb-admin-2.css" rel="stylesheet">
</head>

<body>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adm.php">
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
            style="display: flex; justify-content: center; align-items: center; width: 180vh; margin-top: -850px; margin-left: 40px;">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary">Excluir Parceiro</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <center>
                        <h1>Excluir Parceiro</h1>
                        <h3>Tem certeza de que deseja excluir?
                            
                        </h3>
                        <form method=" POST" action="">
                                <input class="btn btn-primary" type="submit" name="delete" value="Excluir">
                                <a class="btn btn-primary" href="controle_parceiros.php">Cancelar</a>
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