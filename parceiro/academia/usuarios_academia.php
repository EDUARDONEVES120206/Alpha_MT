<html>
<head>
    <title>AlphaMT - Academia</title>
    <link href="../../css/style19.css" rel="stylesheet">
    <link href="../../css/style9.css" rel="stylesheet">
    <link href="../../css/style4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>

            <li class="item-menu">
                <a href="home_academia.php">
                    <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="perfil/perfil_academia.php">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Perfil</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="equipamentos/cadastro_equipamento_academia.php">
                    <span class="icon"><i class="fas fa-dumbbell"></i></span>
                    <span class="txt-link">Equipamentos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="perfil/gerenciar_plano_academia.php">
                    <span class="icon"><i class="bi bi-folder"></i></span>
                    <span class="txt-link">Plano</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Suporte</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../../fechar_sessao.php">
                    <span class="icon"><i class="bi bi-door-open"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>

        </ul>

    </nav>
    <center>

    <?php
    session_start();

    if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'ativo') {
        header("Location: ../../fechar_sessao.php");
        exit();
    }
    require_once('../../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();


    $plano = $_SESSION['plano'];



    $sqlstring1 = "SELECT * FROM tbusuario WHERE plano = '$plano'  ORDER BY plano";
    $query1 = @mysqli_query($mysql->con, $sqlstring1);

    echo "<br><h3><center> Usuarios do plano $plano: </center> </h3>";
    echo "<table id='customers'>";
    echo "<br><tr><th>Nome do Aluno</th><th>Login do Aluno</th><th>Plano</th><th>Email</th><th>Numero</th><th>Foto</th></tr><br>";

    while ($dados1 = mysqli_fetch_array($query1)) {
        echo "<tr>";
        echo "<td>" . $dados1['nome'] . "</td>";
        echo "<td>" . $dados1['login'] . "</td>";
        echo "<td><b>" . $dados1['plano'] . "</b></td>";
        echo "<td><b>" . $dados1['email'] . "</b></td>";
        echo "<td><b>" . $dados1['numero'] . "</b></td>";
        $sqlstring2 = "SELECT caminho FROM tbimagens_usuario WHERE login = '" . $dados1['login'] . "'";
        $resultado = $mysql->executaSQL($sqlstring2);
    
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $dadosImagem = mysqli_fetch_assoc($resultado);
            $caminho = "../" . $dadosImagem['caminho'];
            echo "<td><center><img src='$caminho' alt='Foto de perfil' class='img-fluid rounded-circle' style='max-width: 100px; border-radius: 50%;'></center></td>";
        } else {
            echo "<td><center><img src='../../img/semfoto.png' alt='Foto de perfil' class='img-fluid rounded-circle' style='max-width: 100px; border-radius: 50%;'></center></td>";
        }
        echo "</tr>";

    }
    echo "</table></center>";
    $mysql->fechar();








    ?>
     
     <br>
     <center>
<a class="btn btn-second" href="home_academia.php">Voltar</a></center><br>
</center>
<script src="../../js/menu.js"></script>
</body>
</html>