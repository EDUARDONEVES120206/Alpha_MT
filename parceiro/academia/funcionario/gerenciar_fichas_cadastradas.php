<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Fichas </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="../../../css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <style>
        body {
            background-color: #111111;
            color: white;
            text-align: center;
        }

        #column {
            margin-top: 70px;
            padding: 20px;
        }

        button {
            background-color: red;
            color: #111;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }

        h3 {
            color: white;
            text-align: left;
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
            <li class="item-menu ">
                <a href="gerenciar_fichas.php">
                    <span class="icon"><i class="bi bi-clipboard"></i></span>
                    <span class="txt-link">Fichas</span>
                </a>
            </li>
            <li class="item-menu ativo">
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
    <center><br><br>
        <div id="column">

            <?php
            session_start();
            if ($_SESSION['log'] != "ativo") {
                echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
                exit;
            }

            $nome_personal = $_SESSION['nome'];

            echo "<style>
    a {
        text-decoration: none;
        color: #ffffff;
    }

    a:hover {
        text-decoration: underline;
    }
</style>";

            echo "<div style='color: white; text-align: left; margin: 0 auto;'>";

            // Função para exibir informações e criar links de "Ver Mais"
            function exibirInformacoes($titulo, $tabela, $bancoDeDados)
            {
                global $nome_personal;

                echo "<h3>$titulo:</h3>";

                $sql = "SELECT * FROM $tabela WHERE nome_personal = '$nome_personal'";
                $resultado = $bancoDeDados->executaSQL($sql);

                if ($resultado) {
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "Login: " . $row['login_usuario'];

                            echo "<br>";

                            // Adiciona a imagem aqui (substitua o caminho pela imagem real)
                            echo "<style>
        .rounded-image {
            border-radius: 50%;
            width: 100px; /* Ajuste o tamanho conforme necessário */
            height: 100px; /* Ajuste o tamanho conforme necessário */
        }
      </style>";

                            echo "<img src='../../../img/logo.png' alt='Imagem do membro' class='rounded-image'><br>";
                            echo "<a href='ver_mais.php?login=" . $row['login_usuario'] . "'><button>Ver Mais</button><br><br></a>";
                        }
                    } else {
                        echo "Não foram encontradas fichas.";
                    }
                } else {
                    echo "Erro na consulta SQL: " . mysqli_error($bancoDeDados);
                }

                echo "<br>";
            }

            require_once("../../../conexao/conexao.php");
            $bancoDeDados = new BancodeDados();
            $bancoDeDados->conecta();

            // Exibir informações para cada parte do corpo
            exibirInformacoes("PERNA", "tbperna", $bancoDeDados);
            exibirInformacoes("PEITO", "tbpeito", $bancoDeDados);
            exibirInformacoes("ABDOMEN", "tbabdomen", $bancoDeDados);
            exibirInformacoes("ANTEBRAÇO", "tbantebraco", $bancoDeDados);
            exibirInformacoes("BICEPS", "tbbiceps", $bancoDeDados);
            exibirInformacoes("COSTAS", "tbcostas", $bancoDeDados);
            exibirInformacoes("OMBRO", "tbombro", $bancoDeDados);
            exibirInformacoes("TRAPEZIO", "tbtrapezio", $bancoDeDados);
            exibirInformacoes("TRICEPS", "tbtriceps", $bancoDeDados);

            echo "</div>";

            $bancoDeDados->fechar();
            ?>
        </div>
    </center>
    <script src="../../../js/menu.js"></script>
</body>

</html>