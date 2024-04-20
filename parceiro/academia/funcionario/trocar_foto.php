<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}
?>

<html>

<head>
    <title>AlphaMT - Trocar Foto</title>
</head>

<body>
    <form action="processar_upload.php" method="POST" enctype="multipart/form-data">
        Selecione uma imagem para fazer o upload:
        <input type="file" name="nova_imagem">
        <input type="submit" value="Enviar">
    </form>

    <a href="conta.php">Voltar para a conta</a><br>
</body>

</html>
