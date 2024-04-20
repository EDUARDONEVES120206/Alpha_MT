
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AlphaMT -  Usuário</title>
    <link rel="stylesheet" href="../css/style4.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">VOCÊ JÁ POSSUI CONTA?
                    
                </h2>

                <p class="description description-primary">Aperte o botão abaixo para entrar!</p>
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">AINDA NÃO POSSUI CONTA?
                    <span class="logo-container">
                        <img src="../img/logobranco.png" alt="Logo" class="logo">
                    </span>
                </h2>

                <p class="description description-second">Faça o cadastro:</p>
                <form class="form" name="cadastro" action="pagamento.php" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="login" id="login" placeholder="Nome de Usuario">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" oninput="validarNumeros(this)">
                    </label>


                    <label class="label-input" for="">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="text" name="palavra_chave" id="palavra_chave" placeholder="Palavra-Chave">
                    </label>

                    <label class="label-input" for="">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="senha" placeholder="Senha">
                    </label>

                    <center><label class="checkbox-container"> &nbsp
                    &nbspEu aceito os&nbsp<a href="termos.php">Termos de Uso</a>&nbsp
                     <input type="checkbox" name="aceitar_termos" id="aceitar_termos_checkbox" required>
                        <span class="checkmark"></span>
                    </label></center>

                    <script>

                    function validarNumeros(input) {
                     input.value = input.value.replace(/\D/g, '');
                    }

                      document.addEventListener("DOMContentLoaded", function () {
                      const form = document.querySelector("form");
                      form.addEventListener("submit", function (event) {
                      const aceitarTermosCheckbox = document.getElementById("aceitar_termos_checkbox");
                      if (!aceitarTermosCheckbox.checked) {
                      alert("Você deve aceitar os Termos de Uso antes de prosseguir.");
                       event.preventDefault(); 
                      }
                      });
                      });
                    </script>

                <BR>



                    <button class="btn btn-second">Cadastrar</button>
                </form>
            </div>

        </div>
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">AINDA NÃO POSSUI CONTA?
                    
                </h2>
                <p class="description description-primary">Aperte o botão abaixo e crie uma conta!</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">JÁ POSSUI CONTA?
                <span class="logo-container">
                    <img src="../img/logobranco.png" alt="Logo" class="logo">
                </span> </h2>

                <p class="description description-second">Faça seu login:</p>
                <form class="form" action="entrada.php" method="post">

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="text" name="login" id="login" placeholder="Nome de Usuario">
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="senha" placeholder="Senha">
                    </label>
                    <a class="password" href="redefinir_senha.php">Esqueceu a senha?</a>
                    <button class="btn btn-second">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/app.js"></script>

</body>

</html>