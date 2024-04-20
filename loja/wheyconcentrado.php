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
        <br><br><br><br><br><br><br><br>

        <br><br><br><br><br><br><br><br> <br><br><br><br><br>



        <div class="produtos">

            <div class="thumb-bar">
                <img src="../img/imgprod/wheyconcentrado.png" alt="Image 3" class="thumb" />
                <img src="../img/imgprod/wheycontab.png" alt="Image 4" class="thumb" />
                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/wheyconcentrado.png" alt="Image 3" />

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
                        <h3>WHEY PROTEIN CONCENTRADO</h3>
                        <p>R$90,00</p>
                        <p><del>R$105,99</del></p>
                            <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>O Whey Protein Concentrado da marca fictícia Alpha MT é um suplemento de proteína de alta qualidade projetado para atender às necessidades de atletas e entusiastas do fitness que buscam uma fonte confiável de proteína de soro de leite. Este produto é uma escolha inteligente para impulsionar o crescimento muscular, a recuperação e a manutenção de um estilo de vida saudável.</h3>
            <br><br>
            <h3>Características Principais:</h3>
            <ol>
                <li>
                    <bold>Proteína de Qualidade:</bold> O Whey Protein Concentrado Alpha MT oferece uma concentração significativa de proteína de soro de leite, proporcionando um aporte substancial de aminoácidos essenciais para promover o crescimento e a reparação muscular.
                </li>
                <li>
                    <bold>Perfil de Aminoácidos Essenciais:</bold> Esta fórmula é rica em aminoácidos essenciais, incluindo BCAAs, que são fundamentais para o aumento da síntese de proteínas e a redução da fadiga muscular, ajudando a otimizar o desempenho atlético.
                </li>
                <li>
                    <bold>Digestibilidade Aprimorada:</bold> O Whey Protein Concentrado da Alpha MT é formulado para ser de fácil digestão, permitindo que seu corpo absorva rapidamente os nutrientes necessários para um desempenho ideal.
                </li>
                <li>
                    <bold>Versatilidade de Uso:</bold> Pode ser consumido como um shake pós-treino ou integrado a receitas e alimentos para aumentar a ingestão de proteína em qualquer momento do dia.
                </li>
                <li>
                    <bold>Sabor Delicioso:</bold> Disponível em uma variedade de sabores incríveis, o Whey Protein Concentrado da Alpha MT torna a suplementação uma experiência saborosa e personalizada.
                </li>
                <li>
                    <bold>Controle de Qualidade Superior:</bold> A marca fictícia Alpha MT é comprometida com rigorosos padrões de qualidade, assegurando que seu Whey Protein Concentrado seja livre de impurezas e atenda às expectativas dos consumidores mais exigentes.
                </li>
            </ol>
            <br><br>
            <h3>Com o Whey Protein Concentrado da Alpha MT, você tem a garantia de uma fonte confiável de proteína para impulsionar seu desempenho, construir músculos e apoiar seus objetivos de fitness. Este suplemento é uma adição valiosa para qualquer rotina de treinamento e nutrição.</h3>
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