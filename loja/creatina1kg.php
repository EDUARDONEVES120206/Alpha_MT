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
                <img src="../img/imgprod/creatina1kg.png" alt="Image 3" class="thumb" />
                <img src="../img/imgprod/creatinatab.png" alt="Image 4" class="thumb" />
                <!-- Add more thumbnail images as needed -->
            </div>
            <div class="full-img">
                <img class="displayed-img" src="../img/imgprod/creatina1kg.png" alt="Image 3" />

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
                            </select>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->

            <section class="especialidades">
                <div class="interface">
                    <div class="flex">
                        <div class="produtos-box">
                            <h2>CREATINA 1kg</h2>
                            <p>R$110,10</p>
                            <p><del>R$129,99</del></p>
                            <center><a href="../loja/carrinho.php"><button class="btn btn-third"> ADICIONAR AO CARRINHO</button></a></center>
                        </div><!--produtos-box-->
                    </div><!--flex-->
                </div><!--interface-->
            </section><!--especialidades-->
        </div>
        </div>

        <div class="texto-produto">
            <h1>SOBRE:</h1>
            <h3>A Creatina Alpha MT é um suplemento de alta qualidade desenvolvido para atletas e entusiastas do fitness que desejam maximizar seu desempenho, força e resistência. Este produto de creatina fictícia é formulado para fornecer benefícios excepcionais em termos de energia e desempenho durante os treinos.</h3>
            <br><br>
            <h3>Características Principais:</h3>
            <ol>
                <li>
                    <bold>Pureza Superior:</bold> A Creatina Alpha MT é conhecida por sua pureza excepcional, garantindo que você esteja recebendo um produto de alta qualidade sem impurezas.
                </li>
                <li>
                    <bold>Aumento de Força e Potência:</bold> Este suplemento é projetado para ajudar a aumentar a força e a potência muscular, permitindo treinos mais intensos e produtivos.
                </li>
                <li>
                    <bold>Melhora da Resistência:</bold> A creatina é conhecida por aumentar a capacidade do corpo de realizar atividades de alta intensidade por mais tempo, ajudando a melhorar a resistência durante os exercícios.
                </li>
                <li>
                    <bold>Recuperação Acelerada:</bold> A Creatina Alpha MT também pode contribuir para uma recuperação mais rápida após o exercício, permitindo treinar com mais consistência.
                <li>
                    <bold>Fácil de Misturar:</bold> Esta creatina é formulada para ser facilmente misturada com água ou seu shake de proteína favorito, tornando a suplementação conveniente.
                </li>
                <li>
                    <bold>Testada em Laboratório:</bold> A marca fictícia Alpha MT realiza testes rigorosos em laboratório para garantir a qualidade e a eficácia de seu produto de creatina.
                </li>
            </ol>
            <br><br>
            <h3>A Creatina Alpha MT é a escolha ideal para aqueles que desejam levar seu desempenho atlético a um novo patamar. Se você procura um suplemento de creatina confiável para melhorar sua força, resistência e recuperação, a Creatina Alpha MT pode ser uma adição valiosa à sua rotina de treinamento.</h3>
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