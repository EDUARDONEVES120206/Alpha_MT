<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit();
}


?>
<html>
<head>
<title>AlphaMT -  Usuário</title>
</head>
<body>
    <form action="processar_upload.php" method="POST" enctype="multipart/form-data">
        Selecione uma imagem para fazer o upload:
        <input type="file" name="imagem">
        <input type="submit" value="Enviar Imagem">
    </form>
</body>
</html>
