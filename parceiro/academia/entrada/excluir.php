<!DOCTYPE html>
<html>
<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
</head>
<body>
<?php
session_start();

if ($_SESSION['log'] !== "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

$id_pd = isset($_GET['id_pd']) ? $_GET['id_pd'] : '';

if (empty($id_pd)) {
    echo "<script language='javascript' type='text/javascript'>alert('ID em branco');window.location.href='verificacao_usuario.php'</script>";
} else {
    require_once('../../../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();
    
    // Consulta preparada para excluir o registro com base no ID
    $sql_excluir = "DELETE FROM tbficha WHERE id_pd = ?";
    $stmt_excluir = mysqli_prepare($mysql->con, $sql_excluir);

    if ($stmt_excluir) {
        mysqli_stmt_bind_param($stmt_excluir, 'i', $id_pd);

        if (mysqli_stmt_execute($stmt_excluir)) {
            // Exclusão bem-sucedida
            echo "<script language='javascript' type='text/javascript'>alert('Exclusão realizada com sucesso!!');window.location.href='verificacao_usuario.php'</script>";
        } else {
            echo "Erro MySQL ao excluir: " . mysqli_error($mysql->con);
        }

        mysqli_stmt_close($stmt_excluir);
    } else {
        echo "Erro na preparação da consulta de exclusão: " . mysqli_error($mysql->con);
    }
    
    $mysql->fechar();
}
?>
</body>
</html>
