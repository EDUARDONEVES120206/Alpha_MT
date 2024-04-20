<?php

session_start();
if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../../../fechar_sessao.php';</script>";
}

include('evento.php');

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST['titulo'];
    $dataInicio = $_POST['data_inicio'];
    $dataFim = $_POST['data_fim'];
    $descricao = $_POST['descricao'];
    $login = $_SESSION['login'];
    $cnpj = $_SESSION['cpf_cnpj'];

    // Prepara e executa a consulta SQL para cadastrar o evento usando prepared statements
    $sql = "INSERT INTO eventos (login, descricao, cpf_cnpj, titulo, data_inicio, data_fim) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincula os parâmetros
        $stmt->bind_param("ssssss", $login, $descricao, $cnpj, $titulo, $dataInicio, $dataFim);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Evento cadastrado com sucesso!');
            window.location.href='calendarioadm.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao cadastrar o evento: " . $stmt->error . "');
            window.location.href='calendarioadm.php';</script>";
        }

        // Fecha o statement
        $stmt->close();
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro na preparação da consulta: " . $conn->error . "');
        window.location.href='calendarioadm.php';</script>";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
