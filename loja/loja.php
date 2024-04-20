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
                <a href="../usuario/home.php">
                    <img src="../img/logo.png" alt="Logo Alpha MT">
                </a>
            </div><!--logo-->

            <div class="navbar">
                <div class="header-inner-content">
                    <ul>
                        <a href="whey.php">
                            <li>Whey Protein</li>
                        </a>
                        <a href="creatina.php">
                            <li>Creatina</li>
                            <a href="pretreino.php">
                                <li>Pre-Treino</li>
                                <a href="roupas.php">
                                    <li>Roupas</li>
                                    <a href="acessorios.php">
                                        <li>Acessorios</li>
                    </ul>
                </div>
            </div>
            <div class="nav-icon-container">
                <a href="carrinho.php"> <i class="bi bi-cart"></i></a>
                <div class="menu-button"><i class="bi bi-list" id="btn-exp"></i></div>
            </div>
        </div><!--inteface-->
    </header>
    <script src="../js/menu.js"></script>

    <main>
        <br><br><br><br><br><br><br><br><br>

        <div class="carousel-container">
            <button class="prev-button" onclick="prevSlide()">&#9665;</button>
            <div class="carousel-slides">
                <div class="carousel-slide">
                    <a href="pretreino.php"><img src="../img/banner1.png" alt="Imagem 1"></a>
                </div>
                <div class="carousel-slide">
                    <a href="creatina.php"><img src="../img/banner2.jpg" alt="Imagem 2"></a>
                </div>
                <div class="carousel-slide">
                    <a href="whey.php"><img src="../img/banner3.jpg" alt="Imagem 3"></a>
                </div>
            </div>
        </div>

        <div class="promocao">
            <div class="promocao-text">
                <section class="promocao-produtos">
                    <div class="interface">
                        <h2 class="titulo">PROMOÇÃO:</h2>
                        <div class="flex">

                            <div class="promocao-produtos-box">
                                <img src="../img/imgprod/wheyisolado.png" alt="medium whey">
                                <h3>Whey Protein <span>Isolado</span></h3>
                                <p>R$130,55</p>
                                <p><del>R$145,45</del></p>
                                <br><br><br>
                            </div><!--produtos-box-->

                            <div class="promocao-produtos-box">
                                <img src="../img/imgprod/creatina500.png" alt="creatina 500">
                                <h3>Creatina <span>500g</span></h3>
                                <p>R$85,33</p>
                                <p><del>R$98,45</del></p>
                            </div><!--produtos-box-->

                            <div class="promocao-produtos-box">
                                <img src="../img/imgprod/regata2.png" alt="Regata">
                                <h3>Regata <span>Bodybuilding</span></h3>
                                <p>R$79,99</p>
                                <p><del>R$89,99</del></p>
                            </div><!--produtos-box-->

                            
                            <div class="promocao-produtos-box-combo">
                                <h4><span>COMBO ALPHA MT</span></h4>
                                <p><span>R$250,00</span></p>
                                <p><del>R$295,87</del></p>
                                <center><a href="../loja/carrinho.php"><button class="btn btn-third"> EXPERIMENTE</button></a></center>

                            </div><!--produtos-box-->

                        </div><!--flex-->
                    </div><!--interface-->
                </section><!--especialidades-->

                
            </div>
        </div>

        <br><br><br><br>

        <section class="especialidades">
            <div class="interface">
                <h2 class="titulo">PRODUTOS:</h2>
                <div class="flex">

                    <div class="produtos-box">
                        <img src="../img/imgprod/mediumwhey.png" alt="medium whey">
                        <h3>Medium Whey</h3>
                        <p>R$55,99</p>
                        <p><del>R$63,90</del></p>
                        <center><a href="../loja/mediumwhey.php"><button class="btn btn-third"> EXPERIMENTE</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/creatina250.png" alt="creatina 250">
                        <h3>Creatina 250g</h3>
                        <p>R$55,95</p>
                        <p><del>R$68,50</del></p>
                        <center><a href="../loja/creatina250.php"><button class="btn btn-third"> EXPERIMENTE</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/pretreino500.png" alt="Pre treino 500">
                        <h3>Pre-Treino 500g</h3>
                        <p>R$180,55</p>
                        <p><del>R$210,99</del></p>
                        <center><a href="../loja/pretreino500.php"><button class="btn btn-third"> EXPERIMENTE</button></a></center>
                    </div><!--produtos-box-->
                </div><!--flex-->
            </div><!--interface-->
        </section><!--especialidades-->

        <section class="especialidades">
            <div class="interface">
                <h2 class="titulo">ACESSÓRIOS:</h2>
                <div class="flex">

                    <div class="produtos-box">
                        <img src="../img/imgprod/cinto1.png" alt="cinto de treino">
                        <h3>Cinto de treinamento</h3>
                        <p>R$100,90</p>
                        <p><del>R$121,40</del></p>
                        <center><a href="../loja/cinto.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/strap1.png" alt="strap academia">
                        <h3>Strap Academia</h3>
                        <p>50,00</p>
                        <p><del>65,50</del></p>
                        <center><a href="../loja/strap.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/cinto2.png" alt="camiseta">
                        <h3>Cinto de treinamento Premium</h3>
                        <p>R$120,90</p>
                        <p><del>R$149,99</del></p>
                        <center><a href="../loja/cinto2.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>

                    </div><!--produtos-box-->
                </div><!--flex-->
            </div><!--interface-->
        </section><!--especialidades-->

        <section class="especialidades">
            <div class="interface">
                <h2 class="titulo">MODA:</h2>
                <div class="flex">

                    <div class="produtos-box">
                        <img src="../img/imgprod/regata1.png" alt="cinto de treino">
                        <h3>REGATA <span>LOBO ALPHA</span></h3>
                        <p>R$80,55</p>
                        <p><del>R$99,99</del></p>
                        <center><a href="../loja/regata1.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/blusa1.png" alt="strap academia">
                        <h3>BLUSA DE FRIO<span> ALPHA MT</span></h3>
                        <p>R$150,55</p>
                        <p><del>R$170,99</del></p>
                        <center><a href="../loja/blusa1.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>
                    </div><!--produtos-box-->

                    <div class="produtos-box">
                        <img src="../img/imgprod/camiseta.png" alt="camiseta">
                        <h3>Camiseta Alpha MT</h3>
                        <p>R$100,90</p>
                        <p><del>R$121,40</del></p>
                        <center><a href="../loja/camiseta.php"><button class="btn btn-third">COMPRE JÁ</button></a></center>

                    </div><!--produtos-box-->
                </div><!--flex-->
            </div><!--interface-->
        </section><!--especialidades-->

    </main>

    <script src="../js/carrosel.js"></script>





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