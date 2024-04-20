 <!DOCTYPE html>
<html>
<head>
    <title>AlphaMT - Parceria</title>
    <link rel="stylesheet" href="../css/style7.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
</head>
<body>
    <br>
<div class="container">
    <h1>ALPHAMT - PARCERIA</h1>
    <hr>
    <p>Essas foram as informações enviadas para a nossa central:</p>
   
    <?php
    
    session_start();

    $pnome = $_POST['nome'];
    $pnivel = $_POST['nivel'];
    $pemail = $_POST['email'];
    $ptelefone = $_POST['telefone'];
    $pmotivo = $_POST['motivo'];

if (empty($pnome) || empty($pnivel) || empty($pemail) || empty($ptelefone) || empty($pmotivo)) {
        echo "<script language='javascript' type='text/javascript'>alert('Tem campo em branco');window.location.href='parceria.php'</script>";
    } else {
        echo "<p><b>Nome:</b> " . $pnome . "</p>";
        echo "<p><b>Tipo:</b> " . $pnivel . "</p>";
        echo "<p><b>Email:</b> " . $pemail . "</p>";
        echo "<p><b>Telefone:</b> " . $ptelefone . "</p>";
        echo "<p><b>Motivo:</b> " . $pmotivo . "</p>";

        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();
        $sqlstring = "INSERT INTO parceria(nome, nivel, email, telefone, motivo) VALUES ('$pnome', '$pnivel', '$pemail', '$ptelefone', '$pmotivo')";
        $query = @mysqli_query($mysql->con, $sqlstring);

       

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>alert('Parabéns, suas informações foram enviadas com sucesso, entraremos em contato em breve.')</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, não foi possível cadastrar');window.location.href='parceria.php'</script>";
        }

        $mysql->fechar();
        
         }

    ?>
    <center>
    Aguarde que entraremos em contato, obrigado.
        <br>
    <button class="btn btn-second"><a href="../index.php">Voltar</a></button> <br>
        </center>
  
            

 </div>
</body>
</html>
