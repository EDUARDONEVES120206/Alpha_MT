<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}
require_once('../../conexao/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_parceria = $_GET['id_parceria'];

    $mysql = new BancodeDados();
    $mysql->conecta();

    // Recupera os detalhes da parceria antes da exclusão
    $sql_select = "SELECT * FROM parceria WHERE id_parceria = $id_parceria";
    $resultado = mysqli_query($mysql->con, $sql_select);
    $dados_parceria = mysqli_fetch_array($resultado);

    // Executa a exclusão
    $sql_excluir = "DELETE FROM parceria WHERE id_parceria = $id_parceria";
    $excluir = mysqli_query($mysql->con, $sql_excluir);

    if ($excluir) {
        // Exibindo mensagem de sucesso
        echo "<script language='javascript' type='text/javascript'>alert('Parceria deletada com sucesso!!');window.location.href='../pedidos_parceiros.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao deletar parceria.');window.location.href='../pedidos_parceiros.php';</script>";
    }

    $mysql->fechar();
}

?>
