<?php
    session_start();

    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
        exit;
    }

    require_once("../conexao/conexao.php");
    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();

    $cpf = $_SESSION['cpf'];

    // Check if the connection was successful
    if ($bancoDeDados->con) {
        // Prepare the statement
        $sqlstring = "SELECT * FROM tbperguntasficha WHERE cpf = ? ";
        $stmt = mysqli_prepare($bancoDeDados->con, $sqlstring);
        mysqli_stmt_bind_param($stmt, "s", $cpf);
        mysqli_stmt_execute($stmt);

        // Get the result
        $resultado = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {
            // Prepare and execute the delete statement
            $sqlstring = "DELETE FROM tbperguntasficha WHERE cpf = ?";
            $stmt = mysqli_prepare($bancoDeDados->con, $sqlstring);
            mysqli_stmt_bind_param($stmt, "s", $cpf);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                echo "<script language='javascript' type='text/javascript'>alert('Pedido excluído com sucesso!');window.location.href='pedido_ficha.php';</script>";
            } else {
                echo "Erro ao excluir o pedido. Por favor, tente novamente.";
            }
        } else {
            echo "Pedido não encontrado ou você não tem permissão para excluí-lo.";
        }
    } else {
        echo "Erro na conexão com o banco de dados.";
    }

    $bancoDeDados->fechar();
?>
