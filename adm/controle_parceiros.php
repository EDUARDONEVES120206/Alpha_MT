<head>
    <title>AlphaMT - ADM </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/style19.css" rel="stylesheet">
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
<div class='lista-centralizada'>
    <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET"
        action="pesquisar_usuario.php">
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

    <center>
        <h1>Lista de Parceiros</h1>
    </center>



    <?php
    require_once('../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();


    $nivel1 = 'profissionais';
    $nivel2 = 'academia';
    $nivel3 = 'loja';
    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

    // Consulta SQL modificada para incluir a pesquisa para $nivel1
    $sqlstring1 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel1' AND cpf_cnpj LIKE '%$pesquisa%' ORDER BY nome";
    $query1 = @mysqli_query($mysql->con, $sqlstring1);

    // Consulta SQL modificada para incluir a pesquisa para $nivel2
    $sqlstring2 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel2' AND cpf_cnpj LIKE '%$pesquisa%' ORDER BY nome";
    $query2 = @mysqli_query($mysql->con, $sqlstring2);

    // Consulta SQL modificada para incluir a pesquisa para $nivel3
    $sqlstring3 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel3' AND cpf_cnpj LIKE '%$pesquisa%' ORDER BY nome";
    $query3 = @mysqli_query($mysql->con, $sqlstring3);


    $sqlstring1 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel1'  ORDER BY nome";
    $query1 = @mysqli_query($mysql->con, $sqlstring1);


    echo "<h3>Parceiros: $nivel1 <img src='../img/logobranco.png' alt='Logo' class='logo'>  </h3> ";
    echo "<table id='customers'style='margin-top: 20px;'>";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF/CNPJ</th><th>Email</th><th>Tipo</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados1 = mysqli_fetch_array($query1)) {
        echo "<tr>";
        echo "<td>" . $dados1['nome'] . "</td>";
        echo "<td><b>" . $dados1['login'] . "</b></td>";
        echo "<td><b>" . $dados1['cpf_cnpj'] . "</b></td>";
        echo "<td><b>" . $dados1['email'] . "</b></td>";
        echo "<td><b>" . $dados1['tipo'] . "</b></td>";
        $cpf = base64_encode($dados1['cpf_cnpj']);
        echo "<td><a href='adm_alterar_parceiro.php?cpf_cnpj=" . $dados1['cpf_cnpj'] . "'>Alterar</td>";
        echo "<td><a href='adm_apagar_parceiro.php?cpf_cnpj=" . $dados1['cpf_cnpj'] . "'>Deletar</td>";
        echo "</tr>";
    }
    echo "</table>";

    $sqlstring2 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel2'  ORDER BY nome";
    $query2 = @mysqli_query($mysql->con, $sqlstring2);

    echo "</br>";
    echo "</br>";
    echo "<h3>Parceiros: $nivel2<img src='../img/logobranco.png' alt='Logo' class='logo'> </h3>";
    echo "<table id='customers'style='margin-top: 20px;'> > ";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF/CNPJ</th><th>Email</th><th>Tipo</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados2 = mysqli_fetch_array($query2)) {
        echo "<tr>";
        echo "<td>" . $dados2['nome'] . "</td>";
        echo "<td><b>" . $dados2['login'] . "</b></td>";
        echo "<td><b>" . $dados2['cpf_cnpj'] . "</b></td>";
        echo "<td><b>" . $dados2['email'] . "</b></td>";
        echo "<td><b>" . $dados2['tipo'] . "</b></td>";
        $cpf = base64_encode($dados2['cpf_cnpj']);
        echo "<td><a href='adm_alterar_parceiro.php?cpf_cnpj=" . $dados2['cpf_cnpj'] . "'>Alterar</td>";
        echo "<td><a href='adm_apagar_parceiro.php?cpf_cnpj=" . $dados2['cpf_cnpj'] . "'>Deletar</td>";
        echo "</tr>";

    }
    echo "</table>";

    $sqlstring3 = "SELECT * FROM tbparceiro WHERE tipo = '$nivel3'  ORDER BY nome";
    $query3 = @mysqli_query($mysql->con, $sqlstring3);

    echo "</br>";
    echo "</br>";
    echo "<h3>Parceiros: $nivel3 <img src='../img/logobranco.png' alt='Logo' class='logo'> </h3> ";
    echo "<table id='customers'style='margin-top: 20px;'>";
    echo "<tr><th>Nome</th><th>Login</th><th>CPF/CNPJ</th><th>Email</th><th>Tipo</th><th>Alterar</th><th>Deletar</th></tr>";

    while ($dados3 = mysqli_fetch_array($query3)) {
        echo "<tr>";
        echo "<td>" . $dados3['nome'] . "</td>";
        echo "<td><b>" . $dados3['login'] . "</b></td>";
        echo "<td><b>" . $dados3['cpf_cnpj'] . "</b></td>";
        echo "<td><b>" . $dados3['email'] . "</b></td>";
        echo "<td><b>" . $dados3['tipo'] . "</b></td>";
        $cpf = base64_encode($dados3['cpf_cnpj']);
        echo "<td><a href='adm_alterar_parceiro.php?cpf_cnpj=" . $dados3['cpf_cnpj'] . "'>Alterar</td>";
        echo "<td><a href='adm_apagar_parceiro.php?cpf_cnpj=" . $dados3['cpf_cnpj'] . "'>Deletar</td>";
        echo "</tr>";

    }
    echo "</table>";
    echo "</div>";


    $mysql->fechar();
    ?>

</div>