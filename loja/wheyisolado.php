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

    <br><br><br><br><br><br><br><br><br><br><br><br><br>


    <main>
        <div class="produtos">

            <div class="thumb-bar">
                <img src="../img/imgprod/wheyisolado.png" alt="Image 3" class="thumb" />
                <img src="../img/imgprod/wheyisotab.png" alt="Image 4" class="thumb" />
                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/wheyisolado.png" alt="Image 3" />

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
                            <h2>WHEY PROTEIN ISOLADO</h2>
                                <p>R$130,55</p>
                                <p><del>R$145,45</del></p>
                                <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>O Whey Protein Isolado da marca fictícia Alpha MT é a solução definitiva para atletas e entusiastas do fitness que buscam a mais pura e poderosa fonte de proteína de soro de leite. Este produto é projetado para oferecer o mais alto nível de pureza e benefícios para o crescimento muscular, recuperação e desempenho.</h3>
            <br><br>
            <h3>Características Principais:</h3>
            <ol>
                <li>
                    <bold>Pureza e Concentração Máximas:</bold> O Whey Protein Isolado Alpha MT é conhecido por sua pureza excepcional, com uma concentração de proteína superior, eliminando praticamente todos os carboidratos e gorduras, proporcionando a máxima eficácia por porção.
                </li>
                <li>
                    <bold>Perfil Aminoacídico Excepcional:</bold> Esta fórmula é rica em todos os aminoácidos essenciais, incluindo uma alta concentração de BCAAs (aminoácidos de cadeia ramificada), que são fundamentais para o crescimento muscular, a síntese de proteínas e a recuperação.
                </li>
                <li>
                    <bold>Absorção Rápida:</bold> O Whey Protein Isolado da Alpha MT é facilmente absorvido pelo corpo, fornecendo nutrientes essenciais aos músculos imediatamente após o consumo, tornando-o ideal para a recuperação pós-treino.
                </li>
                <li>
                    <bold>Versatilidade e Sabor Premium:</bold> Disponível em uma variedade de sabores deliciosos, este suplemento torna a ingestão de proteína uma experiência prazerosa e pode ser adaptado a várias receitas e combinações.
                <li>
                    <bold>Padrões de Qualidade Inigualáveis:</bold> A marca fictícia Alpha MT está comprometida com os mais rigorosos padrões de qualidade, garantindo que seu Whey Protein Isolado seja um produto de excelência, livre de impurezas e seguro para o consumo.
                </li>
            </ol>
            <br><br>
            <h3>Com o Whey Protein Isolado da Alpha MT, você está optando pelo auge da qualidade em proteína de soro de leite, projetada para atender às necessidades de atletas sérios e amantes do fitness que buscam os melhores resultados em seu treinamento. Este suplemento é essencial para a construção muscular, recuperação e manutenção de um estilo de vida saudável e ativo.</h3>
        </div>

        <div class="img-qualidade">
            <center>
                <img src="../img/imgprod/selos.png" alt="">
            </center>
        </div>

    </main>
    <br><br><br><br><br><br>
    <script src="../js/galery.js"></script>


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