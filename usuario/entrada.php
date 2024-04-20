<HTML>
<HEAD>
<title>AlphaMT -  Usuário</title>
</HEAD>
<link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">



<BODY>
<?php
require_once('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();
$plogin = $_POST['login'];
$psenha = $_POST['senha'];
$sqlstring = "SELECT * FROM tbusuario WHERE login='$plogin' AND senha='$psenha'";
$result = @mysqli_query($mysql->con, $sqlstring);
$total = $result->num_rows;

if ($total == 1) {
    $dados = mysqli_fetch_array($result);
    session_start();

    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['senha'] = $dados['senha'];
    $_SESSION['login'] = $dados['login'];
    $_SESSION['cpf'] = $dados['cpf'];
    $_SESSION['log'] = 'ativo';
    $_SESSION['nivel'] = $dados['nivel'];
    $_SESSION['plano'] = $dados['plano'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['numero'] = $dados['numero'];
    $_SESSION['palavra_chave'] = $dados['palavra_chave'];


    echo "<script language='javascript' type='text/javascript'>
          alert('Você está logado!');
          window.location.href='home.php';
          </script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Ops, senha ou nome de usuario inválidos');
            window.location.href='entrar.php';
            </script>";
}

$mysql->fechar();
?>

</BODY>
</HTML>
