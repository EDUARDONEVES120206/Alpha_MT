<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - Funcionario</title>
    <link rel="shortcut icon" type="image/png" href="../../../../img/logobranco.png">
</head>

<body>
    <?php
    session_start();

    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
        exit;
    }

    require_once("../../../../conexao/conexao.php");
    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();

    $login_usuario = $_SESSION['login_usuario'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
        $sql = "DELETE FROM tbtriceps WHERE login_usuario = '$login_usuario'";
        
        if ($bancoDeDados->executaSQL($sql)) {
            echo "<script language='javascript' type='text/javascript'>alert('Ficha de treino para triceps excluída com sucesso.');window.location.href='../ficha_cadastradas.php';</script>";
        } else {
            echo "Erro ao excluir a ficha de treino: " . mysqli_error($bancoDeDados->con);
        }
    }
    ?>

    <h1>Excluir Ficha de Treino para Triceps</h1>
    
    <form action="excluir_ficha_triceps.php" method="POST">
        <p>Você tem certeza de que deseja excluir a ficha de treino para triceps?</p>
        <input type="submit" name="excluir" value="Sim, Excluir">
        <a href="../ficha_cadastradas.php">Não, Voltar</a>
    </form>
    
</body>

</html>
