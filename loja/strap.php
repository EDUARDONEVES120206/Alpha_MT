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
                <img src="../img/imgprod/strap1.png" alt="Image 3" class="thumb" />

                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/strap1.png" alt="Image 3" />

                <div class="overlay"></div>
            </div>


            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <label for="tamanho">Escolha um tamanho:</label>
                            <br>
                            <select id="tamanho" name="tamanho">
                                <option value="unico">Único</option>
                            </select>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->

            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <h2>Strap Academia ALPHA MT</h2>
                            <p>50,00</p>
                            <p><del>65,50</del></p>
                            <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>Os straps de treinamento da marca fictícia Alpha MT são uma ferramenta essencial para atletas e entusiastas do fitness que desejam aprimorar seu desempenho durante exercícios de levantamento de peso, como deadlifts e pull-ups. Estes straps foram projetados para proporcionar uma aderência segura e confiável, permitindo que você alcance novos patamares de força e resistência.</h3>
            <br><br>
            <h3>Características Principais:</h3>
            <ol>
                <li>
                    <bold>Aderência Superior:</bold> Os straps Alpha MT oferecem uma aderência superior que permite segurar e levantar pesos pesados com facilidade, sem que a barra ou os halteres escapem das mãos.
                </li>
                <li>
                    <bold>Construção Durável:</bold> Fabricados com materiais resistentes e duráveis, os straps são projetados para suportar treinos intensos e durar por muitos exercícios.
                </li>
                <li>
                    <bold>Fecho Seguro:</bold> Equipados com fechos de segurança, os straps permanecem firmemente no lugar, garantindo sua segurança durante o treino.
                </li>
                <li>
                    <bold>Fácil de Transportar:</bold> Podem ser usados para uma variedade de exercícios, desde levantamento de peso até exercícios de tração e outros movimentos que exigem uma aderência sólida.
                <li>
                    <bold>Design Ergonômico:</bold> Compactos e leves, os straps Alpha MT são fáceis de transportar, tornando-os ideais para uso em academias ou ao ar livre.
                </li>
            </ol>
            <br><br>
            <h3>Se você é um levantador de peso, um fisiculturista ou alguém que deseja melhorar seu desempenho nos exercícios de tração, os straps de treinamento Alpha MT são a escolha perfeita. Eles oferecem uma aderência sólida e segura, permitindo que você se concentre no desenvolvimento de sua força e resistência durante os treinos.</h3>
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