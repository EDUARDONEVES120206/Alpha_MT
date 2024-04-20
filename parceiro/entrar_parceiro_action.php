<HTML>
<HEAD>
 <TITLE>AlphaMT - Login</TITLE>
 <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
</HEAD>



<BODY>
<?php
 require_once('../conexao/conexao.php');

	$mysql = new BancodeDados();
	$mysql -> conecta();

   $plogin=$_POST['login'];
   $psenha=$_POST['senha'];



    $sqlstring = "select * from tbparceiro where login='$plogin' and senha='$psenha'"  ;

	$result = @mysqli_query($mysql->con, $sqlstring);
	$total = $result -> num_rows;
  if($total==1){
        $dados=mysqli_fetch_array($result) ;
      	session_start();
 		  $_SESSION['nome'] =$dados['nome'] ;
      $_SESSION['login'] =$dados['login'] ;
      $_SESSION['tipo'] =$dados['tipo'] ;
      $_SESSION['plano'] =$dados['plano'] ;
      $_SESSION['cpf_cnpj'] =$dados['cpf_cnpj'] ;
      $_SESSION['endereco'] =$dados['cidade'] .", ". $dados['bairro'] ." - ". $dados['rua'] .", ".$dados['numero'] .", ". $dados['cep'].". " ;
		  $_SESSION['log'] = 'ativo';
	

		  echo"<script language='javascript' type='text/javascript'>
          alert('Olá, seja bem vinda(o)!!');window.location.href='home_parceiro.php';
          </script>";

     }
      else {
      	  echo"<script language='javascript' type='text/javascript'>
            alert('Ops, senha ou login inválidos!');window.location.href
            ='parceria.php';</script>";
      }





      $mysql->fechar();
 ?>
</BODY>
</HTML>
