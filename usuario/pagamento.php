<html>
<head>
<title>AlphaMT -  Usuário</title>
    <link rel="stylesheet" href="../css/styleParc.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
</head>

<body>
    <?php
    session_start();

    $pnome = $_POST['nome'];
    $plogin = $_POST['login'];
    $pcpf = $_POST['cpf'];
    $ppalavra_chave = $_POST['palavra_chave'];
    $psenha = $_POST['senha'];

    require_once('../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    include('conectar.php');
    function validarCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : (11 - $resto);

        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : (11 - $resto);

        if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
            return false;
        }

        return true;
    }

    if (empty($pcpf) || !validarCPF($pcpf)) {
        echo "<script language='javascript' type='text/javascript'>alert('CPF inválido ou em branco. Verifique o CPF digitado.');window.location.href='entrar.php'</script>";
    }
    if (!isset($_POST['aceitar_termos'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Aceite os termos de uso para prosseguir.');window.location.href='entrar.php'</script>";
    } else {
        $sql = "SELECT * FROM tbusuario WHERE login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $plogin);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script language='javascript' type='text/javascript'>alert('Este login já existe. Escolha outro login.');window.location.href='entrar.php'</script>";
        } else {
            $sql = "SELECT * FROM tbusuario WHERE cpf = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $pcpf);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('Este CPF já existe. Escolha outro CPF.');window.location.href='entrar.php'</script>";
            } else {
                if (empty($pnome) || empty($plogin) || empty($ppalavra_chave) || empty($psenha)) {
                    echo "<script language='javascript' type='text/javascript'>alert('Tem campo em branco');window.location.href='entrar.php'</script>";
                } else {
                    $_SESSION['nome'] = $pnome;
                    $_SESSION['login'] = $plogin;
                    $_SESSION['cpf'] = $pcpf;
                    $_SESSION['palavra_chave'] = $ppalavra_chave;
                    $_SESSION['senha'] = $psenha;
                }
            }
        }
    }

    ?>
    <main class="main flow">
        <h1 class="main__heading">Planos Disponiveis
            <span class="logo-container">
                <img src="../img/mini_logo.png" alt="Logo" class="logo">
            </span>
        </h1>
        <br>
        <div class="main__cards cards">
            <div class="cards__inner">
                <div class="cards__card card">
                    <h2 class="card__heading">Plano Básico Fitness</h2>
                    <p class="card__price">80,00R$</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Accesso há 1 academia</li>
                        <li>Suporte</li>
                        <li>Acessível e simples</li>
                    </ul>
                    <a href="#basic" class="card__cta cta">Assine</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Plano de Elite Fitness</h2>
                    <p class="card__price">100,00R$</p>
                    <ul role="list" class="card__bullets flow">
                        <li>Accesso há 2 academia</li>
                        <li>Suporte</li>
                        <li>Desconto de 25% em nossas lojas parceiras e com profissionais parceiros.</li>
                    </ul>
                    <a href="#pro" class="card__cta cta">
                        Se torne Pro</a>
                </div>

                <div class="cards__card card">
                    <h2 class="card__heading">Plano Premium Plus</h2>
                    <p class="card__price">120,00R$</p>
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


    <div class="card-content">
    </div>
    <form action="cadastro_action.php" method="POST">
        <font color="white">
            <center> <label for="plano">Escolha um plano:</label>
        </font>
        <div class="box">
            <select name="plano" id="plano">
                <option value="1">Plano Básico Fitness</option>
                <option value="2">Plano de Elite Fitness</option>
                <option value="3">Plano Premium Plus</option>
            </select>
        </div>
        </center>
        </div>
        <br>
        <div class="container2">
            <center> Qual seu email?
                <label><input type="text" name="email" id="email" placeholder="Email"></label><br>

                <input class="card__cta cta" type="submit" name="cadastro" value="Cadastrar">
            </center>
    </form>
    </div>

    <br>
    <script src="../js/pagamento.js"></script>

</BODY>

</HTML>