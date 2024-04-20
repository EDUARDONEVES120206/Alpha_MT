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
    <script src="../js/menu.js"></script>

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
                <i class="bi bi-list" id="btn-exp"></i>
            </div>
        </div><!--inteface-->
    </header>

    <main>
        <br><br><br><br><br><br><br><br> <br><br><br><br><br>



        <div class="produtos">

            <div class="thumb-bar">
                <img src="../img/imgprod/mediumwhey.png" alt="Image 1" class="thumb" />
                <img src="../img/imgprod/mediumwheytab.png" alt="Image 2" class="thumb" />
                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/mediumwhey.png" alt="Image 1" />

                <div class="overlay"></div>
            </div>


            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <label for="sabor">Escolha um sabor:</label>
                            <br>
                            <select id="sabor" name="sabor">
                                <option value="chocolate">Chocolate</option>
                                <option value="bunilha">Baunilha</option>
                                <option value="morango">Morango</option>
                                <option value="cookies">Cookies</option>
                                <option value="cocada">Cocada</option>
                            </select>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->

            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <h3>Medium Whey</h3>
                            <p>R$55,99</p>
                            <p><del>R$63,90</del></p>
                            <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>O "Medium Whey Protein" da marca fictícia Alpha MT é uma alternativa inovadora e poderosa ao já consagrado. Este produto foi desenvolvido para atender às necessidades dos atletas e entusiastas do fitness que buscam uma proteína de alta qualidade para maximizar seu desempenho e recuperação.</h3>
            <br><br>
            <h3>Características principais do Medium Whey Protein Alpha MT:</h3>
            <ol>
                <li>
                    <bold>Concentração de Proteína:</bold> O "Medium Whey Protein" da Alpha MT oferece uma concentração robusta de proteína de soro de leite, para apoiar o crescimento e a reparação muscular.
                </li>
                <li>
                    <bold>Perfil de Aminoácidos:</bold> Esta fórmula contém um perfil de aminoácidos completo, incluindo BCAAs, que ajudam a estimular a síntese de proteínas e a reduzir a fadiga muscular, proporcionando resultados notáveis.
                </li>
                <li>
                    <bold>Digestibilidade Aprimorada:</bold> O Medium Whey Protein da Alpha MT é formulado para promover uma digestão suave e uma absorção eficaz, o que é crucial para otimizar a nutrição pré e pós-treino.
                </li>
                <li>
                    <bold>Variedade de Sabores:</bold> Assim como o Medium Whey da Growth, o produto fictício da Alpha MT está disponível em uma ampla gama de sabores deliciosos, tornando a suplementação uma experiência saborosa e personalizada.
                </li>
                <li>
                    <bold>Qualidade Superior:</bold> A Alpha MT mantém um compromisso inabalável com padrões de qualidade excepcionais, garantindo que seu "Medium Whey Protein" seja um produto confiável e livre de impurezas.
                </li>
            </ol>
            <br><br>
            <h3>Se você busca uma alternativa, o Medium Whey Protein da Alpha MT é uma excelente escolha para alcançar os mesmos resultados de qualidade e desempenho. Ele atende às expectativas dos atletas e entusiastas do fitness em busca do melhor em nutrição esportiva.</h3>
        </div>

        <div class="img-qualidade">
            <center>
                <img src="../img/imgprod/selos.png" alt="">
            </center>
        </div>

    </main>
    <br><br><br><br><br><br>



    <div class="interface">
        <footer>
            <div class="interface">
                <div class="copyright">
                    &copy; 2023 I.T.S.A.S. Todos os direitos reservados.
                </div>
            </div>
        </footer>
        <script src="../js/galery.js"></script>

</body>

</html>