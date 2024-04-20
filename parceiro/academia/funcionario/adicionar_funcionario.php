<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

$plano = $_SESSION['plano'];

require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$nome_academia = $_SESSION['nome'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se todas as variáveis do formulário estão definidas
    if (isset($_POST['nome'], $_POST['login'], $_POST['email'], $_POST['numero'], $_POST['palavra_chave'], $_POST['senha'])) {
        $nomeFuncionario = $_POST['nome'];
        $loginFuncionario = $_POST['login'];
        $emailFuncionario = $_POST['email'];
        $numeroFuncionario = $_POST['numero'];
        $palavra_chaveFuncionario = $_POST['palavra_chave'];
        $senhaFuncionario = $_POST['senha'];
        $dataHoraAtual = date("Y-m-d H:i:s");



        if ($plano == 2 || $plano == 3) {
            $sqlstring = "SELECT COUNT(*) AS num_logins FROM tbfuncionario WHERE login = ?";
            $stmt = mysqli_prepare($mysql->con, $sqlstring);
            mysqli_stmt_bind_param($stmt, "s", $loginFuncionario);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $num_logins);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);


            if ($num_logins > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('O login $loginFuncionario já está em uso. Escolha outro login.');window.location.href='gerenciar_funcionarios_academia.php';</script>"; // Alteração aqui para redirecionar para arquivo1.php
            } else {
                  $sqlstring = "SELECT COUNT(*) AS num_funcionarios FROM tbfuncionario WHERE academia = ?";
                $stmt = mysqli_prepare($mysql->con, $sqlstring);
                mysqli_stmt_bind_param($stmt, "s", $nome_academia);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $num_funcionarios);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);

                if (($plano == 2 && $num_funcionarios >= 1) || ($plano == 3 && $num_funcionarios >= 2)) {
                    echo "<script language='javascript' type='text/javascript'>alert('Você atingiu o limite máximo de funcionários permitidos para o seu plano.');window.location.href='gerenciar_funcionarios_academia.php';</script>"; // Alteração aqui para redirecionar para arquivo1.php
                } else {
                   
                    $sqlstring = "INSERT INTO tbfuncionario (nome, login, senha, email, numero, data_registro, palavra_chave, academia) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_prepare($mysql->con, $sqlstring);
                    mysqli_stmt_bind_param($stmt, "ssssssss", $nomeFuncionario, $loginFuncionario, $senhaFuncionario, $emailFuncionario, $numeroFuncionario, $dataHoraAtual, $palavra_chaveFuncionario, $nome_academia);
                    $result = mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);


                    if ($result) {
                        echo "<script language='javascript' type='text/javascript'>alert('Funcionário adicionado com sucesso!');window.location.href='gerenciar_funcionarios_academia.php';</script>"; // Alteração aqui para redirecionar para arquivo1.php
                    } else {
                        echo "<script language='javascript' type='text/javascript'>alert('Erro ao adicionar o funcionário. Por favor, tente novamente.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
                    }
                }
            }
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos do formulário devem ser preenchidos.');window.location.href='gerenciar_funcionarios_academia.php';</script>";
    }
}

$mysql->fechar();
?>