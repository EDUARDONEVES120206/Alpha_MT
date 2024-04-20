<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<body>

    <?php
    session_start();

    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";
    } elseif ($_SESSION['nivel'] == "adm") {
        header("Location: ../adm/adm.php");
        exit();
    } elseif ($_SESSION['nivel'] == "usuario") {
        include('conectar.php');

    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Precisa estar logado para acessar o conteúdo');
        window.location.href='../fechar_sessao.php';</script>";
    }
    ?>
    <link href="sidebars.css" rel="stylesheet">
    </head>

    <body>
        <nav class="menu-lateral">

            <div class="btn-expandir">
                <i class="bi bi-list" id="btn-exp"></i>
            </div>

            <ul>
                <li class="item-menu ativo">
                    <a href="#">
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
                        <span class="txt-link">Suporte</span>
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

        <div id="column">
            
          <br><br><br>
            <a href="fichat.php">
                <img class="ie" src="../img/ficha.jpg" alt="">
            </a>
            <br><br>
            <a href="cardio.php">
                <img class="ie" src="../img/cardio.jpg" alt="">
            </a>
            <br><br>
            <a href="cronograma.php">
                <img class="ie" src="../img/cronogramas.jpg" alt="">
            </a>
            <script src="../js/menu.js"></script>
        </div>
    </body>

</html>