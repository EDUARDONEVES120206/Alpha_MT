<?php

session_start();
if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../fechar_sessao.php';</script>";
} 

include('conectar.php');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id, titulo, data_inicio as start, data_fim as end FROM eventos";
$result = $conn->query($sql);

$eventos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($eventos);

mysqli_close($conn);
?>