<html>
  <head>
    <title>AlphaMT - HOME LOJA</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    
  </head>
  <body>
  <?php
    session_start();

    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao';</script>";
    } elseif ($_SESSION['tipo'] == "academia") {
        header("Location: academia/home_academia.php");
        exit();
    } elseif ($_SESSION['tipo'] == "profissionais") {
      header("Location: profissionais/home_profissionais.php");
      exit();
       
    }elseif ($_SESSION['tipo'] == "loja"){
      $conexao = mysqli_connect("localhost", "root", "prof@etec", "alpha");

      if (mysqli_connect_errno()) {
          echo "Falha na conexão ao banco de dados: " . mysqli_connect_error();
      } else {
          mysqli_close($conexao);
      }
    } else {
echo "olá";
    }
    ?>
    
    Home Loja<br>
   <h1>
   Botão perfil <br>
   Botão cadastro de produto<br>
   Gerenciar Anuncios <br>
   Gerenciar Plano <br>
   Gerenciar funcionarios <br>
   Botão sair <br>
 

  </body>
</html>