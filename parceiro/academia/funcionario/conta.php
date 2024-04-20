<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../conexao/conexao.php');

$mysql = new BancodeDados();

$mysql->conecta();

$id = $_SESSION['id']; 
$query = "SELECT * FROM tbfuncionario WHERE id = $id"; 
$resultado = $mysql->executaSQL($query);

if ($resultado) {
    $dados_usuario = mysqli_fetch_assoc($resultado);
} else {
    echo "Erro ao recuperar informações do usuário";
}

$mysql->fechar();
?>

<html>

<head>
    <title>AlphaMT - Funcionário Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
</head>

<body>
    <form action="processar_alteracoes.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $dados_usuario['nome']; ?>" required>
        <br>
        <label for="login">Nome de usuario:</label>
        <input type="text" id="login" name="login" value="<?php echo $dados_usuario['login']; ?>" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $dados_usuario['email']; ?>" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="telefone" id="telefone" name="telefone" value="<?php echo $dados_usuario['numero']; ?>" required>
        <br>
        <label for="palavra_chave">Palavra Chave:</label>
        <input type="palavra_chave" id="palavra_chave" name="palavra_chave"
            value="<?php echo $dados_usuario['palavra_chave']; ?>" required>
        <br>

        <input type="submit" value="Salvar">
    </form>
    <form action="trocar_senha.php" method="POST">
        <label for="Senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br>
        <label for="NovaSenha">Nova Senha:</label>
        <input type="password" id="novasenha" name="novasenha">
        <br>
        <label for="NovaSenha2">Confirme a Nova Senha:</label>
        <input type="password" id="novasenha2" name="novasenha2">
        <br>
        <input type="submit" value="Alterar">
    </form><br>
    Foto<br>    
    <?php
require_once("../../../conexao/conexao.php");
$login = $_SESSION['login'];
$mysql = new BancodeDados();
$mysql->conecta();
$sql = "SELECT caminho FROM tbimagens_acad_funcionario WHERE login = '$login'";
$resultado = $mysql->executaSQL($sql);
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $dados = mysqli_fetch_assoc($resultado);
    $caminho = $dados['caminho'];
    echo "<img src='$caminho' style='max-width: 100px; max-height: 100px; border-radius: 50%;'>";
} else {
    echo "<img src='../../../img/semfoto.png' style='max-width: 100px; max-height: 100px; border-radius: 50%;'>";
}
$mysql->fechar();
?>
<br>

    <a href="trocar_foto.php">ALTERAR FOTO</a><br><br>





    <a href="home.php">Voltar</a><br>
</body>

</html>