<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="../css/style7.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <br>
 <div class="container">
    <center>
 
                <h2  class="title title-primary">Redefinir Senha</h2>

                <p>Por favor, insira seu login e palavra-chave para redefinir sua senha.</p>

                <form class="form" action="processa_redefinicao_senha.php" method="POST">
                    <label class="label-input" for="login">
                    <i class="far fa-user icon-modify"></i>
                        <input type="text" name="login" id="login" placeholder="Seu login">
                    </label>
                    <br>
                
                    <label class="label-input" for="palavra_chave">
                    <i class="fas fa-lock icon-modify"></i>

                        <input type="password" name="palavra_chave" id="palavra_chave" placeholder="Sua palavra-chave">
                    </label>

                    <br>

                    <label class="label-input" for="nova_senha">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="nova_senha" id="nova_senha" placeholder="Nova senha">
                    </label>
                    <br>
                    <button class="btn btn-second"> Redefinir</button>
                </form>
          
    </div>
</center>
    <script src="../js/app.js"></script>
</body>

</html>