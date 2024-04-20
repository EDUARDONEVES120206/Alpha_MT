<html>
<head>
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/sb-admin-2.css">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <style>
    .imagem-redonda {
        border-radius: 50%;
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
    <li class="item-menu ativo">
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
        <br> <br>
<div class="row">

    <?php
    session_start();
    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";}

$servername = "localhost";
$username = "root";
$password = "prof@etec";
$dbname = "alpha";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$plano = $_SESSION['plano'];

$sql = "SELECT * FROM tbparceiro WHERE tipo = 'academia' AND plano = '$plano'";
$result = $conn->query($sql);

$academiasDoMesmoPlano = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $academiasDoMesmoPlano[] = $row;
    }
}

if (count($academiasDoMesmoPlano) > 0) {
    foreach ($academiasDoMesmoPlano as $academia) {
        $link_academia = $academia['login'];
        echo "<div class='col-xl-4 col-md-6 mb-4'>
        <div class='card border-left-info shadow h-100 py-2'>
            <div class='card-body'>
                <div class='row no-gutters align-items-center'>
                    <div class='col mr-2'>
                        <div class='text-xs font-weight-bold text-info text-uppercase mb-1'>
                        <a href='' class='text-xs font-weight-bold text-info text-uppercase mb-1'><h4><b> Academia: <font color='black'></b>" . $academia['nome'] . "</font></h4></a><br>";
                        echo "<h5><b>Telefone: </b><font color='black'>" . $academia['telefone'] . "</font><br>";
                        echo "<b>Email: </b><font color='black'> " . $academia['email'] . "</font><br>";
                        echo "<b>Cidade: </b><font color='black'> " . $academia['cidade'] . "</font><br>";
                        echo "<b>Bairro: </b><font color='black'> " . $academia['bairro'] . "</font><br>";
                        echo "<b>Rua: </b><font color='black'> " . $academia['rua'] . "</font><br>";
                        echo "<b>Numero: </b><font color='black'> " . $academia['numero'] . "</font><br>";
                        echo "<b>Cep:</b> <font color='black'>" . $academia['cep'] . "</font><br></h5></div>";
                        

        echo "<div class='row no-gutters align-items-center'>
            <div class='col-auto'>
                <div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'> 
                </div>
            </div>
        </div>
    </div>
    <div class='col-auto'>"; 

    $login = $academia['login'];
    $sql_imagem = "SELECT caminho FROM tbimagens_acad WHERE login = '$login'";
    $resultado_imagem = $conn->query($sql_imagem);
    


    if ($resultado_imagem->num_rows > 0) {
        $imagem = $resultado_imagem->fetch_assoc();
        $caminho_imagem = $imagem['caminho'];
        $caminho_modificado = str_replace("../../../", "../", $caminho_imagem);
        echo "<img src='$caminho_modificado' alt='Foto de perfil' class='img-fluid imagem-redonda' style='max-width: 100px;'>";
    } else {
        echo "<img src='../img/semfoto.png' alt='Foto de perfil' class='img-fluid imagem-redonda' style='max-width: 100px;'>";
    }

       echo"
    </div>
</div>
</div>
</div>
</div>";
    }
} else {
    echo "Nenhuma academia encontrada para este plano.";
}

$conn->close();
?>  


<script src="../js/menu.js"></script>
</body>
</html>