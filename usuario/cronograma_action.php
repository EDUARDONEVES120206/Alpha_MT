
<html>

<head>
<?php
    session_start();

    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/style19.css">
    <link rel="stylesheet" href="../css/style7.css">
    <link rel="stylesheet" href="../css/style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>AlphaMT -  Usuário</title>
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

    <center>
        <br>
        <br>
        <div class="container">
        <h1>Calendário de Eventos</h1>
        <br>
        <?php

$academia = $_POST['teste'];
include('evento.php'); 
$sql = "SELECT id, titulo, descricao, data_inicio, data_fim FROM eventos WHERE cpf_cnpj <= '$academia'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id='customers'>";
    echo "<tr><th>Título do evento</th><th>Descrição</th><th>Data de Início</th><th>Data de Término</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['titulo']}</td>";
        echo "<td>{$row['descricao']}</td>";
        echo "<td>{$row['data_inicio']}</td>";
        echo "<td>{$row['data_fim']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo " <span  style='color: black;'>Nenhum evento encontrado.</span>";
}

$conn->close();



?>
<br>
<br>
<a class="btn btn-second" href="cronograma.php">Voltar</a>
    </div></center>
    <script src="../js/menu.js"></script>
</body>

</html>