<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/sb-admin-2.css">
    <link rel="stylesheet" href="../../../css/style19.css">
    <link rel="stylesheet" href="../../../css/style9.css">
    <link rel="stylesheet" href="../../../css/style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
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
            <li class="item-menu">
                <a href="../perfil/gerenciar_plano_academia.php">
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
    <br> <br>
    <div class="row">
        <div class="col-xl-9 col-lg-8 h-100">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Formularios de Cadastro
                    </h6>
                </div>

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

                if ($plano == 1) {
                    echo "<h1>Olá, $nome!</h1> ";
                    echo "Você faz parte do plano Básico Fitness.";
                    echo "<br>";
                    echo "Nele você não possui a capacidade de adicionar profissionais da sua academia para que eles possam gerenciar as fichas de treino.";

                } elseif ($plano == 2) {
                    echo "<h1>Olá, $nome!</h1> ";
                    echo "<center><h4 class='m-0 font-weight-bold text-primary'>  Você faz parte do plano Elite Fitness. </h4></center>";

                    echo "<p class='m-0 font-weight-bold text-primary'> &nbsp&nbsp&nbsp&nbsp Você pode adicionar 1 funcionário:</p>";


                    echo "<form action='adicionar_funcionario.php' method='POST'>"; // Alteração aqui, apontando para arquivo2.php
                    echo "<label class='label-input' for='nome'>Nome do Funcionário:
                            <i class='far fa-user icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='nome' required><br></label>";

                    echo "<label class='label-input' for='login'>Login do Funcionário:
                          <i class='far fa-user icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='login' required><br></label>";

                    echo "<label class='label-input' for='email'>Email:
                          <i class='fas fa-envelope icon-modify'></i>";
                    echo "<input class='label-input' type='email' name='email' required><br></label>";

                    echo "<label class='label-input' for='numero'>Telefone:
                          <i class='fas fa-phone icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='numero' required><br></label>";

                    echo "<label class='label-input' for='email'>Senha:
                          <i class='fas fa-envelope icon-modify'></i>";
                    echo "<input class='label-input' type='password' name='senha' required><br> </label>";

                    echo "<label class='label-input' for='palavra_chave'>Palavra Chave:
                        <i class='fas fa-lock icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='palavra_chave' required><br></label>";

                    echo "<center> <input type='submit' class='btn btn-second' value='Cadastrar'> </center>";
                    echo "</form>";

                } elseif ($plano == 3) {
                    echo "<h1>Olá, $nome!</h1> ";
                    echo "<center><h4 class='m-0 font-weight-bold text-primary'>  Você faz parte do plano Ultimate Fitness. </h4></center>";
                    echo "<p class='m-0 font-weight-bold text-primary'> &nbsp&nbsp&nbsp&nbsp Você pode adicionar até 2 funcionários:</p>";

                    echo "<form action='adicionar_funcionario.php' method='POST'>"; // Alteração aqui, apontando para arquivo2.php
                    echo "<label class='label-input' for='nome'>Nome do Funcionário:
                              <i class='far fa-user icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='nome' required><br></label>";

                    echo "<label class='label-input' for='login'>Login do Funcionário:
                            <i class='far fa-user icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='login' required><br></label>";

                    echo "<label class='label-input' for='email'>Email:
                            <i class='fas fa-envelope icon-modify'></i>";
                    echo "<input class='label-input' type='email' name='email' required><br></label>";

                    echo "<label class='label-input' for='numero'>Telefone:
                            <i class='fas fa-phone icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='numero' required><br></label>";

                    echo "<label class='label-input' for='palavra_chave'>Palavra Chave:
                        <i class='fas fa-lock icon-modify'></i>";
                    echo "<input class='label-input' type='text' name='palavra_chave' required><br></label>";

                    echo "<label class='label-input' for='senha'>Senha:
                            <i class='fas fa-envelope icon-modify'></i>";
                    echo "<input class='label-input' type='password' name='senha' required><br> </label>";

                    echo "<center> <input type='submit' class='btn btn-second' value='Cadastrar'> </center>";

                    echo "</form>";
                } else {
                    echo "<script language='javascript' type='text/javascript'>alert('Você precisa ter um plano, entre em contato com o SUPORTE!');window.location.href='../../parceria.php';</script>";
                }

                ?>
                <br>
                <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    Funcionários Cadastrados:</h2>

                <?php

                require_once('../../../conexao/conexao.php');
                $mysql = new BancodeDados();
                $mysql->conecta();


                $nome_academia = $_SESSION['nome'];


                if ($plano == 1) {
                    echo "Melhore seu plano para cadastrar funcionários, assim eles poderão gerenciar as fichas de treino do seu plano.";
                    echo "<br>";
                    echo "<a href='../perfil/gerenciar_plano_academia.php'> Melhorar agora </a>";
                    echo "<br>";
                }

                if ($plano == 2 || $plano == 3) { // Alteração aqui para incluir ambos os planos
                    $sqlstring1 = "SELECT * FROM tbfuncionario WHERE academia = '$nome_academia'  ORDER BY academia";
                    $query1 = @mysqli_query($mysql->con, $sqlstring1);

                    if ($query1) {

                        echo "<center><table id='customers'>";
                        echo "<tr><th>Nome Do Funcionario</th><th>Login do Funcionario</th><th>Email</th><th>Telefone</th><th>Academia</th><th>Senha</th><th>Palavra Chave</th><th>Foto</th><th>Alterar</th><th>Deletar</th></tr>";
                        echo "<div class='container22'>";
                        while ($dados1 = mysqli_fetch_array($query1)) {
                            echo "<tr>";
                            echo "<td>" . $dados1['nome'] . "</td>";
                            echo "<td>" . $dados1['login'] . "</td>";
                            echo "<td>" . $dados1['email'] . "</td>";
                            echo "<td>" . $dados1['numero'] . "</td>";
                            echo "<td>" . $dados1['academia'] . "</td>";
                            echo "<td>" . $dados1['senha'] . "</td>";
                            echo "<td>" . $dados1['palavra_chave'] . "</td>";


                            require_once("../../../conexao/conexao.php");
                            $login = $dados1['login'];
                            $mysql = new BancodeDados();
                            $mysql->conecta();
                            $sql = "SELECT caminho FROM tbimagens_acad_funcionario WHERE login = '$login'";
                            $resultado = $mysql->executaSQL($sql);
                            if ($resultado && mysqli_num_rows($resultado) > 0) {
                                $dados = mysqli_fetch_assoc($resultado);
                                $caminho = $dados['caminho'];
                                echo "<td><img src='$caminho' style='max-width: 100px; max-height: 100px; border-radius: 50%;'></td>";
                            } else {
                                echo "<td><img src='../../../img/semfoto.png' style='max-width: 100px; max-height: 100px; border-radius: 50%;'></td>";
                            }


                            echo "<td><a href='editar_funcionario.php?id=" . $dados1['id'] . "'>Alterar</td>";
                            echo "<td><a href='excluir_funcionario.php?id=" . $dados1['id'] . "'>Deletar</td>";
                            echo "</tr>";
                        }
                        echo "</table></center>";
                        $mysql->fechar();
                    } else {
                        echo "Erro ao consultar o banco de dados.";
                    }
                }

                ?>

                <br>
                <a class="btn btn-second" href="../home_academia.php">Voltar</a><br>
            </div>
        </div>
    </div>
    </div>
    <script src="../../../js/menu.js"></script>
</body>

</html>