<html>
<head>
<title>AlphaMT -  Usuário</title>
    <link rel="stylesheet" href="../css/styleParc.css">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="../img/logobranco.png">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
        exit;
    }

    require_once('../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $nome = $_SESSION['nome'];
    $plano = $_SESSION['plano'];

    echo "<br><div class='container2'>";
    if ($plano == 1) {
        echo "<h1 class='main__heading'>Olá, $nome!</h1>  <center> <img src='../img/mini_logo.png' alt='Logo' class='logo'> </center>";
        echo "<center><h2 class='card__heading'>Você faz parte do plano <span style='color: #B20B08FE'> Básico Fitness. </span>";
        echo "<br>";
        echo "Nele você não possui a capacidade de adicionar profissionais da sua academia para que eles possam gerenciar as fichas de treino.";
    }
    if ($plano == 2) {
        echo "<h1 class='main__heading'>Olá, $nome!   <img src='../img/mini_logo.png' alt='Logo' class='logo'></h1> ";
        echo "<center> <h2 class='card__heading'>Você faz parte do plano de <span style='color: #B20B08FE'> Elite Fitness.</span> </h2> </CENTER>";
        echo "<br>";
        echo "Nele você possui a capacidade de adicionar 1 profissional da sua academia para que ele possa gerenciar as fichas de treino.";
    }
    if ($plano == 3) {
        echo "<h1 class='main__heading'>Olá, $nome!</h1>   <img src='../img/mini_logo.png' alt='Logo' class='logo'> ";
        echo "Você faz parte do plano Premium Plus.";
        echo "<br>";
        echo "Nele você possui a capacidade de adicionar 2 profissionais da sua academia para que eles possam gerenciar as fichas de treino.";
    } else {
        "<script language='javascript' type='text/javascript'>alert('Você precisa ter um plano, entre em contato com o SUPORTE!');window.location.href='suporte.php';</script>";
    }
    echo "</div>";

    ?>
 <nav class="menu-lateral">

<div class="btn-expandir">
    <i class="bi bi-list" id="btn-exp"></i>
</div>

<ul>
    <li class="item-menu">
        <a href="home.php">
            <span class="icon"><i class="bi bi-house-door-fill"></i></span>
            <span class="txt-link">Inicio</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="academias.php">
            <span class="icon"><i class="bi bi-geo-alt"></i></span>
            <span class="txt-link">Academias</span>
        </a>
    </li>
    <li class="item-menu ativo">
        <a href="conta_usuario.php">
            <span class="icon"><i class="bi bi-person-circle"></i></span>
            <span class="txt-link">Conta</span>
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
    <main class="main flow">
        <h1 class="main__heading">Alterar Plano
            <span class="logo-container">
                <img src="../img/mini_logo.png" alt="Logo" class="logo">
            </span>
        </h1>
        <div class="main__cards cards">
            <div class="cards__inner">
                <div class="cards__card card">
                    <h2 class="card__heading">Basico Fitness</h2>
                    <p class="card__price">R$80,00</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Accesso há 1 academia</li>
                        <li>Suporte</li>
                        <li>Acessível e simples</li>
                    </ul>
                    <a href="#basic" class="card__cta cta">Assine</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Elite Fitness</h2>
                    <p class="card__price">R$100,00</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Accesso há 2 academia</li>
                        <li>Suporte</li>
                        <li>Desconto de 25% em nossas lojas parceiras e com profissionais parceiros.</li>
                    </ul>
                    <a href="#pro" class="card__cta cta">
                        Se torne Pro</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Premium Plus</h2>
                    <p class="card__price">R$120,00</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Accesso há 3 academia</li>
                        <li>Suporte</li>
                        <li>Desconto de 65% em nossas lojas e com os profissionais parceiros</li>
                        <li>Acesso a todos os treinos premium</li>
                        <li>Conteúdo exclusivo e acesso antecipado a novos recursos</li>
                    </ul>
                    <a href="#ultimate" class="card__cta cta">Se torne Ultimate</a>
                </div>
            </div>

            <div class="overlay cards__inner"></div>
        </div>
    </main>

    <div class="container2">
        <h2>Alterar Plano</h2>
        <form action="processar_alteracao_plano.php" method="post">
            <font color="white">
                <div class="box">
                    <select name="novo_plano">
                        <option value="1">Plano Básico Fitness</option>
                        <option value="2">Plano de Elite Fitness</option>
                        <option value="3">Plano Premium Plus</option>
                    </select>

                    <input type="submit" name="alterar" value="Alterar Plano">
                    <a href="conta_usuario.php" class="card__cta cta2">Voltar</a>
                </div>
            
        </form>
    </div>



    <br>
    <br>
    .


    <script src="../js/menu.js"></script>
    <script src="../js/pagamento.js"></script>
</body>

</html>