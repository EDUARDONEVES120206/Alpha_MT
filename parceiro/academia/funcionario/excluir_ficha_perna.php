<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}

require_once("../../../conexao/conexao.php");

$bancoDeDados = new BancodeDados();
$bancoDeDados->conecta();

if (isset($_GET['login'])) {
    $id_ficha = $_GET['login'];

    $sql = "DELETE FROM tbperna WHERE id_ficha=?";
    $stmt = $bancoDeDados->con->prepare($sql);
    $stmt->bind_param("i", $id_ficha);

    if ($stmt->execute()) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de ficha não fornecido.";
}

$bancoDeDados->fechar();
?>
<br>
<a href="gerenciar_fichas.php">Voltar</a>
