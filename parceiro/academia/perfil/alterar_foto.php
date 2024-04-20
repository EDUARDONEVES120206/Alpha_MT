<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload de Imagem</title>
    <link rel="shortcut icon" type="../img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/sb-admin-2.css">
    <link rel="stylesheet" href="../../../css/style4.css">
    <link rel="stylesheet" href="../../../css/Style8.css">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</head>
<body>
<nav class="menu-lateral">

<div class="btn-expandir">
    <i class="bi bi-list" id="btn-exp"></i>
</div>

<ul>

    <li class="item-menu">
        <a href="../home_academia.php">
            <span class="icon"><i class="bi bi-house-door-fill"></i></span>
            <span class="txt-link">Inicio</span>
        </a>
    </li>
    <li class="item-menu ativo">
        <a href="perfil_academia.php">
            <span class="icon"><i class="bi bi-person-circle"></i></span>
            <span class="txt-link">Perfil</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="../equipamentos/cadastro_equipamento_academia.php">
            <span class="icon"><i class="fas fa-dumbbell"></i></span>
            <span class="txt-link">Equipamentos</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="gerenciar_plano_academia.php">
            <span class="icon"><i class="bi bi-folder"></i></span>
            <span class="txt-link">Plano</span>
        </a>
    </li>

    <li class="item-menu">
        <a href="#">
            <span class="icon"><i class="bi bi-gear"></i></span>
            <span class="txt-link">Configurações</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="../../../fechar_sessao.php">
            <span class="icon"><i class="bi bi-door-open"></i></span>
            <span class="txt-link">Sair</span>
        </a>
    </li>

</ul>

</nav>
    <center>
    <form action="processar_upload.php" method="POST" enctype="multipart/form-data">
        Selecione uma imagem para fazer o upload:
        <input type="file" name="imagem">
        <input class="btn btn-second"type="submit" value="Enviar">
    </form>
</center>
</body>
</html>
