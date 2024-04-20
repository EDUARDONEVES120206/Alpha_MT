<!DOCTYPE html>
<html>
<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
    <link href="../../../css/style19.css" rel="stylesheet">
    <link href="../../../css/style9.css" rel="stylesheet">
    <link href="../../../css/style11.css" rel="stylesheet">
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
<center><br>
<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
}
?>

<?php
require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$nome = $_SESSION['nome']; 

if (isset($_GET['id_pd'])) {
    $id_pd = $_GET['id_pd'];

    // Verifica se o ID é válido (pode adicionar mais validações, se necessário)
    if (!is_numeric($id_pd)) {
        echo "ID inválido.";
    } else {
        // Consulta para obter os dados do aluno com base no ID
        $sqlstring = "SELECT * FROM tbfichaof WHERE id_pd = $id_pd";
        $query = @mysqli_query($mysql->con, $sqlstring);
        
        // Verifica se o aluno existe
        if (mysqli_num_rows($query) > 0) {
            // Exibe os dados do aluno para confirmação
            $dados = mysqli_fetch_array($query);
            echo "<div class='container'>";
            echo "<br><h3><center> Você tem certeza de que deseja excluir o aluno: </h3><br>";
            
            
            echo "<b>ID:</b> " . $dados['id_pd'] . "<br>";
            echo "<b>Nome:</b> " . $dados['nome'] . "<br>";
            echo "<b>Login:</b> " . $dados['login2'] . "<br>";
            echo "<b>Plano:</b> " . $dados['plano'] . "<br>";
            echo "<b>Data e Hora:</b> " . $dados['data_hora'] . "<br>";

            // Formulário para confirmar a exclusão
            echo "<form action='apagar_aluno_confirm.php' method='post'>";
            echo "<input type='hidden' name='id_pd' value='$id_pd'>";
            echo "<input type='submit' class='btn btn-second' name='confirmar' value='Excluir'>";
            echo "</form>";

            echo "<br>";
            echo"<a class='btn btn-second' href='../home_academia.php'>Voltar</a>";
            echo "</div><br>";
        } else {
            echo "Aluno não encontrado.";
            echo"<a class='btn btn-second' href='../home_academia.php'>Voltar</a>";
        }
    }
}

$mysql->fechar();
?>
<br>

</center>

</body>
</html>
