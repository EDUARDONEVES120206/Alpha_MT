a,ioaoi
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
    $idEvento = $_POST['id'];

    $sql = "DELETE FROM eventos WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $idEvento);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento excluído com sucesso!');
            window.location.href='calendarioadm.php';</script>";
            exit();
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao excluir o evento: " . $stmt->error . "');
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
