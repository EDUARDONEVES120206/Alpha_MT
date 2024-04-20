<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="../../../css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        h5 {
            color: black;
        }

        body {
            background-color: #111111;
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
            <li class="item-menu ativo">
                <a href="gerenciar_fichas.php">
                    <span class="icon"><i class="bi bi-clipboard"></i></span>
                    <span class="txt-link">Fichas</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="gerenciar_fichas_cadastradas.php">
                    <span class="icon"><i class="bi bi-clipboard-check"></i></span>
                    <span class="txt-link">Fichas_cadastradas</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Suporte</span>
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
    <div id="column">

        <?php
        session_start();

        if ($_SESSION['log'] != "ativo") {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
            exit;
        }

        require_once("../../../conexao/conexao.php");
        $bancoDeDados = new BancodeDados();
        $bancoDeDados->conecta();
        $sql = "SELECT login, sexo, altura, peso, cpf FROM tbperguntasficha";
        $resultado = $bancoDeDados->executaSQL($sql);

        if ($resultado) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<center> <div class='col-xl-7 col-lg-5'>"; // Definindo uma altura de 3 unidades (h-25) e largura de 100% (w-100)
                echo "<br><div class='card custom-sidebar-style'>";
                echo "<div class='card-body'>";
                echo "<div style='text-align: Center;'>";
                echo " <h5> Login: " . $row['login'] . "<br>";
                echo "Sexo: " . $row['sexo'] . "<br>";
                echo "Altura: " . $row['altura'] . "<br>";
                echo "Peso: " . $row['peso'] . "<br>";
                echo "<a href='ver_mais.php?login=" . $row['login'] . "'><br><button>Ver Mais</button></a><br>";
                echo "</form></div>";
                echo "</div></div></center> </h5>";
            }
        } else {
            echo "Erro na consulta SQL.";
        }


        if (mysqli_num_rows($resultado) == 0) {
            echo "<script language='javascript' type='text/javascript'>alert('Você não possui fichas pendentes!!');window.location.href='home.php';</script>";
        }

        $bancoDeDados->fechar();
        ?>

    </div>
    </div>
    </div>
    </div>
    </div>
</body>
<script src="../js/menu.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/95dc93da07.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</html>