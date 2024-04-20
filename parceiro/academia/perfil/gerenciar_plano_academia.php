<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - Academia</title>
    <link rel="stylesheet" href="../../../css/styleParc.css">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
        exit;
    }

    require_once('../../../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $nome = $_SESSION['nome'];
    $plano = $_SESSION['plano'];

    echo "<br><div class='container2'>";
    if ($plano == 1) {
        echo "<h1 class='main__heading'>Olá, $nome! <img src='../../../img/mini_logo.png' alt='Logo' class='logo'></h1> ";
        echo "<center><h2 class='card__heading'>Você faz parte do plano <span style='color: #B20B08FE'> Básico Fitness. </span>";
        echo "<br>";
        echo "Nele você não possui a capacidade de adicionar profissionais da sua academia para que eles possam gerenciar as fichas de treino.";
    }
    if ($plano == 2) {
        echo "<h1 class='main__heading'>Olá, $nome!   <img src='../../../img/mini_logo.png' alt='Logo' class='logo'></h1> ";
        echo "<center> <h2 class='card__heading'>Você faz parte do plano de <span style='color: #B20B08FE'> Elite Fitness.</span> </h2> </CENTER>";
        echo "<br>";
        echo "Nele você possui a capacidade de adicionar 1 profissional da sua academia para que ele possa gerenciar as fichas de treino.";
    }
    if ($plano == 3) {
        echo "<h1 class='main__heading'>Olá, $nome!   <img src='../../../img/mini_logo.png' alt='Logo' class='logo'></h1> ";
        echo "<center> <h2 class='card__heading'>Você faz parte do plano <span style='color: #B20B08FE'> Premium Plus.</span> </h2> </CENTER>";
        echo "<br>";
        echo "Nele você possui a capacidade de adicionar 2 profissionais da sua academia para que eles possam gerenciar as fichas de treino.";
    } else {
        "<script language='javascript' type='text/javascript'>alert('Você precisa ter um plano, entre em contato com o SUPORTE!');window.location.href='../../../fechar_sessao.php';</script>";
    }
    echo "</div>";

    ?>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>

            <li class="item-menu">
                <a href="../home_academia.php">
                    <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../perfil/perfil_academia.php">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Perfil</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../equipamentos/cadastro_equipamento_academia.php">
                    <span class="icon"><i class="fas fa-dumbbell"></i></span>
                    <span class="txt-link">Equipamentos</span>
                </a>
            </li>
            <li class="item-menu ativo">
                <a href="gerenciar_plano_academia.php">
                    <span class="icon"><i class="bi bi-folder"></i></span>
                    <span class="txt-link">Plano</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Suporte</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../../../fechar_sessao.php">
                    <span class="icon"><i class="bi bi-door-open"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>
        </ul>

    </nav>
    <main class="main flow">
        <h1 class="main__heading">Alterar Plano
            <span class="logo-container">
                <img src="../../../img/mini_logo.png" alt="Logo" class="logo">
            </span>
        </h1>
        <div class="main__cards cards">
            <div class="cards__inner">
                <div class="cards__card card">
                    <h2 class="card__heading">Básico Fitness</h2>
                    <p class="card__price">Taxa mensal: 20%</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Suporte</li>
                        <li>Acessível e simples</li>
                        
                    </ul>
                    <a href="#basic" class="card__cta cta">Assine</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Elite Fitness</h2>
                    <p class="card__price">Taxa mensal: 25%</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Suporte</li>
                        <li>1 Profissional para realização das fichas</li>
                        
                        <li>Calendário Mensal</li>
                    </ul>
                    <a href="#pro" class="card__cta cta">
                        Assine</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Premium Plus</h2>
                    <p class="card__price">Taxa mensal: 30%</p>
                    <ul role="list" class="card__bullets flow">
                       <li>Suporte</li>
                        <li>2 profissionais para realização das fichas</li>
                        
                        <li>Calendário Mensal</li>
                        <li>Conteúdo exclusivo e acesso antecipado a novos recursos</li>
                    </ul>
                    <a href="#ultimate" class="card__cta cta">Assine</a>
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
                    <a href="../home_academia.php" class="card__cta cta2">Voltar</a>
                </div>
            
        </form>
    </div>



    <br>
    <br>
    .


    <script src="../../../js/menu.js"></script>
    <script src="../../../js/pagamento.js"></script>
</body>

</html>