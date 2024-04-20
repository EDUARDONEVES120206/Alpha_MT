<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/styleloja.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Loja</title>
</head>
<body>
<nav class="menu-lateral">

<div class="btn-expandir">
    <i class="bi bi-list" id="btn-exp"></i>
</div>

<ul>
    <li class="item-menu">
        <a href="../usuario/home.php">
            <span class="icon"><i class="bi bi-house-door-fill"></i></span>
            <span class="txt-link">Inicio</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="../usuario/academias.php">
            <span class="icon"><i class="bi bi-geo-alt"></i></span>
            <span class="txt-link">Academias</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="../usuario/conta_usuario.php">
            <span class="icon"><i class="bi bi-person-circle"></i></span>
            <span class="txt-link">Conta</span>
        </a>
    </li>
    <li class="item-menu ativo">
        <a href="loja.php">
            <span class="icon"><i class="bi bi-bag"></i></span>
            <span class="txt-link">Loja</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="#">
            <span class="icon"><i class="bi bi-gear"></i></span>
            <span class="txt-link">Suporte</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="../fechar_sessao.php">
            <span class="icon"><i class="bi bi-door-open"></i></span>
            <span class="txt-link">Sair</span>
        </a>
    </li>

</ul>
</nav>

<header>
        <div class="interface" style="margin-left: 150px;">
            <div class="logo">
            <a href="../loja/loja.php">
                    <img src="../img/logo.png" alt="Logo Alpha MT">
                </a>
            </div><!--logo-->

            <div class="navbar">
                <div class="header-inner-content">
                    <ul>
                        <a href="whey.php"><li>Whey Protein</li></a>
                        <a href="creatina.php"><li>Creatina</li>
                        <a href="pretreino.php"><li>Pre-Treino</li>
                        <a href="roupas.php"><li>Roupas</li>
                        <a href="acessorios.php"><li>Acessorios</li>
                    </ul>
                </div>
            </div>
            <div class="nav-icon-container">
            <a href="carrinho.php"> <i class="bi bi-cart"></i></a>
            <i class="bi bi-list" id="btn-exp"></i>
            </div>
        </div><!--inteface-->
    </header>
    <script src="../js/menu.js"></script>

    <main class="main">
        <div class="banner">
            <img src="../img/banner6.jpg" alt="Banner Promocional">
            
        </div>

        <br><br><br><br>
        <div class="produtos">
                     <div class="image">
                         <img src="../img/imgprod/creatina250.png" alt="">
                    </div>
                    <div class="text">
                        <h2>CREATINA  <span>250g</span></h2>
                        <p>R$55,95</p>
                        <p><del>R$68,50</del></p>
                        <br><br><br>
                        <a href="../loja/creatina250.php"><button class="btn btn-third"> EXPERIMENTE</button></a>               
                    </div>
                </div>
                
                <br><br><br><br>

                <div class="produtos">
                     <div class="image">
                         <img src="../img/imgprod/creatina500.png" alt="">
                    </div>
                    <div class="text">
                        <h2>CREATINA  <span>500g</span></h2>
                        <p>R$85,33</p>
                        <p><del>R$98,45</del></p>
                        <br><br><br>
                        <a href="../loja/creatina500.php"><button class="btn btn-third"> EXPERIMENTE</button></a>               
                    </div>
                </div>
                
                <br><br><br><br>

                    
                <div class="produtos">
                     <div class="image">
                         <img src="../img/imgprod/creatina1kg.png" alt="">
                    </div>
                    <div class="text">
                        <h2>CREATINA<span>1kg</span></h2>
                        <p>R$110,10</p>
                        <p><del>R$129,99</del></p>
                        <br><br><br>
                        <a href="../loja/creatina1kg.php"><button class="btn btn-third"> EXPERIMENTE</button></a>               
                    </div>
                </div>
                
                <br><br><br><br>

               

    </main>
   

    

    

    <div class="interface">
        <footer>
            <div class="interface">
                <div class="copyright">
                    &copy; 2023 I.T.S.A.S. Todos os direitos reservados.
                </div>
            </div>
        </footer>


</body>
</html>