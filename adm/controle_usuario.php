<head>
    <title>AlphaMT - ADM</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link href="../css/style19.css" rel="stylesheet">    
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adm.php">
            <i><img src="../img/logo.png" height="100px" widgh="100px"></i>

            <div class="sidebar-brand-text mx-3">AlphaMt<sup>GYM</sup></div>
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
                <span>Usuários</span>
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
</div>
<?php
// Inicialização de sessão e verificação de login
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
}

// Inclusão do arquivo de conexão com o banco de dados
require_once('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();
?>
<div class='lista-centralizadaUsu'>
    <br> <br><br><br> <br><br><br> <br><br><br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET"
        action="pesquisar_usuario2.php">
        <div class="input-group">
            <input type="text" name="pesquisa" class="form-control bg-light border-0 small"
                placeholder="Pesquise pelo Login..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
    <div id="resultados_pesquisa">
    </div>
    <br>
    <h1>Lista de Usuários</h1>





    <?php
    require_once('../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();


    $plano1 = '1';
    $plano2 = '2';
    $plano3 = '3';
    $nivel = '';

    $sqlstring1 = "SELECT * FROM tbusuario WHERE plano = '$plano1'  ORDER BY nome";
    $query1 = @mysqli_query($mysql->con, $sqlstring1);

    echo "<h3> Usuários do Plano $plano1 </h3>";
    echo "<table id='customers'>";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF</th><th>Email</th><th>Plano</th><th>Nivel</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados1 = mysqli_fetch_array($query1)) {
        echo "<tr>";
        echo "<td>" . $dados1['nome'] . "</td>";
        echo "<td><b>" . $dados1['login'] . "</b></td>";
        echo "<td><b>" . $dados1['cpf'] . "</b></td>";
        echo "<td><b>" . $dados1['email'] . "</b></td>";
        echo "<td><b>" . $dados1['plano'] . "</b></td>";
        echo "<td><b>" . $dados1['nivel'] . "</b></td>";
        $cpf = base64_encode($dados1['cpf']);
            echo "<td><a href='alterar_usuario.php?cpf=" . $dados1['cpf'] . "'>Alterar</td>";
            echo "<td><a href='apagar_usuario.php?cpf=" . $dados1['cpf'] . "'>Deletar</td>";
        echo "</tr>";

    }
    echo "</table>";


    $sqlstring2 = "SELECT * FROM tbusuario WHERE plano = '$plano2'  ORDER BY nome";
    $query2 = @mysqli_query($mysql->con, $sqlstring2);

    echo "</br>";
    echo "</br>";
    echo "<h3> Usuários do Plano $plano2</h3>";
    echo "<table id='customers'>";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF</th><th>Email</th><th>Plano</th><th>Nivel</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados2 = mysqli_fetch_array($query2)) {
        echo "<tr>";
        echo "<td>" . $dados2['nome'] . "</td>";
        echo "<td><b>" . $dados2['login'] . "</b></td>";
        echo "<td><b>" . $dados2['cpf'] . "</b></td>";
        echo "<td><b>" . $dados2['email'] . "</b></td>";
        echo "<td><b>" . $dados2['plano'] . "</b></td>";
        echo "<td><b>" . $dados2['nivel'] . "</b></td>";
        $cpf = base64_encode($dados2['cpf']);
        echo "<td><a href='alterar_usuario.php?cpf=" . $dados2['cpf'] . "'>Alterar</td></button>";
        echo "<td><a href='apagar_usuario.php?cpf=" . $dados2['cpf'] . "'>Deletar</td>";
        echo "</tr>";
    }
    echo "</table>";


    $sqlstring3 = "SELECT * FROM tbusuario WHERE plano = '$plano3'  ORDER BY nome";
    $query3 = @mysqli_query($mysql->con, $sqlstring3);

    echo "</br>";
    echo "</br>";
    echo "<h3>Usuários do Plano $plano3</h3> ";
    echo "<table id='customers'>";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF</th><th>Email</th><th>Plano</th><th>Nivel</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados3 = mysqli_fetch_array($query3)) {
        echo "<tr>";
        echo "<td>" . $dados3['nome'] . "</td>";
        echo "<td><b>" . $dados3['login'] . "</b></td>";
        echo "<td><b>" . $dados3['cpf'] . "</b></td>";
        echo "<td><b>" . $dados3['email'] . "</b></td>";
        echo "<td><b>" . $dados3['plano'] . "</b></td>";
        echo "<td><b>" . $dados3['nivel'] . "</b></td>";
        $cpf = base64_encode($dados3['cpf']);
        echo "<td><a href='alterar_usuario.php?cpf=" . $dados3['cpf'] . "'>Alterar</td>";
        echo "<td><a href='apagar_usuario.php?cpf=" . $dados3['cpf'] . "'>Deletar</td>";
        echo "</tr>";
    }
    echo "</table>";

    $mysql->fechar();
    ?>
    </br>   
    