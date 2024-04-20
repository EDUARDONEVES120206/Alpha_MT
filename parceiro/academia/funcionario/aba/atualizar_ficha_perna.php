<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../../../../../css/Style5.css">
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
            height: auto;
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
                <a href="../home.php">
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
    <h1>Atualizar Ficha de Treino Perna</h1>

<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$exercicio1 = $series1 = $repeticoes1 = $exercicio2 = $series2 = $repeticoes2 = $exercicio3 = $series3 = $repeticoes3 = $exercicio4 = $series4 = $repeticoes4 = $exercicio5 = $series5 = $repeticoes5 = $exercicio6 = $series6 = $repeticoes6 = $exercicio7 = $series7 = $repeticoes7 = $exercicio8 = $series8 = $repeticoes8 = $observacao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_usuario'])) {
    $logUsu = $_POST['login_usuario'];
    $exercicio1 = $_POST['exercicio1'];
    $series1 = $_POST['series1'];
    $repeticoes1 = $_POST['repeticoes1'];
    $exercicio2 = $_POST['exercicio2'];
    $series2 = $_POST['series2'];
    $repeticoes2 = $_POST['repeticoes2'];
    $exercicio3 = $_POST['exercicio3'];
    $series3 = $_POST['series3'];
    $repeticoes3 = $_POST['repeticoes3'];
    $exercicio4 = $_POST['exercicio4'];
    $series4 = $_POST['series4'];
    $repeticoes4 = $_POST['repeticoes4'];
    $exercicio5 = $_POST['exercicio5'];
    $series5 = $_POST['series5'];
    $repeticoes5 = $_POST['repeticoes5'];
    $exercicio6 = $_POST['exercicio6'];
    $series6 = $_POST['series6'];
    $repeticoes6 = $_POST['repeticoes6'];
    $exercicio7 = $_POST['exercicio7'];
    $series7 = $_POST['series7'];
    $repeticoes7 = $_POST['repeticoes7'];
    $exercicio8 = $_POST['exercicio8'];
    $series8 = $_POST['series8'];
    $repeticoes8 = $_POST['repeticoes8'];
    $observacao = $_POST['observacao'];
    $nome_personal = $_SESSION['nome'];
    $telefone_personal = $_SESSION['numero'];
    $email_personal = $_SESSION['email'];

    $sqlstring = "UPDATE tbperna SET 
                    nome_personal = ?,
                    telefone_personal = ?,
                    email_personal = ?,
                    exercicio1 = ?,
                    series1 = ?,
                    repeticoes1 = ?,
                    exercicio2 = ?,
                    series2 = ?,
                    repeticoes2 = ?,
                    exercicio3 = ?,
                    series3 = ?,
                    repeticoes3 = ?,
                    exercicio4 = ?,
                    series4 = ?,
                    repeticoes4 = ?,
                    exercicio5 = ?,
                    series5 = ?,
                    repeticoes5 = ?,
                    exercicio6 = ?,
                    series6 = ?,
                    repeticoes6 = ?,
                    exercicio7 = ?,
                    series7 = ?,
                    repeticoes7 = ?,
                    exercicio8 = ?,
                    series8 = ?,
                    repeticoes8 = ?,
                    observacao = ?
                WHERE login_usuario = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssss", 
            $nome_personal, $telefone_personal, $email_personal, 
            $exercicio1, $series1, $repeticoes1,
            $exercicio2, $series2, $repeticoes2,
            $exercicio3, $series3, $repeticoes3,
            $exercicio4, $series4, $repeticoes4,
            $exercicio5, $series5, $repeticoes5,
            $exercicio6, $series6, $repeticoes6,
            $exercicio7, $series7, $repeticoes7,
            $exercicio8, $series8, $repeticoes8,
            $observacao, $logUsu
        );
    
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        header("Location: editar_ficha_perna.php?login_usuario=$logUsu");
        exit;
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($mysql->con);
    }
}

$mysql->fechar();
?>

<br>
        <a href="../montar_ficha.php">Voltar</a>
</body>
<script src="../js/menu.js"></script>

</html>