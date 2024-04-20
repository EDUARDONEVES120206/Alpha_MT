
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
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

if (isset($_POST['id_pd'])) {
    $id_pd = $_POST['id_pd'];

    // Verifica se o ID é válido (pode adicionar mais validações, se necessário)
    if (!is_numeric($id_pd)) {
        echo "ID inválido.";
    } else {
        // Consulta para excluir o aluno com base no ID
        $sql_excluir = "DELETE FROM tbfichaof WHERE id_pd = ?";
        $stmt_excluir = mysqli_prepare($mysql->con, $sql_excluir);

        if ($stmt_excluir) {
            mysqli_stmt_bind_param($stmt_excluir, 'i', $id_pd);

            if (mysqli_stmt_execute($stmt_excluir)) {
                echo "<script language='javascript' type='text/javascript'>alert('Aluno excluído com sucesso!');window.location.href='gerenciar_entrada_academia.php';</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro MySQL ao excluir aluno: ' . mysqli_error($mysql->con)');window.location.href='gerenciar_entrada_academia.php';</script>";
            }

            mysqli_stmt_close($stmt_excluir);
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro na preparação da consulta de exclusão: ' . mysqli_error($mysql->con));window.location.href='gerenciar_entrada_academia.php';</script>";
            
        }
    }
}

$mysql->fechar();
?>

