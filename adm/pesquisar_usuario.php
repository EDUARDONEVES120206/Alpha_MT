<!DOCTYPE html>
 <!-- Pesquisa dos Parceiros --> <!-- Pesquisa dos Parceiros --> <!-- Pesquisa dos Parceiros --> <!-- Pesquisa dos Parceiros --> <!-- Pesquisa dos Parceiros -->
<html>

<head>
<?php
        session_start();
        if ($_SESSION['log'] != "ativo") {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
        }
        ?>
    <title>AlphaMT - ADM</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/style19.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
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
<div class="lista-centralizadaPesquisa">
    <?php
    if (isset($_GET['pesquisa'])) {
        // Inclua o arquivo de conexão com o banco de dados
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        // Sanitize e obter a pesquisa do usuário
        $pesquisa = $mysql->con->real_escape_string($_GET['pesquisa']);

        // Consultar o banco de dados para encontrar o usuário
        $sql = "SELECT * FROM tbparceiro WHERE login = '$pesquisa'";
        $resultado = $mysql->con->query($sql);

        // Verificar se a consulta foi bem-sucedida
        if ($resultado) {
            // Loop para exibir informações do usuário
            echo "<h3>Parceiro <img src='../img/logobranco.png' alt='Logo' class='logo'>  </h3> ";
            echo "<table id='customers'style='margin-top: 20px;'> <center>";
            echo "<tr><th>Nome</th><th>Login</th><th>CPF/CNPJ</th><th>Email</th><th>Tipo</th><th>Telefone</th><th>Alterar</th><th>Deletar</th></tr>";
            while ($usuario = $resultado->fetch_assoc()) {


                echo "<div class='lista-centralizadaPesquisa'>";
                echo "<td>" . $usuario['nome'] . "</td>";
                echo "<td><b>" . $usuario['login'] . "</b></td>";
                echo "<td><b>" . $usuario['cpf_cnpj'] . "</b></td>";
                echo "<td><b>" . $usuario['email'] . "</b></td>";
                echo "<td><b>" . $usuario['tipo'] . "</b></td>";
                echo "<td><b>" . $usuario['telefone'] . "</b></td>";
                $cpf = base64_encode($usuario['cpf_cnpj']);
                echo "<td><a href='adm_alterar_parceiro.php?cpf_cnpj=" . $usuario['cpf_cnpj'] . "'>Alterar</td>";
                echo "<td><a href='adm_apagar_parceiro.php?cpf_cnpj=" . $usuario['cpf_cnpj'] . "'>Deletar</td>";
                echo "</tr>";
                echo "</div>";

                // Adicione mais campos conforme necessário
            }
            echo "</table>";

            // Verificar se nenhum usuário foi encontrado
            if ($resultado->num_rows === 0) {
                echo "Nenhum usuário encontrado.";
            }
        } else {
            // Se a consulta não foi bem-sucedida, exiba uma mensagem de erro
            echo "Erro na consulta: " . $mysql->con->error;
        }

        // Feche a conexão com o banco de dados
        $mysql->fechar();
    }
    
    ?>
</div>

</body>

</html>