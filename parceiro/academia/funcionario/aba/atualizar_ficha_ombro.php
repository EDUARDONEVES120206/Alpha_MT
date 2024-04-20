<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$exercicio1 = $series1 = $repeticoes1 = $exercicio2 = $series2 = $repeticoes2 = $exercicio3 = $series3 = $repeticoes3 = $exercicio4 = $series4 = $repeticoes4 = $exercicio5 = $series5 = $repeticoes5 = $exercicio6 = $series6 = $repeticoes6 = $exercicio7 = $series7 = $repeticoes7 = $exercicio8 = $series8 = $repeticoes8 = $observacao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_usuario'])) {
    $logUsu = $_POST['login_usuario'];
    $exercicio1 = $_POST['exercicio1'];
    $series1 = $_POST['series1'];
    $repeticoes1 = $_POST['repeticoes1'];
    $exercicio2 = $_POST['exercicio2'];
    $series2 = $_POST['series2'];
    $repeticoes2 = $_POST['repeticoes2'];
    $exercicio3 = $_POST['exercicio3'];
    $series3 = $_POST['series3'];
    $repeticoes3 = $_POST['repeticoes3'];
    $exercicio4 = $_POST['exercicio4'];
    $series4 = $_POST['series4'];
    $repeticoes4 = $_POST['repeticoes4'];
    $exercicio5 = $_POST['exercicio5'];
    $series5 = $_POST['series5'];
    $repeticoes5 = $_POST['repeticoes5'];
    $exercicio6 = $_POST['exercicio6'];
    $series6 = $_POST['series6'];
    $repeticoes6 = $_POST['repeticoes6'];
    $exercicio7 = $_POST['exercicio7'];
    $series7 = $_POST['series7'];
    $repeticoes7 = $_POST['repeticoes7'];
    $exercicio8 = $_POST['exercicio8'];
    $series8 = $_POST['series8'];
    $repeticoes8 = $_POST['repeticoes8'];
    $observacao = $_POST['observacao'];
    $nome_personal = $_SESSION['nome'];
    $telefone_personal = $_SESSION['numero'];
    $email_personal = $_SESSION['email'];

    $sqlstring = "UPDATE tbombro SET 
                    nome_personal = ?,
                    telefone_personal = ?,
                    email_personal = ?,
                    exercicio1 = ?,
                    series1 = ?,
                    repeticoes1 = ?,
                    exercicio2 = ?,
                    series2 = ?,
                    repeticoes2 = ?,
                    exercicio3 = ?,
                    series3 = ?,
                    repeticoes3 = ?,
                    exercicio4 = ?,
                    series4 = ?,
                    repeticoes4 = ?,
                    exercicio5 = ?,
                    series5 = ?,
                    repeticoes5 = ?,
                    exercicio6 = ?,
                    series6 = ?,
                    repeticoes6 = ?,
                    exercicio7 = ?,
                    series7 = ?,
                    repeticoes7 = ?,
                    exercicio8 = ?,
                    series8 = ?,
                    repeticoes8 = ?,
                    observacao = ?
                WHERE login_usuario = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssss", 
            $nome_personal, $telefone_personal, $email_personal, 
            $exercicio1, $series1, $repeticoes1,
            $exercicio2, $series2, $repeticoes2,
            $exercicio3, $series3, $repeticoes3,
            $exercicio4, $series4, $repeticoes4,
            $exercicio5, $series5, $repeticoes5,
            $exercicio6, $series6, $repeticoes6,
            $exercicio7, $series7, $repeticoes7,
            $exercicio8, $series8, $repeticoes8,
            $observacao, $logUsu
        );
    
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        header("Location: editar_ficha_ombro.php?login_usuario=$logUsu");
        exit;
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($mysql->con);
    }
}

$mysql->fechar();
?>
