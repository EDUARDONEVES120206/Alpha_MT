<?php
session_start();
if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}

include('evento.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $idEvento = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $dataInicio = $_POST['data_inicio'];
    $dataFim = $_POST['data_fim'];

    // Prepara e executa a consulta SQL para atualizar o evento
    $sql = "UPDATE eventos SET titulo = ?, descricao = ?, data_inicio = ?, data_fim = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $titulo, $descricao, $dataInicio, $dataFim, $idEvento);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento atualizado com sucesso!');
            window.location.href='calendarioadm.php';</script>";
            exit();
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao atualizar o evento: " . $stmt->error . "');
            window.location.href='calendarioadm.php';</script>";
            exit();
        }

        $stmt->close();
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro na preparação da consulta: " . $conn->error . "');
        window.location.href='calendarioadm.php';</script>";
        exit();
    }
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Requisição inválida.');
    window.location.href='calendarioadm.php';</script>";
    exit();
}

$conn->close();
?>
