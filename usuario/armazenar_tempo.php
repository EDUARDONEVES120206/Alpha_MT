<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/png" href="../img/logobranco.png">
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="../css/Style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
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
</head>

<body>

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
                <li class="item-menu">
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
                        <span class="txt-link">Configurações</span>
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tempo = $_POST["tempo"];

            include('conectar.php');
            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }
            if (isset($_SESSION['login'])) {
                $login = $_SESSION['login'];

                $sql = "INSERT INTO tbcardio (login, tempo, data_hora) VALUES (?, ?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $login, $tempo);

                if ($stmt->execute()) {
                    echo " <center>";
                    echo " <div id='column'>";
                    echo "<br><br><br>";
                    echo " <marquee behavior='scroll' direction='left' >";
                    echo "  <font size='6' color='#00EFC3'>SEU TEMPO FOI ARMAZENADO COM SUCESSO ($tempo Segundos)</font>";
                    echo " </marquee>";
                    echo " <img src='../img/checkmark-unscreen.gif' width='700' height='500' alt=''>";
                    echo " <center><a class='btn btn-four' href='cardio.php'>Voltar</a></center>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "Erro ao armazenar o tempo no banco de dados: " . $conn->error;
                }

                $stmt->close();
            } else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Ops, algo não esta certo, entre novamente!!');
                window.location.href='../fechar_sessao.php';</script>";
            }

            $conn->close();
        }
        ?>

    </body>

</html>