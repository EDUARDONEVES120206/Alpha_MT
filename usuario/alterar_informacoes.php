<?php
session_start();

if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../fechar_sessao.php';</script>";
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novo_nome = $_POST['novo_nome'];
    $novo_login = $_POST['novo_login'];
    $novo_email = $_POST['novo_email'];
    $novo_telefone = $_POST['novo_numero'];
    $novo_palavra = $_POST['novo_palavra_chave'];
    $senha = $_POST['senha'];
    $senha2 = $_SESSION['senha'];

    if (empty($novo_telefone)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Adicione um telefone!');
        window.location.href='conta_usuario.php';</script>";
        exit;
    }

    if (empty($novo_nome) || empty($novo_login) || empty($novo_email) || empty($novo_palavra)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro ao enviar as informações!');
        window.location.href='conta_usuario.php';</script>";
        exit;
    } 

    if (empty($senha)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Insira a senha para prosseguir!');
        window.location.href='conta_usuario.php';</script>";
        exit;
    } 

    if ($senha == $senha2) {
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();
        
        // Evitar SQL Injection usando mysqli_real_escape_string ou declarações preparadas
        $novo_nome = mysqli_real_escape_string($mysql->con, $novo_nome);
        $novo_login = mysqli_real_escape_string($mysql->con, $novo_login);
        $novo_email = mysqli_real_escape_string($mysql->con, $novo_email);
        $novo_telefone = mysqli_real_escape_string($mysql->con, $novo_telefone);
        $novo_palavra = mysqli_real_escape_string($mysql->con, $novo_palavra);

        $sqlstring = "UPDATE tbusuario SET nome = '$novo_nome', login = '$novo_login', email = '$novo_email', numero = '$novo_telefone', palavra_chave = '$novo_palavra' WHERE cpf = '{$_SESSION['cpf']}'";
        $query = mysqli_query($mysql->con, $sqlstring);

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Informações alteradas com sucesso!');
            window.location.href='../fechar_sessao2.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao atualizar informações. Por favor, tente novamente.');
            window.location.href='conta_usuario.php';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Senha incorreta!');
        window.location.href='conta_usuario.php';</script>"; 
    }   
}
?>
