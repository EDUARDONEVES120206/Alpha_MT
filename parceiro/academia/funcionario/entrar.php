<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/style4.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>AlphaMT - Funcionário Academia</title>
</head>
<body>
<div class="container">
<div class="content first-content">

<div class="first-column">
    <h2 class="title title-primary">Você ainda não possui conta?
        
    </h2>

    <p class="description description-primary">Aperte o Botão abaixo para fazer um <br>pedido para
       ser um personal parceiro</p><br>
        <a class="btn btn-primary" href="../../parceria.php">Fazer pedido</a>
     <br><br>
  
</div>
<div class="second-column">
    <h2 class="title title-second">Ainda não possui conta?
        <span class="logo-container">
            <img src="../../../img/logobranco.png" alt="Logo" class="logo">
        </span>
    </h2>

    <p class="description description-second">Faça o cadastro:</p>

    <form action="entrar_action.php" method="POST">
        <label class="label-input" for="nome"><br>
    <i class="far fa-user icon-modify"></i>
                 <input class="label-input" type="text" id="login" name="login" placeholder="Nome de usuário:" required></label>
                <br>
                <label class="label-input" for="senha">
                <i class="fas fa-lock icon-modify"></i>
                <input class="label-input" type="password" id="senha" name="senha" placeholder="Senha:" required></label>

       <center> <input class="btn btn-second" type="submit" value="Entrar"><br> </center>
    </form>
    <BR>
    </form>
</div><!-- second column -->

</div>

    <script src="../../../js/app.js"></script>
    
</body>
</html>
