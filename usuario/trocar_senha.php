<?php
session_start();

if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../fechar_sessao.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novo_senha = $_POST['nova_senha'];
    $confirmar_nova_senha = $_POST['confirmar_nova_senha'];


    if (empty($novo_senha)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Espaço em branco!');
        window.location.href='conta_usuario.php';</script>";
        exit;
    }
    if (empty($confirmar_nova_senha)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Espaço em branco!');
        window.location.href='conta_usuario.php';</script>";
        exit;
    }


    if ($senha = $confirmar_nova_senha) {
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();


        $senha = mysqli_real_escape_string($mysql->con, $senha);


        $sqlstring = "UPDATE tbusuario SET senha = '$senha' WHERE cpf = '{$_SESSION['cpf']}'";
        $query = mysqli_query($mysql->con, $sqlstring);

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Senha alteradas com sucesso!');
            window.location.href='../fechar_sessao2.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao atualizar senha. Por favor, tente novamente.');
            window.location.href='conta_usuario.php';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Senha incorreta!');
        window.location.href='conta_usuario.php';</script>";
    }
}
?>