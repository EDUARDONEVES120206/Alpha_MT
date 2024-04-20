<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_parceria = $_GET['id_parceria'];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $cpf_cnpj = $_POST["cpf_cnpj"];
    $email = $_POST["email"];
    $tipo = $_POST["tipo"];
    $senha = $_POST["senha"];

    require_once('../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $sql_inserir = "INSERT INTO tbparceiro (nome, login, cpf_cnpj, email, tipo, senha) VALUES ('$nome', '$login', '$cpf_cnpj', '$email', '$tipo', '$senha')";
    $inserir = mysqli_query($mysql->con, $sql_inserir);

    if ($inserir) {
        header("Location: pedidos_parceiros.php");
        exit;
    } else {
        echo "Erro ao inserir detalhes na tabela tbparceiro.";
    }

    $mysql->fechar();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - ADM </title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/style19.css" rel="stylesheet">
    <link href="../css/style4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adm.php">
            <i><img src="../img/logo.png" height="100px" widgh="100px"></i>

            <div class="sidebar-brand-text mx-3">AlphaMt<sup>GYM</sup></div>
        </a>




        <hr class="sidebar-divider my-0">


        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>

                <span>Painel de Controle</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Barra de Acessibilidade
        </div>


        <li class="nav-item">
            <a class="nav-link collapsed" href="controle_usuario.php" rel="noreferrer noopener nofollow"
                data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Usuarios</span>
            </a>

        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="controle_parceiros.php" rel="noreferrer noopener nofollow">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Parceiros</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:history.go(-1)">
                <i class="fas fa-sign-out-alt"></i>
                <span>Voltar</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="../fechar_sessao.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair</span></a>
        </li>



    </ul>
    <div class="col-xl-8 col-lg-7" style="margin-left: 300px; margin-top: -1000px;">
        <br>
        <div class="card shadow mb-4"><br>
            <div class="card-header py-3">
              <h1>Formulário de Aceitação de Parceria</h1>
            </div>
            
            <form method="post" action="aceitar_parceria_action.php">
                <label class="label-input" for="nome">Nome:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="nome" required><br></label>

                <label class="label-input" for="login">Nome de Usuario:
                    <input class="label-input" type="text" name="login" required><br></label>

                <label class="label-input" for="telefone">Telefone:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="telefone" required><br></label>

                <label class="label-input" for="cpf_cnpj">CPF/CNPJ:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="cpf_cnpj" required><br></label>

                <label class="label-input" for="cidade">Cidade:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="cidade" required><br></label>

                <label class="label-input" for="bairro">Bairro:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="bairro" required><br></label>

                <label class="label-input" for="rua">Rua:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="rua" required><br></label>

                <label class="label-input" for="numero">Numero:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="numero" required><br></label>

                <label class="label-input" for="cep">Cep:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="cep" required><br></label>

                <label class="label-input" for="email">Email:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="email" name="email" required><br></label>



                <label class="label-input" for="senha">Senha:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="password" name="senha" required><br></label>

                <label class="label-input" for="palavra_chave">Palavra Chave:
                    &nbsp;&nbsp;&nbsp;
                    <input class="label-input" type="text" name="palavra_chave" required><br></label>

                <label class="label-input" for="tipo">Tipo:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="tipo" id="tipo">
                        <option value="profissionais">Profissional</option>
                        <option value="loja">Loja</option>
                        <option value="academia">Academia</option>
                    </select></label>


                <label class="label-input" for="plano">Plano:
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="plano" id="" plano>
                        <option value="1">Plano Básico Fitness</option>
                        <option value="2">Plano de Elite Fitness</option>
                        <option value="3">Plano Premium Plus</option>
                    </select><br></label>

                <input type="hidden" name="id_parceria" value="<?php echo $_GET['id_parceria']; ?>">


                <center> <input class="btn btn-second" type="submit" value="Enviar"> </center>
            </form>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>


</body>

</html>