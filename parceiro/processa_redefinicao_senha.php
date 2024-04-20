<?php
session_start();

$maxTentativas = 3; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tentativas = isset($_SESSION["tentativas"]) ? $_SESSION["tentativas"] : 0;

    if ($tentativas >= $maxTentativas) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Você excedeu o número máximo de tentativas de redefinição de senha. Entre em contato com o suporte.');window.location.href='../contato.php';
            </script>";
        exit();
    }

    $login = $_POST["login"];
    $palavra_chave = $_POST["palavra_chave"];
    $nova_senha = $_POST["nova_senha"];

    include('conectar.php');

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tbparceiro WHERE login = ? AND palavra_chave = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta SQL: " . $conn->error);
    }

    $stmt->bind_param("ss", $login, $palavra_chave);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Armazena a nova senha sem hash
        $sql = "UPDATE tbparceiro SET senha = ? WHERE login = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Erro na preparação da consulta SQL: " . $conn->error);
        }

        $stmt->bind_param("ss", $nova_senha, $login);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Parabéns, senha recuperada com sucesso!!!');window.location.href='parceria.php';
            </script>";
            exit();
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Ops, não conseguimos redefinir a sua senha, tente novamente mais tarde!!');window.location.href='parceria.php';
            </script>";
            exit();
        }
    } else {
        $_SESSION["tentativas"] = $tentativas + 1;

        echo "<script language='javascript' type='text/javascript'>
        alert('LNome de usuário ou palavra-chave incorretos, verifique suas informações. Tentativas restantes: " . ($maxTentativas - $tentativas - 1) . "');window.location.href='redefinir_senha.php';
        </script>";
        exit();
    }
} else {
    header("Location: redefinir_senha.php");
    exit();
}
?>
