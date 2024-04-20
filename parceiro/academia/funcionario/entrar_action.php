<HTML>

<HEAD>
    <TITLE>AlphaMT - Funcionario Academia</TITLE>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
</HEAD>



<BODY>
    <?php
    require_once('../../../conexao/conexao.php');

    $mysql = new BancodeDados();
    $mysql->conecta();

    $login = $_POST['login'];
    $senha = $_POST['senha'];



    $sqlstring = "select * from tbfuncionario where login='$login' and senha='$senha'";
    $result = @mysqli_query($mysql->con, $sqlstring);
    $total = $result->num_rows;

    if ($total == 1) {
        $dados = mysqli_fetch_array($result);
        session_start();
        $_SESSION['id'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['login'] = $dados['login'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['numero'] = $dados['numero'];
        $_SESSION['data_registro'] = $dados['data_registro'];
        $_SESSION['nome_academia'] = $dados['nome_academia'];
        $_SESSION['login_academia'] = $dados['login_academia'];
        $_SESSION['log'] = 'ativo';


        echo "<script language='javascript' type='text/javascript'>
          alert('Olá, seja bem vinda(o)!!');window.location.href='home.php';
          </script>";

    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Ops, senha ou login inválidos!');window.location.href
            ='entrar.php';</script>";
    }





    $mysql->fechar();
    ?>
</BODY>

</HTML>