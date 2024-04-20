<HTML>
<HEAD>
 <TITLE>AlphaMT - ADM</TITLE>
 <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit;
}
?>

</HEAD>
<BODY>
 <BR>
 <form action="pedidos_parceiros.php" method="post">

      <input type="submit" name="pedidos" value="Pedidos">
    </form>
 <BR>

 <form action="controle_parceiros.php" method="post">

      <input type="submit" name="parceiros" value="Controle">
    </form>

<form action="adm.php" method="post">
      <hr>
      <input type="submit" name="voltar" value="Voltar">
    </form>
    

 
</BODY>
</HTML>
