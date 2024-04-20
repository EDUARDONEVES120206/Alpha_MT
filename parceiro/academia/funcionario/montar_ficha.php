<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #202020;
        }

        h4 {
            color: white;
        }

        h3 {
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
    <?php
    session_start();

    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
        exit;
    }

    require_once("../../../conexao/conexao.php");

    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();

    $login_usuario = $_SESSION['login_usuario'];
    $login_academia = $_SESSION['login_academia'];

    ?>
    <br>
    <center>
    <h3>Faça as Fichas</h3>
    <br>

    <a href="montar/ficha_perna.php"><button class="btn btn-third"> Perna</button></a><br><br>
    <a href="montar/ficha_peito.php"> <button class="btn btn-third">Peito</button></a> <br><br>
    <a href="montar/ficha_biceps.php"><button class="btn btn-third">Biceps</button></a> <br><br>
    <a href="montar/ficha_ombro.php"> <button class="btn btn-third">Ombro</button></a> <br><br>
    <a href="montar/ficha_costas.php"><button class="btn btn-third">Costas</button></a><br><br>
    <a href="montar/ficha_triceps.php"> <button class="btn btn-third">Triceps</button></a><br><br>
    <a href="montar/ficha_trapezio.php"><button class="btn btn-third">Trapézio</button></a><br><br>
    <a href="montar/ficha_antebraco.php"> <button class="btn btn-third">Antebraço</button></a><br><br>
    <a href="montar/ficha_abdomen.php"> <button class="btn btn-third">Abdomen</button></a><br><br>
<br>

<button class="btn btn-third"> <a href="finalizar_ficha.php">Enviar</a></button>
<a class='nav-link' href='javascript:history.go(-1)'><button class="btn btn-third">Voltar</button></a>
</center>
</body>
<script src="../js/menu.js"></script>
</html>