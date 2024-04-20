<HTML>
<HEAD>
 <TITLE>AlphaMT - HOME PROFISSIONAIS</TITLE>
 <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Precisa estar logado para acessar o conteúdo');window.location.href='../entrar.php';</script>";
    exit;
}
?>

</HEAD>
<BODY>
Home Profissional<br>
<hr>
 Botão perfil <br>
 Gerenciar anuncios <br>
 Listas a fazer<br>
 Gerenciar Plano <br>
 Botão sair <br>

</BODY>
</HTML>
