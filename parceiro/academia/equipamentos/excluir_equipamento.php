<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}

$host = "localhost";
$user = "root";
$senha = "prof@etec";
$banco = "alpha";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Perform the DELETE operation
    $sql = "DELETE FROM tbequipamento WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $resultado = mysqli_stmt_execute($stmt);
        
        if ($resultado) {
            echo "<script>alert('Equipamento excluído com sucesso!');window.location.href='cadastro_equipamento_academia.php';</script>";
        } else {
            echo "<script>alert('Erro ao excluir equipamento: " . mysqli_error($conexao) . "');window.location.href='cadastro_equipamento_academia.php';</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro ao preparar a instrução SQL.');window.location.href='cadastro_equipamento_academia.php';</script>";
    }
} else {
    echo "<script>alert('Requisição inválida.');window.location.href='cadastro_equipamento_academia.php';</script>";
}

mysqli_close($conexao);
?>
