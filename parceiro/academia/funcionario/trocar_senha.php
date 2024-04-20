<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../conexao/conexao.php');

$mysql = new BancodeDados();
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha_atual = $_POST['senha'];
    $nova_senha = $_POST['novasenha'];
    $confirmar_nova_senha = $_POST['novasenha2'];

    $id = $_SESSION['id'];

    $query = "SELECT senha FROM tbfuncionario WHERE id = $id";

    $resultado = $mysql->executaSQL($query);

    if ($resultado && $row = mysqli_fetch_assoc($resultado)) {
        $senha_atual_armazenada = $row['senha'];

        if (password_verify($senha_atual, $senha_atual_armazenada)) {
           

            if ($nova_senha != $confirmar_nova_senha) {
                echo "<script language='javascript' type='text/javascript'>alert('As novas senhas não coincidem. Tente novamente.');window.location.href='conta.php';</script>";
                exit;
            }


            $query = "UPDATE tbfuncionario SET senha = '$nova_senha' WHERE id = $id";

            $resultado = $mysql->executaSQL($query);

            if ($resultado) {
                echo "<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso!');window.location.href='../../../fechar_sessao.php';</script>";
                exit;
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao alterar a senha. Por favor, tente novamente.');window.location.href='conta.php';</script>";
                exit;
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Senha atual incorreta. Tente novamente.');window.location.href='conta.php';</script>";
            exit;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao recuperar a senha atual do usuário.');window.location.href='conta.php';</script>";
        exit;
    }
} else {
    header("Location: conta.php");
    exit;
}

$mysql->fechar();
?>
