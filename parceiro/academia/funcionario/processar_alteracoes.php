<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}

// Incluir o arquivo de conexão com o banco de dados
require_once('../../../conexao/conexao.php');

// Criar uma instância da classe BancodeDados
$mysql = new BancodeDados();

// Conectar ao banco de dados
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar os dados do formulário
    $id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $palavra_chave = $_POST['palavra_chave'];

    // Atualizar os dados no banco de dados
    $query = "UPDATE tbfuncionario SET nome = '$nome', login = '$login', email = '$email', numero = '$telefone', palavra_chave = '$palavra_chave' WHERE id = $id";

    $resultado = $mysql->executaSQL($query);

    if ($resultado) {
        echo "<script language='javascript' type='text/javascript'>alert('Alterações salvas com sucesso!!');window.location.href='../../../fechar_sessao.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao salvar as alterações. Por favor, tente novamente.');window.location.href='conta.php';</script>";
    }
}

// Fechar a conexão com o banco de dados
$mysql->fechar();
?>
