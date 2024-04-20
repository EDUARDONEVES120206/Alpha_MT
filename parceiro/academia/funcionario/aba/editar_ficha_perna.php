<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
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
        <h1>Editar Ficha de Treino para Pernas</h1>
<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['login_usuario'])) {
    $logUsu = $_GET['login_usuario'];

    $sqlstring = "SELECT * FROM tbperna WHERE login_usuario = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    mysqli_stmt_bind_param($stmt, "s", $logUsu);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {
        ?>
        <h2>Editar ficha de Perna:</h2>
        <form action='atualizar_ficha_perna.php' method='POST'>
            <input type='hidden' name='login_usuario' value='<?php echo $dados['login_usuario']; ?>'>
            <label for='exercicio1'>Exercicio 1:</label>
            <input type="text" name="exercicio1" value="<?php echo $dados['exercicio1']; ?>"><br>
            <label for='series1'>Series 1:</label>
            <input type="text" name="series1" value="<?php echo $dados['series1']; ?>"><br>
            <label for='repeticoes1'>Repetições 1:</label>
            <input type="text" name="repeticoes1" value="<?php echo $dados['repeticoes1']; ?>"><br><br>

            <label for='exercicio2'>Exercicio 2:</label>
            <input type="text" name="exercicio2" value="<?php echo $dados['exercicio2']; ?>"><br>
            <label for='series2'>Series 2:</label>
            <input type="text" name="series2" value="<?php echo $dados['series2']; ?>"><br>
            <label for='repeticoes2'>Repetições 2:</label>
            <input type="text" name="repeticoes2" value="<?php echo $dados['repeticoes2']; ?>"><br><br>

            <label for='exercicio3'>Exercicio 3:</label>
            <input type="text" name="exercicio3" value="<?php echo $dados['exercicio3']; ?>"><br>
            <label for='series3'>Series 3:</label>
            <input type="text" name="series3" value="<?php echo $dados['series3']; ?>"><br>
            <label for='repeticoes3'>Repetições 3:</label>
            <input type="text" name="repeticoes3" value="<?php echo $dados['repeticoes3']; ?>"><br><br>

            <label for='exercicio4'>Exercicio 4:</label>
            <input type="text" name="exercicio4" value="<?php echo $dados['exercicio4']; ?>"><br>
            <label for='series4'>Series 4:</label>
            <input type="text" name="series4" value="<?php echo $dados['series4']; ?>"><br>
            <label for='repeticoes4'>Repetições 4:</label>
            <input type="text" name="repeticoes4" value="<?php echo $dados['repeticoes4']; ?>"><br><br>

            <label for='exercicio5'>Exercicio 5:</label>
            <input type="text" name="exercicio5" value="<?php echo $dados['exercicio5']; ?>"><br>
            <label for='series5'>Series 5:</label>
            <input type="text" name="series5" value="<?php echo $dados['series5']; ?>"><br>
            <label for='repeticoes5'>Repetições 5:</label>
            <input type="text" name="repeticoes5" value="<?php echo $dados['repeticoes5']; ?>"><br><br>

            <label for='exercicio6'>Exercicio 6:</label>
            <input type="text" name="exercicio6" value="<?php echo $dados['exercicio6']; ?>"><br>
            <label for='series6'>Series 6:</label>
            <input type="text" name="series6" value="<?php echo $dados['series6']; ?>"><br>
            <label for='repeticoes6'>Repetições 6:</label>
            <input type="text" name="repeticoes6" value="<?php echo $dados['repeticoes6']; ?>"><br><br>

            <label for='exercicio7'>Exercicio 7:</label>
            <input type="text" name="exercicio7" value="<?php echo $dados['exercicio7']; ?>"><br>
            <label for='series7'>Series 7:</label>
            <input type="text" name="series7" value="<?php echo $dados['series7']; ?>"><br>
            <label for='repeticoes7'>Repetições 7:</label>
            <input type="text" name="repeticoes7" value="<?php echo $dados['repeticoes7']; ?>"><br><br>

            <label for='exercicio8'>Exercicio 8:</label>
            <input type="text" name="exercicio8" value="<?php echo $dados['exercicio8']; ?>"><br>
            <label for='series8'>Series 8:</label>
            <input type="text" name="series8" value="<?php echo $dados['series8']; ?>"><br>
            <label for='repeticoes8'>Repetições 8:</label>
            <input type="text" name="repeticoes8" value="<?php echo $dados['repeticoes8']; ?>"><br><br>

            <label for='observacao'>Observação:</label>
            <input type="text" name="observacao" value="<?php echo $dados['observacao']; ?>"><br><br>


            <input type="submit" value="Atualizar">
        </form>
        <?php
    }
}

$mysql->fechar();
?>
        <br>
        <a href="../ficha_cadastradas.php">Voltar</a>
</body>
<script src="../js/menu.js"></script>

</html>
