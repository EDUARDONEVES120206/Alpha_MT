<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../../../../css/Style5.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #202020;
        }

        h6 {
            color: white;
        }
        h5 {
            color: white;
        }

        h4 {
            color: white;
        }

        h3 {
            color: white;

        }

        h2 {
            color: white;
        }

        h1 {
            color: white;

        }
        p{
            color: white;
        }

        input[type='submit'] {
            background-color: #870101FF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        /* Estilize o botão de envio quando o mouse passar sobre ele */
        input[type='submit']:hover {
            background-color: #870101FF;
        }

        #column {
            position: absolute;
            left: 28%;
            width: 100vh;
            height: 100vh;
            justify-content: center;
            text-align: center;
            background-color: #0e0e0e;
        }

        input[type='datetime-local'],
        input[type='number'],
        input[type='text'],
        select,
        textarea {
            width: 50%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #333;
            color: white;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: white;
        }
    </style>

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
                <a href="../gerenciar_fichas.php">
                    <span class="icon"><i class="bi bi-clipboard"></i></span>
                    <span class="txt-link">Fichas</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../gerenciar_fichas_cadastradas.php">
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
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
        exit;
    }

    require_once("../../../../conexao/conexao.php");
    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();

    $login_usuario = $_SESSION['login_usuario'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
        $sql = "DELETE FROM tbcostas WHERE login_usuario = '$login_usuario'";
        
        if ($bancoDeDados->executaSQL($sql)) {
            echo "<script language='javascript' type='text/javascript'>alert('Ficha de treino para costas excluída com sucesso.');window.location.href='ficha_costas';</script>";
        } else {
            echo "Erro ao excluir a ficha de treino: " . mysqli_error($bancoDeDados->con);
        }
    }
    ?>

    <h1>Excluir Ficha de Treino para Costas</h1>
    
    <form action="excluir_ficha_costas.php" method="POST">
        <p>Você tem certeza de que deseja excluir a ficha de treino para costas?</p>
        <input type="submit" name="excluir" value="Sim, Excluir">
        <a href="ficha_costas.php">Não, Voltar</a>
    </form>
    
</body>

</html>
