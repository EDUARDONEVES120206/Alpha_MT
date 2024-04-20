<head>
<title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/sb-admin-2.css">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <style>
    .modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        z-index: 1;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        max-width: 50%; 
        max-height: 150px;
    }
</style>
</head>

<body>
<nav class="menu-lateral">

<div class="btn-expandir">
    <i class="bi bi-list" id="btn-exp"></i>
</div>

<ul>
    <li class="item-menu">
        <a href="home.php">
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
    <li class="item-menu ativo">
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



    <?php
    session_start();

    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";
    }
    $p = $_SESSION['plano'];
    $plano = "";
    if ($p == 1) {
        $plano = "Plano Básico Fitness";
    } elseif ($p == 2) {
        $plano = "Plano de Elite Fitness";
    } elseif ($p == 3) {
        $plano = "Plano Premium Plus";
    }

    ?>
    <br> <br>
    <div class="row">


        <div class="col-xl-7 col-md-6 mb-4">
            <div class="">
                <div class="card-body2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a class="text-xs font-weight-bold text-info text-uppercase mb-1"> </a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <a href="alterar_foto.php" class="text-xs font-weight-bold text-info text-uppercase mb-1"
                                    id="openModalLink">Foto de perfil</a>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">

                            <?php
                            require_once("../conexao/conexao.php");
                            $login = $_SESSION['login'];
                            $mysql = new BancodeDados();
                            $mysql->conecta();
                            $sql = "SELECT caminho FROM tbimagens_usuario WHERE login = '$login'";
                            $resultado = $mysql->executaSQL($sql);
                            if ($resultado && mysqli_num_rows($resultado) > 0) {
                                $dados = mysqli_fetch_assoc($resultado);
                                $caminho = $dados['caminho'];
                                echo "<img src='$caminho' alt='Foto de perfil' class='img-fluid rounded-circle' style='max-width: 100px;'>";
                            } else {
                                echo "<img src='../img/semfoto.png' alt='Foto de perfil' class='img-fluid rounded-circle' style='max-width: 100px;'>";
                            }
                            $mysql->fechar();
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="fotoModal" class="modal">
    <span class="close" id="closeFotoModal">&times;</span>
    <form action="processar_upload.php" method="POST" enctype="multipart/form-data">
        Selecione uma imagem para fazer o upload:
        <input type="file" name="imagem"><br>
        <center>
        <input class="btn btn-second" type="submit" value="Enviar">
                        </center>
    </form>
</div>

<script>
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
    }

    document.getElementById("openModalLink").addEventListener("click", function (e) {
        e.preventDefault(); 
        openModal("fotoModal");
    });

    document.getElementById("closeFotoModal").addEventListener("click", function () {
        closeModal("fotoModal");
    });

    window.onclick = function (event) {
        if (event.target == document.getElementById("fotoModal")) {
            closeModal("fotoModal");
        }
    }
</script>
    </div>

    <div class="row">

        <div class="col-xl-7 col-lg-6 h-100">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Formularios de Cadastro
                    </h6>
                    <div class="dropdown no-arrow">
                        <?php
                        echo "<h6 class='m-0 font-weight-bold text-primary'>Usuario: " . $_SESSION['nome'] . "</
             h6>";
                        echo "<h6 class='m-0 font-weight-bold text-primary'>Plano: " . $plano . "</h6>";
                        ?>
                    </div>
                </div>

                <form method="POST" action="alterar_informacoes.php">
                    <h3>&nbsp;Alterar Informações</h3>


                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        Nome: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="novo_nome" class="label-input"
                            placeholder="Nome" value="<?php echo $_SESSION['nome']; ?>">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        Usuario:&nbsp;&nbsp; <input type="text" name="novo_login" class="label-input"
                            placeholder="Nome de Usuario" value="<?php echo $_SESSION['login']; ?>">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-envelope  icon-modify"></i>
                        Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="novo_email" class="label-input"
                            placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-phone icon-modify"></i>

                        Telefone: <input type="text" name="novo_numero" class="label-input" placeholder="Telefone"
                            value="<?php echo $_SESSION['numero']; ?>">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock    icon-modify"></i>
                        Palavra Chave: <input type="text" name="novo_palavra_chave" class="label-input"
                            placeholder="Palavra Chave" value="<?php echo $_SESSION['palavra_chave']; ?>">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        Insira a senha para confirmar: <input type="password" name="senha" class="label-input"
                            placeholder="Senha"><br>
                    </label>
                    <center>
                        <button id="signin" value="Salvar Alterações" class="btn btn-second">Salvar</button>
                    </center>
                </form>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 h-100">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Formulario de Trocar Senha</h6>
                    <div class="dropdown no-arrow">

                    </div>
                </div>

                <form method="POST" action="trocar_senha.php">
                    <h3>&nbsp; Trocar Senha</h3>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        Nova Senha:
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                        <input type="text" name="nova_senha" class="label-input"><br>
                    </label>
                    <br>
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        Confirmar Senha: <input type="text" name="confirmar_nova_senha" class="label-input">
                    </label>
                    <br><br><br><br>
                    <center>

                        <button id="signin" value="Trocar Senha" class="btn btn-second">Salvar</button>
                        <a class="btn btn-second" href="gerenciar_plano.php">Planos</a>


                        <br><br><br><br>
                        <br>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="../js/menu.js"></script>
</body>