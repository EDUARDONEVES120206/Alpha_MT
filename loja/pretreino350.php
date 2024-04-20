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
    <script src="../js/menu.js"></script>

    <main>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>

        <div class="produtos">

            <div class="thumb-bar">
                <img src="../img/imgprod/pretreino350.png" alt="Image 3" class="thumb" />
                <div class="imgtab"><img src="../img/imgprod/pretreinotab.png" alt="Image 4" class="thumb" /></div>
                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/pretreino350.png" alt="Image 3" />

                <div class="overlay"></div>
            </div>


            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <label for="sabor">Escolha um sabor:</label>
                            <br>
                            <select id="sabor" name="sabor">
                                <option value="vanila">Vanila</option>
                                <option value="chiclete">Chiclete</option>
                                <option value="grawberry">Grawberry</option>
                                <option value="frutasvermelhas">Frutas Vermelhas</option>
                                <option value="macaverde">Maçã Verde</option>
                            </select>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->

            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <h2>PRE-TREINO 350g</h2>
                            <p>R$135,66</p>
                            <p><del>R$140,99</del></p>
                            <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>O Pré-Treino Alpha MT é a solução ideal para atletas e entusiastas do fitness que buscam uma explosão de energia e foco antes de suas sessões de treinamento. Desenvolvido pela marca fictícia Alpha MT, este pré-treino é projetado para elevar o seu desempenho a patamares inéditos, fornecendo suporte físico e mental para os treinos mais desafiadores.</h3>
            <br><br>
            <h3>Características Principais:</h3>
            <ol>
                <li>
                    <bold>Energia Explosiva:</bold> O Pré-Treino Alpha MT contém uma combinação potente de ingredientes que proporcionam uma energia explosiva, permitindo que você se exercite com intensidade máxima.
                </li>
                <li>
                    <bold>Foco Mental Aprimorado:</bold> Além da energia, este pré-treino oferece um aumento significativo no foco mental, ajudando você a manter a concentração em seus objetivos de treinamento.
                </li>
                <li>
                    <bold>Aprimoramento do Desempenho:</bold> Com ingredientes cuidadosamente selecionados, o produto da Alpha MT ajuda a melhorar a resistência, força e capacidade de exercícios de alta intensidade.
                </li>
                <li>
                    <bold>Recuperação Mais Rápida:</bold> Alguns ingredientes auxiliam na recuperação, minimizando a fadiga muscular durante e após os treinos.
                <li>
                    <bold>Sabores Deliciosos:</bold> Disponível em uma variedade de sabores incríveis, o Pré-Treino Alpha MT torna o seu ritual pré-treino uma experiência saborosa e energizante.
                </li>
                <li>
                    <bold>Segurança e Qualidade:</bold> A marca fictícia Alpha MT é comprometida com a segurança e a qualidade de seus produtos, garantindo que seu Pré-Treino seja eficaz e livre de substâncias prejudiciais.
                </li>
            </ol>
            <br><br>
            <h3>O Pré-Treino Alpha MT é a chave para desbloquear todo o potencial do seu treinamento, proporcionando a energia e o foco necessários para alcançar seus objetivos de fitness. Com esta fórmula fictícia, você estará pronto para enfrentar os treinos mais desafiadores e conquistar resultados notáveis.</h3>
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