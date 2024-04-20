<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $funcionarioId = $_GET['id'];

    // Verificar se o funcionário pertence à academia do usuário logado para garantir a autorização adequada
    $nome_academia = $_SESSION['nome'];
    $sqlstring = "SELECT * FROM tbfuncionario WHERE id = ? AND academia = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    mysqli_stmt_bind_param($stmt, "is", $funcionarioId, $nome_academia);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {
        // Excluir o funcionário
        $sqlstring = "DELETE FROM tbfuncionario WHERE id = ?";
        $stmt = mysqli_prepare($mysql->con, $sqlstring);
        mysqli_stmt_bind_param($stmt, "i", $funcionarioId);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($result) {
            echo "<script language='javascript' type='text/javascript'>alert('Funcionário excluído com sucesso!');window.location.href='gerenciar_funcionarios_academia.php';</script>";
        } else {
            echo "Erro ao excluir o funcionário. Por favor, tente novamente.";
        }
    } else {
        echo "Funcionário não encontrado ou você não tem permissão para excluí-lo.";
    }
} else {
    echo "Parâmetros inválidos.";
}
$mysql->fechar();
?>
