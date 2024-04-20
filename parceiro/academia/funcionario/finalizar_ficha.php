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

    require_once("../../../conexao/conexao.php");

    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();


        $login_usuario = $_SESSION['login_usuario'];

        $sql = "DELETE FROM tbperguntasficha WHERE login=?";
        $stmt = $bancoDeDados->con->prepare($sql);
        $stmt->bind_param("i", $login_usuario);

        if ($stmt->execute()) {
            echo "Registro excluído com sucesso.";
        } else {
            echo "Erro ao excluir registro: " . $stmt->error;
        }

        $stmt->close();


    $bancoDeDados->fechar();
    ?>
    <a href="gerenciar_fichas.php">Voltar</a>
</body>

</html>