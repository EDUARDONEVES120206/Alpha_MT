<head>
<title>AlphaMT - Academia</title>
<link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
    <link href="../../../css/style19.css" rel="stylesheet">
    <link href="../../../css/style9.css" rel="stylesheet">
    <link href="../../../css/style4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<nav class="menu-lateral">

    <div class="btn-expandir">
        <i class="bi bi-list" id="btn-exp"></i>
    </div>

    <ul>

        <li class="item-menu">
            <a href="../home_academia.php">
                <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                <span class="txt-link">Inicio</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="../perfil/perfil_academia.php">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <span class="txt-link">Perfil</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="../equipamentos/cadastro_equipamento_academia.php">
                <span class="icon"><i class="fas fa-dumbbell"></i></span>
                <span class="txt-link">Equipamentos</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="../perfil/gerenciar_plano_academia.php">
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
            <a href="../../../fechar_sessao.php">
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
    header("Location: ../../../fechar_sessao.php");
    exit();
}
require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$nome = $_SESSION['nome'];

$sqlstring1 = "SELECT * FROM tbficha WHERE academia_selecionada = '$nome'  ORDER BY academia_selecionada";
$query1 = @mysqli_query($mysql->con, $sqlstring1);





echo "<br><h3><center> Pedidos de entrada na $nome:</center> </h3><br>";
echo "<table id='customers'>";
echo "<tr><th>Id da Entrada</th><th>Nome do Aluno</th><th>Login do Aluno</th><th>Plano</th><th>Nome da Academia</th><th>Data e Hora</th><th>Foto</th><th>Incluir</th><th>Deletar</th></tr>";

while ($dados1 = mysqli_fetch_array($query1)) {
    echo "<tr>";
    echo "<td>" . $dados1['id_pd'] . "</td>";
    echo "<td>" . $dados1['nome'] . "</td>";
    echo "<td>" . $dados1['login'] . "</td>";
    echo "<td><b>" . $dados1['plano'] . "</b></td>";
    echo "<td><b>" . $dados1['academia_selecionada'] . "</b></td>";
    echo "<td><b>" . $dados1['data_registro'] . "</b></td>";

   
    $sqlstring2 = "SELECT caminho FROM tbimagens_usuario WHERE login = '" . $dados1['login'] . "'";
    $resultado = $mysql->executaSQL($sqlstring2);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dadosImagem = mysqli_fetch_assoc($resultado);
        $caminho = "../../".$dadosImagem['caminho'];
        echo "<td><center><img src='$caminho' alt='Foto de perfil' class='img-fluid rounded-circle' style='max-width: 100px; border-radius: 50%;'></center></td>";
    } else {
        echo "<td><center><img src='../../../img/semfoto.png' alt='Foto de perfil' class='img-fluid-rounded-circle' style='max-width: 100px; border-radius: 50%;'></center></td>";
    }

    $id_pd = base64_encode($dados1['id_pd']);
    echo "<td><a href='incluir.php?id_pd=" . $dados1['id_pd'] . "&nome=" . $dados1['nome'] . "&login=" . $dados1['login'] . "&plano=" . $dados1['plano'] . "&academia_selecionada=" . $dados1['academia_selecionada'] . "&data_registro=" . $dados1['data_registro'] . "'>Incluir</a></td>";
    echo "<td><a href='excluir.php?id_pd=" . $dados1['id_pd'] . "&nome=" . $dados1['nome'] . "&login=" . $dados1['login'] . "&plano=" . $dados1['plano'] . "&academia_selecionada=" . $dados1['academia_selecionada'] . "&data_registro=" . $dados1['data_registro'] . "'>Excluir</a></td>";
    echo "</tr>";
}
echo "</table>";
$mysql->fechar();








?>
<br>
<a class="btn btn-second" href="../home_academia.php">Voltar</a><br>
</center>

<script src="../../../js/menu.js"></script>
</body>