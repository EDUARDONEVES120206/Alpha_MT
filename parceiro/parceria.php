<HTML>

<HEAD>
  <TITLE>AlphaMT - Parceria</TITLE>
  <link rel="stylesheet" href="../css/style4.css">
  <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</HEAD>



<body>
  
  <div class="container">
    <div class="content first-content">
      <div class="first-column">
        <h2 class="title title-primary">VOCÊ JÁ É PARCEIRO?</h2>

        <p class="description description-primary">Aperte o botão abaixo para entrar:</p>
        <button id="signin" class="btn btn-primary">Entrar</button>
      </div>
      <div class="second-column">
        <h2 class="title title-second">QUER SE TORNAR PARCEIRO?
          <span class="logo-container">
            <img src="../img/logobranco.png" alt="Logo" class="logo">
          </span>

        </h2>

        <p class="description description-second">Faça o cadastro:</p>

        <form class="form" action="parceria_action.php" method="post">
          Entraremos em contato, envie suas informações:
          <BR>
          <label class="label-input" for="nome">
            <i class="far fa-user icon-modify"></i>
            <input type="text" name="nome" id="nome" placeholder="Nome" />
          </label>


          <label class="label-input" for="email">
            <i class="fas fa-envelope icon-modify"></i>

            <input type="email" name="email" id="email" placeholder="Email" /> </label>

          <label class="label-input" for="telefone">
            <i class="fas fa-phone   icon-modify"></i>
            <input type="text" name="telefone" id="Telefone" minlength="11" placeholder="Telefone:" />
          </label>
          
          <select class="label-input" name="nivel" id="nivel" style="color: #7f8c8d;">
            <option value="" disabled selected>Quem você é?</option>
            <option value="profissionais" >Profissional</option> 
            <option value="loja">Loja</option>
            <option value="academia">Academia</option>
          </select>
         

          <label for="motivo">Qual o seu motivo de se tornar um Parceiro?</label>

          <textarea class="label-input" name="motivo" id="Motivo" maxlength="300"></textarea>

          <button class="btn btn-second" type="submit" name="contato" value="Enviar">Enviar</button>
        </form>
      </div>

    </div>
    <div class="content second-content">
      <div class="first-column">
        <h2 class="title title-primary">AINDA NÃO POSSUI CONTA?</h2>
        <p class="description description-primary">Aperte o botão abaixo e crie uma conta!</p>
        <button id="signup" class="btn btn-primary">Cadastrar</button>
      </div>
      <div class="second-column">
        <h2 class="title title-second">JÁ POSSUI CONTA?
          <span class="logo-container">
            <img src="../img/logobranco.png" alt="Logo" class="logo">
          </span>
        </h2>

        <p class="description description-second">Faça seu login:</p>
        <!--form 2-->
        <form class="form" action="entrar_parceiro_action.php" method="post">

          <label class="label-input" for="">
            <i class="far fa-user icon-modify"></i>
            <input type="text" name="login" id="login" placeholder="Nome de Usuario">
          </label>

          <label class="label-input" for="">
            <i class="fas fa-lock icon-modify"></i>
            <input type="password" name="senha" id="senha" placeholder="Senha">
          </label>
          <a class="password" href="academia/funcionario/entrar.php">Funcionário da academia?</a>
          <a class="password" href="redefinir_senha.php">Esqueceu a senha?</a>
          <button class="btn btn-second">Entrar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="../js/app.js"></script>

</BODY>

</HTML>