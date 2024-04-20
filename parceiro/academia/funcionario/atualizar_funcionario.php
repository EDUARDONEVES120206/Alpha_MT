<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nome'], $_POST['login'], $_POST['email'], $_POST['numero'], $_POST['senha'], $_POST['palavra_chave'])) {
    $funcionarioId = $_POST['id'];
    $nomeFuncionario = $_POST['nome'];
    $loginFuncionario = $_POST['login'];
    $senhaFuncionario = $_POST['senha'];
    $emailFuncionario = $_POST['email'];
    $numeroFuncionario = $_POST['numero'];
    $palavra_chaveFuncionario = $_POST['palavra_chave'];

    
    $nome_academia = $_SESSION['nome'];
    $sqlstring = "SELECT * FROM tbfuncionario WHERE id = ? AND academia = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    mysqli_stmt_bind_param($stmt, "is", $funcionarioId, $nome_academia);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {
        
        $sqlstring = "SELECT id FROM tbfuncionario WHERE login = ? AND id <> ?";
        $stmt = mysqli_prepare($mysql->con, $sqlstring);
        mysqli_stmt_bind_param($stmt, "si", $loginFuncionario, $funcionarioId);
        mysqli_stmt_execute($stmt);
        $resultadoLogin = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        if ($resultadoLogin && mysqli_fetch_assoc($resultadoLogin)) {
            echo "<script language='javascript' type='text/javascript'>alert('O login $loginFuncionario já está em uso. Escolha outro login.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
        } else {
            // Atualizar as informações do funcionário
            $sqlstring = "UPDATE tbfuncionario SET nome = ?, login = ?, senha = ?, email = ?, numero = ?, palavra_chave = ? WHERE id = ?";
            $stmt = mysqli_prepare($mysql->con, $sqlstring);
            mysqli_stmt_bind_param($stmt, "ssssssi", $nomeFuncionario, $loginFuncionario, $senhaFuncionario, $emailFuncionario, $numeroFuncionario, $palavra_chaveFuncionario, $funcionarioId);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                echo "<script language='javascript' type='text/javascript'>alert('Informações do funcionário atualizadas com sucesso!');window.location.href='gerenciar_funcionarios_academia.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar as informações do funcionário. Por favor, tente novamente.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
            }
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Funcionário não encontrado ou você não tem permissão para atualizá-lo.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
    }
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Preencha o formulário completo.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
}
$mysql->fechar();
?>
