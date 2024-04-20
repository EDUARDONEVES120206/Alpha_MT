<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/Style8.css">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <style>
        /* Estilos para o modal */
        .modal {
            display: none; /* Oculta o modal por padrão */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
        }

        .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
        }
    </style>
    <style>
        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    }
    ?>
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


    <div id="perfil">


        <div class="header">
            <?php
            require_once("../../../conexao/conexao.php");
            $login = $_SESSION['login'];
            $mysql = new BancodeDados();
            $mysql->conecta();
            $sql = "SELECT caminho FROM tbfundo_acad WHERE login = '$login'";
            $resultado = $mysql->executaSQL($sql);
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $dados = mysqli_fetch_assoc($resultado);
                $fundo = $dados['caminho'];
                echo "<img src='$fundo' alt='Background Image'>";
            } else {
                echo "<img src='../../../img/semfundo.png' alt='Background Image'>";
            }
            $mysql->fechar();
            ?>

            <button class="mui-btn">
                <div class="text">ALTERAR FUNDO</div>
                <i class="fa fa-picture-o" style="color: white;" aria-hidden="true"></i>
            </button>
        </div>




        <div class="avatar">
            <?php
            require_once("../../../conexao/conexao.php");
            $login = $_SESSION['login'];
            $mysql = new BancodeDados();
            $mysql->conecta();
            $sql = "SELECT caminho FROM tbimagens_acad WHERE login = '$login'";
            $resultado = $mysql->executaSQL($sql);
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $dados = mysqli_fetch_assoc($resultado);
                $caminho = $dados['caminho'];
                echo "<img src='$caminho' alt='Avatar Image'>";
            } else {
                echo "<img src='../../../img/semfoto.png' alt='Avatar Image'>";
            }
            $mysql->fechar();
            ?>
        </div>


    </div>



    <div class="opperfil">
        <center>

        <button class="mui-btn mui-btn--primary" id="openFotoModal">
    <div class="text">ALTERAR FOTO</div>
</button>

<!-- O modal de ALTERAR FOTO em si -->
<div id="fotoModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeFotoModal">&times;</span>
        <form action="processar_upload.php" method="POST" enctype="multipart/form-data">
            Selecione uma imagem para fazer o upload:
            <input type="file" name="imagem">
            <input class="btn btn-second" type="submit" value="Enviar">
        </form>
    </div>
</div>

<!-- Botão para abrir o modal de ALTERAR FUNDO -->
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<button class="mui-btn mui-btn--primary" id="openFundoModal">
<div class="text">ALTERAR FUNDO</div>
</button>

<!-- O modal de ALTERAR FUNDO em si -->
<div id="fundoModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeFundoModal">&times;</span>
        <form action="fundo_processar_upload.php" method="POST" enctype="multipart/form-data">
           Selecione uma imagem para alterar o fundo:
            <input type="file" name="imagem">
            <input class="btn btn-second" type="submit" value="Enviar">
        </form>
    </div>
</div>

<script>
    // Função para abrir o modal
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    // Função para fechar o modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
    }

    // Atribuir eventos aos botões
    document.getElementById("openFotoModal").addEventListener("click", function() {
        openModal("fotoModal");
    });

    document.getElementById("closeFotoModal").addEventListener("click", function() {
        closeModal("fotoModal");
    });

    document.getElementById("openFundoModal").addEventListener("click", function() {
        openModal("fundoModal");
    });

    document.getElementById("closeFundoModal").addEventListener("click", function() {
        closeModal("fundoModal");
    });

    // Também feche os modais se o usuário clicar fora deles
    window.onclick = function(event) {
        if (event.target == document.getElementById("fotoModal")) {
            closeModal("fotoModal");
        }
        if (event.target == document.getElementById("fundoModal")) {
            closeModal("fundoModal");
        }
    }
</script>


        </center>
    </div>


    <div class="tituloperfil">

        <h1>
            <?php





            echo $_SESSION['nome'];
            ?>
        </h1>
        <div class="bigbriefing">

            <p>
                <b>Endereço:</b>
                <?php

                echo $_SESSION['endereco'];

                ?>

            </p>
        </div>

    </div><br />

    <div class="infocandidato">




    </div>
    <script src="../../../js/menu.js"></script>
    </div>