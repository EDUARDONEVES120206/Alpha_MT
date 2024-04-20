<head>
    <title> AlphaMT - ADM </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link href="../css/style19.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
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
    <div class='lista-centralizada'>
    <br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
        session_start();
        if ($_SESSION['log'] != "ativo") {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
        }
        ?>

        <h1>Lista de Pedidos</h1>




        <?php
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();



        $nivel1 = 'profissionais';
        $nivel2 = 'academia';
        $nivel3 = 'loja';


        $sqlstring1 = "SELECT * FROM parceria WHERE nivel = '$nivel1'  ORDER BY nome";
        $query1 = @mysqli_query($mysql->con, $sqlstring1);

        echo "<h3>Pedidos de $nivel1 </h3>";
        echo "<table id='customers'>";
        echo "<tr><th>Id</th><th>Nome</th><th>Nivel</th><th>Email</th><th>Telefone</th><th>Motivo</th><th>Aceitar</th><th>Rejeitar</th></tr>";

        while ($dados1 = mysqli_fetch_array($query1)) {
            echo "<tr>";
            echo "<td>" . $dados1['id_parceria'] . "</td>";
            echo "<td><b>" . $dados1['nome'] . "</b></td>";
            echo "<td><b>" . $dados1['nivel'] . "</b></td>";
            echo "<td><b>" . $dados1['email'] . "</b></td>";
            echo "<td><b>" . $dados1['telefone'] . "</b></td>";
            echo "<td><b>" . $dados1['motivo'] . "</b></td>";
            $id = base64_encode($dados1['id_parceria']);

            echo "<td><a href='aceitar_parceria.php?id_parceria=" . $dados1['id_parceria'] . "'>Aceitar</td>";
            echo "<td><a href='deletar/rejeitar_parceria.php?id_parceria=" . $dados1['id_parceria'] . "'>Rejeitar</td>";
            echo "</tr>";

        }
        echo "</table>";

        $sqlstring2 = "SELECT * FROM parceria WHERE nivel = '$nivel2'  ORDER BY nome";
        $query2 = @mysqli_query($mysql->con, $sqlstring2);

        echo "</br>";
        echo "</br>";
        echo "<h3>Pedidos de $nivel2</h3> ";
        echo "<table id='customers'>";
        echo "<tr><th>Id</th><th>Nome</th><th>Nivel</th><th>Email</th><th>Telefone</th><th>Motivo</th><th>Aceitar</th><th>Rejeitar</th></tr>";

        while ($dados2 = mysqli_fetch_array($query2)) {
            echo "<tr>";
            echo "<td>" . $dados2['id_parceria'] . "</td>";
            echo "<td><b>" . $dados2['nome'] . "</b></td>";
            echo "<td><b>" . $dados2['nivel'] . "</b></td>";
            echo "<td><b>" . $dados2['email'] . "</b></td>";
            echo "<td><b>" . $dados2['telefone'] . "</b></td>";
            echo "<td><b>" . $dados2['motivo'] . "</b></td>";
            $id = base64_encode($dados2['id_parceria']);

            echo "<td><a href='aceitar_parceria.php?id_parceria=" . $dados2['id_parceria'] . "'>Aceitar</td>";
            echo "<td><a href='deletar/rejeitar_parceria.php?id_parceria=" . $dados2['id_parceria'] . "'>Rejeitar</td>";
            echo "</tr>";

        }
        echo "</table>";


        $sqlstring3 = "SELECT * FROM parceria WHERE nivel = '$nivel3'  ORDER BY nome";
        $query3 = @mysqli_query($mysql->con, $sqlstring3);

        echo "</br>";
        echo "</br>";
        echo "<h3>Pedidos de $nivel3</h3> ";
        echo "<table id='customers'>";
        echo "<tr><th>Id</th><th>Nome</th><th>Nivel</th><th>Email</th><th>Telefone</th><th>Motivo</th><th>Aceitar</th><th>Rejeitar</th></tr>";

        while ($dados3 = mysqli_fetch_array($query3)) {
            echo "<tr>";
            echo "<td>" . $dados3['id_parceria'] . "</td>";
            echo "<td><b>" . $dados3['nome'] . "</b></td>";
            echo "<td><b>" . $dados3['nivel'] . "</b></td>";
            echo "<td><b>" . $dados3['email'] . "</b></td>";
            echo "<td><b>" . $dados3['telefone'] . "</b></td>";
            echo "<td><b>" . $dados3['motivo'] . "</b></td>";
            $id = base64_encode($dados3['id_parceria']);
            echo "<td><a href='aceitar_parceria.php?id_parceria=" . $dados3['id_parceria'] . "'>Aceitar</td>";
            echo "<td><a href='deletar/rejeitar_parceria.php?id_parceria=" . $dados3['id_parceria'] . "'>Rejeitar</td>";
            echo "</tr>";

        }
        echo "</table>";


        $mysql->fechar();
        ?>
        <form action="adm.php" method="post">

            <input class="btn btn-primary" type="submit" name="voltar" value="Voltar">
        </form>
        <form action="../fechar_sessao.php" method="post">

            <input class="btn btn-primary" type="submit" name="sair" value="Sair">
        </form>
    </div>

        <body>