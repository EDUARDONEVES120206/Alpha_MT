<HTML>
<HEAD>
<title>AlphaMT -  Usuário</title>
</HEAD>
<BODY>
<?php
session_start();

$pnome = $_SESSION['nome'];
$plogin = $_SESSION['login'];
$pcpf = $_SESSION['cpf'];
$pemail = $_POST['email'];
$ppalavra_chave = $_SESSION['palavra_chave'];
$psenha = $_SESSION['senha'];
$pplano = $_POST['plano'];


if (empty($pnome) || empty($plogin) || empty($pcpf) || empty($pemail) || empty($ppalavra_chave) || empty($psenha) || empty($pplano)) {
    echo "<script language='javascript' type='text/javascript'>alert('Todos os campos são obrigatórios.');window.location.href='entrar.php'</script>";
} else {

        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();
        $sqlstring = "INSERT INTO tbusuario(nome, login, cpf, email, numero, palavra_chave, senha, plano, nivel) VALUES ('$pnome', '$plogin', '$pcpf', '$pemail', '', '$ppalavra_chave', '$psenha', '$pplano', 'usuario')";
        $query = @mysqli_query($mysql->con, $sqlstring);

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso.');window.location.href='entrar.php'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, não foi possível cadastrar. Tente novamente.');window.location.href='entrar.php'</script>";
        }
    }

?>

</BODY>
</HTML>
