<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #202020;
        }

        h4 {
            color: white;
        }

        h5 {
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
    <div class="texto-produto">
        <?php
        session_start();

        if ($_SESSION['log'] != "ativo") {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
            exit;
        }

        require_once("../../../conexao/conexao.php");

        $bancoDeDados = new BancodeDados();
        $bancoDeDados->conecta();

        $_SESSION['login_usuario'] = $_GET['login'];

        $sql = "SELECT * FROM tbperguntasficha WHERE login = '" . $_GET['login'] . "'";
        $resultado = $bancoDeDados->executaSQL($sql);

        if ($row = mysqli_fetch_assoc($resultado)) {
            echo "<div data-spy='scroll' data-target='#navbar-exemplo2' data-offset='0'>";
            echo "<h4 id='mdo'>";
            echo " <left> <br>Login: " . $row['login'] . "<br>";
            echo "CPF: " . $row['cpf'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Numero: " . $row['numero'] . "<br>";
            echo "Data: " . $row['data'] . "<br>";
            echo "Sexo: " . $row['sexo'] . "<br>";
            echo "Altura: " . $row['altura'] . "<br>";
            echo "Peso: " . $row['peso'] . "<br>";

            echo "</h4>";
            echo "<p>...</p>";
            echo "<h5 id='um'>";
            echo "Qual é o seu objetivo principal ao participar da academia? (ex: perda de peso, ganho de massa muscular, condicionamento físico etc.): <br>" . $row['objetivo'] . "<br>";
            echo "<br>";
            echo "Você possui alguma restrição médica? (ex: problemas cardíacos, lesões, asma, diabetes etc.):<br> " . $row['restricao'] . "<br>";
            echo "<br>";
            echo "Você está tomando algum medicamento atualmente? Se sim, por favor, liste-os.: <br>" . $row['medicamento'] . "<br>";
            echo "<br>";
            echo "</h5>";
            echo "<h5 id='dois'>";
            echo "Qual é o seu objetivo principal ao participar da academia? (ex: perda de peso, ganho de massa muscular, condicionamento físico etc.): <br>" . $row['objetivo'] . "<br>";
            echo "<br>";
            echo "Você possui alguma restrição médica? (ex: problemas cardíacos, lesões, asma, diabetes etc.): <br>" . $row['restricao'] . "<br>";
            echo "<br>";
            echo "Você está tomando algum medicamento atualmente? Se sim, por favor, liste-os.: <br>" . $row['medicamento'] . "<br>";
            echo "<br>";
            echo "Você já teve alguma experiência anterior com atividades físicas ou musculação? Se sim, descreva: <br>" . $row['experiencia'] . "<br>";
            echo "<br>";
            echo "Com que frequência você pretende treinar na academia? (ex: 3 vezes por semana, todos os dias): <br>" . $row['frequencia'] . "<br>";
            echo "<br>";
            echo "Qual é o horário preferido para treinar?: <br>" . $row['tempo'] . "<br>";
            echo "<br>";
            echo "</h5>";
            echo "<p>...</p>";
            echo "<h5 id='tres'>";
            echo "Quais são os dias da semana que você está disponível para treinar?: <br>" . $row['dia'] . "<br>";
            echo "<br>";
            echo "Você tem alguma preferência por treinamento específico, como treinamento funcional, musculação, cárdio etc?: <br>" . $row['treinamento'] . "<br>";
            echo "<br>";
            echo "Você tem alguma alergia alimentar ou restrição dietética que o profissional de educação física deve estar ciente?: <br>" . $row['alergia'] . "<br>";
            echo "<br>";
            echo "Há algo mais que você gostaria de compartilhar ou discutir com o profissional de educação física para que ele possa criar uma ficha de treino personalizada para você?: <br>" . $row['extra'] . "<br>";
            echo "<br>";
            echo "</h5>";
            echo "<p>...</p>";
            echo "</div>";
        }

        $bancoDeDados->fechar();
        ?>
        <br><br>
        <center>
            <a href="montar_ficha.php"><button class="btn btn-third">Realizar Ficha</button></a>

            <a href="ficha_cadastradas.php">
                <button class="btn btn-third">Fichas
                    Cadastradas</button></a>

            <a href="home.php"> <button href="home.php"
                    class="btn btn-third">Voltar</button></a>

        </center>
        <br><br><br><br>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

</html>