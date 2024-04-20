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


</nav><br>
<div class="row">
        <div class="col-xl-9 col-lg-8 h-100">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">&nbspEditar Funcionário
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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $funcionarioId = $_GET['id'];


    $sqlstring = "SELECT * FROM tbfuncionario WHERE id = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    mysqli_stmt_bind_param($stmt, "i", $funcionarioId);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {

?>
        <h2>&nbsp&nbsp&nbspEditar Funcionário</h2>
        <form action='atualizar_funcionario.php' method='POST'>

        
            <input class="label-input" type='hidden' name='id' value='<?php echo $dados['id']; ?>'>
            <label class="label-input" for='nome'>Nome do Funcionário:<i class='far fa-user icon-modify'></i>
            <input class="label-input" type='text' name='nome' value='<?php echo $dados['nome']; ?>' required><br></label>
            <label class="label-input" for='login'>Login do Funcionário:<i class='far fa-user  icon-modify'></i>
            <input class="label-input" type='text' name='login' value='<?php echo $dados['login']; ?>' required><br></label>
            <label class="label-input" for='email'>Email:<i class='fas fa-envelope icon-modify'></i>
            <input class="label-input" type='email' name='email' value='<?php echo $dados['email']; ?>' required><br></label>
            <label class="label-input" for='numero'>Telefone:<i class='fas fa-phone icon-modify'></i>
            <input class="label-input" type='text' name='numero' value='<?php echo $dados['numero']; ?>' required><br></label>
            <label class="label-input" for='senha'>Senha:<i class='fas fa-lock icon-modify'></i>
            <input class="label-input" type='text' name='senha' value='<?php echo $dados['senha']; ?>' required><br></label>
            <label class="label-input" for='palavra_chave'>Palavra Chave:<i class='fas fa-lock icon-modify'></i>
            <input class="label-input" type='text' name='palavra_chave' value='<?php echo $dados['palavra_chave']; ?>' required><br></label>
            <center><input class="btn btn-second" type='submit' value='Salvar'></center>
        </form>
<?php
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Funcionário não encontrado.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
;
    }
} else {
    echo "<script language='javascript' type='text/javascript'>alert('Funcionário não encontrado.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
}


$mysql->fechar();
?>
<a class="btn btn-second" href="gerenciar_funcionarios_academia.php">Voltar</a><br>
</div>
        </div>
        <script src="../../../js/menu.js"></script>
</body>
</html>
