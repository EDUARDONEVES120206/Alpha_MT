<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="../css/Style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="item-menu ativo">
                <a href="#">
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
                    <span class="txt-link">Suporte</span>
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
    <div id="column">
<?php
session_start();

if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'ativo') {
    header("Location: ../fechar_sessao.php");
    exit();
}

include('conectar.php');

if (mysqli_connect_errno()) {
    echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
    exit();
}

$academiaSelecionada = $_POST["academia"];

if (empty($academiaSelecionada)) {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, parece que tem campo em branco. Tente novamente!');window.location.href='fichat.php'</script>";
} else {
    $nome = $_SESSION['nome']; 
    $sql = "SELECT * FROM tbusuario WHERE login = '$nome'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        $dadosUsuario = mysqli_fetch_assoc($resultado);

        $login = $_SESSION['login'];
        $nivel = $_SESSION['nivel'];
        $plano = $_SESSION['plano'];
        $dataRegistro = date('Y-m-d H:i:s');




        echo "<br><br><br><br><br><br><h2 style='color: white; text-align: left; margin-left: 150px;'>";
        echo "Nome: $nome<br><br>";
        echo "Login: $login<br><br>";
        echo "Nível: $nivel<br><br>";
        echo "Plano: $plano<br><br>";
        echo "Academia Selecionada: $academiaSelecionada<br><br>";
        echo "Data de Registro: $dataRegistro<br>";

        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $sqlstring = "INSERT INTO tbficha (nome, login, nivel, plano, academia_selecionada, data_registro) VALUES ('$nome', '$login', '$nivel', '$plano', '$academiaSelecionada', '$dataRegistro')";
        $query = @mysqli_query($mysql->con, $sqlstring);

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>alert('Cadastro efetuado com sucesso!')</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, não foi possível cadastrar');window.location.href='#'</script>";
        }

        // Você pode executar qualquer lógica adicional aqui, como salvar essas informações em um banco de dados ou fazer outras verificações.

    } else {
        echo "Erro na consulta: " . mysqli_error($conn);


    }
}

echo "<br> <br><a class='btn btn-second' href='fichat.php'>Voltar</a></h2>";
?>
</div>

<script src="../js/menu.js"></script>
