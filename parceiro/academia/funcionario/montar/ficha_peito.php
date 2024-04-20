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
    <h1>Montar Ficha de Treino para Peito</h1>
    <?php
    session_start();

    require_once("../../../../conexao/conexao.php");
    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();
    
    $login_usuario = $_SESSION['login_usuario'];
    $sql1 = "SELECT login_usuario FROM tbpeito WHERE login_usuario = '$login_usuario'";
    
    $result = $bancoDeDados->executaSQL($sql1);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<h6> Esse usuario ja tem uma ficha de treino para peito cadastrado. Para excluir aperte ";
        echo "<a href='excluir_ficha_peito.php'>aqui!</a></h6>";
    } else {
        echo "<h6>Esse usuario não possui ficha de treino para peito cadastrado.</h6>";
    }
    
    $bancoDeDados->fechar();
    


    

    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
        exit;
    }
    ?>
    

    <form action="salvar_ficha_peito.php" method="POST">
        <h2>Exercício 1:</h2>
        <label for="exercicio1">Nome do Exercício:</label>
        <input type="text" name="exercicio1" id="exercicio1" placeholder="Nome do exercício 1">
        <br>
        <label for="series1">Séries:</label>
        <input type="number" name="series1" id="series1">
        <br>
        <label for="repeticoes1">Repetições:</label>
        <input type="number" name="repeticoes1" id="repeticoes1">
        <hr>

        <h2>Exercício 2:</h2>
        <label for="exercicio2">Nome do Exercício:</label>
        <input type="text" name="exercicio2" id="exercicio2" placeholder="Nome do exercício 2">
        <br>
        <label for="series2">Séries:</label>
        <input type="number" name="series2" id="series2">
        <br>
        <label for="repeticoes2">Repetições:</label>
        <input type="number" name="repeticoes2" id="repeticoes2">
        <hr>

        <h2>Exercício 3:</h2>
        <label for="exercicio3">Nome do Exercício:</label>
        <input type="text" name="exercicio3" id="exercicio3" placeholder="Nome do exercício 3">
        <br>
        <label for="series3">Séries:</label>
        <input type="number" name="series3" id="series3">
        <br>
        <label for="repeticoes3">Repetições:</label>
        <input type="number" name="repeticoes3" id="repeticoes3">
        <hr>

        <h2>Exercício 4:</h2>
        <label for="exercicio4">Nome do Exercício:</label>
        <input type="text" name="exercicio4" id="exercicio4" placeholder="Nome do exercício 4">
        <br>
        <label for="series4">Séries:</label>
        <input type="number" name="series4" id="series4">
        <br>
        <label for="repeticoes4">Repetições:</label>
        <input type="number" name="repeticoes4" id="repeticoes4">
        <hr>

        <h2>Exercício 5:</h2>
        <label for="exercicio5">Nome do Exercício:</label>
        <input type="text" name="exercicio5" id="exercicio5" placeholder="Nome do exercício 5">
        <br>
        <label for="series5">Séries:</label>
        <input type="number" name="series5" id="series5">
        <br>
        <label for="repeticoes5">Repetições:</label>
        <input type="number" name="repeticoes5" id="repeticoes5">
        <hr>

        <h2>Exercício 6:</h2>
        <label for="exercicio6">Nome do Exercício:</label>
        <input type="text" name="exercicio6" id="exercicio6" placeholder="Nome do exercício 6">
        <br>
        <label for="series6">Séries:</label>
        <input type="number" name="series6" id="series6">
        <br>
        <label for="repeticoes6">Repetições:</label>
        <input type="number" name="repeticoes6" id="repeticoes6">
        <hr>

        <h2>Exercício 7:</h2>
        <label for="exercicio7">Nome do Exercício:</label>
        <input type="text" name="exercicio7" id="exercicio7" placeholder="Nome do exercício 7">
        <br>
        <label for="series7">Séries:</label>
        <input type="number" name="series7" id="series7">
        <br>
        <label for="repeticoes7">Repetições:</label>
        <input type="number" name="repeticoes7" id="repeticoes7">
        <hr>

        <h2>Exercício 8:</h2>
        <label for="exercicio8">Nome do Exercício:</label>
        <input type="text" name="exercicio8" id="exercicio8" placeholder="Nome do exercício 8">
        <br>
        <label for="series8">Séries:</label>
        <input type="number" name="series8" id="series8">
        <br>
        <label for="repeticoes8">Repetições:</label>
        <input type="number" name="repeticoes8" id="repeticoes8">
        <hr>
        <h2>Observação:</h2>
        <label for="observacao">Observação:</label>
        <input type="text" name="observacao" id="observacao" placeholder="Observação">
        <br>

        <br>
        <input type="submit" value="Salvar Ficha de Treino">
    </form>

    <br>
    <a href="../montar_ficha.php">Voltar</a>
</body>

</html>