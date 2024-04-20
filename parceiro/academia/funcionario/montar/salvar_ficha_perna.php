<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
    exit;
}

require_once("../../../../conexao/conexao.php");

$login_academia =
    $profissional =
    $profissional_numero =
    $profissional_email =
    $exercicio1 =
    $series1 =
    $repeticoes1 =
    $exercicio2 =
    $series2 =
    $repeticoes2 =
    $exercicio3 =
    $series3 =
    $repeticoes3 =
    $exercicio4 =
    $series4 =
    $repeticoes4 =
    $exercicio5 =
    $series5 =
    $repeticoes5 =
    $exercicio6 =
    $series6 =
    $repeticoes6 =
    $exercicio7 =
    $series7 =
    $repeticoes7 =
    $exercicio8 =
    $series8 =
    $observacao =
    $repeticoes8 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercicio1 = $_POST['exercicio1'];
    $series1 = $_POST['series1'];
    $repeticoes1 = $_POST['repeticoes1'];

    $exercicio2 = $_POST['exercicio2'];
    $series2 = $_POST['series2'];
    $repeticoes2 = $_POST['repeticoes2'];

    $exercicio3 = $_POST['exercicio3'];
    $series3 = $_POST['series3'];
    $repeticoes3 = $_POST['repeticoes3'];

    $exercicio4 = $_POST['exercicio4'];
    $series4 = $_POST['series4'];
    $repeticoes4 = $_POST['repeticoes4'];

    $exercicio5 = $_POST['exercicio5'];
    $series5 = $_POST['series5'];
    $repeticoes5 = $_POST['repeticoes5'];

    $exercicio6 = $_POST['exercicio6'];
    $series6 = $_POST['series6'];
    $repeticoes6 = $_POST['repeticoes6'];

    $exercicio7 = $_POST['exercicio7'];
    $series7 = $_POST['series7'];
    $repeticoes7 = $_POST['repeticoes7'];

    $exercicio8 = $_POST['exercicio8'];
    $series8 = $_POST['series8'];
    $repeticoes8 = $_POST['repeticoes8'];

    $observacao = $_POST['observacao'];

    $bancoDeDados = new BancodeDados();
    $bancoDeDados->conecta();

    $login_usuario = $_SESSION['login_usuario'];
    $nome_personal = $_SESSION['nome'];
    $telefone_personal = $_SESSION['numero'];
    $email_personal = $_SESSION['email'];

    if ($exercicio1 != "") {
        $sql1 = "INSERT INTO tbperna (login_usuario, nome_personal, telefone_personal, email_personal, exercicio1, series1, repeticoes1, exercicio2, series2, repeticoes2, exercicio3, series3, repeticoes3, exercicio4, series4, repeticoes4, exercicio5, series5, repeticoes5, exercicio6, series6, repeticoes6, exercicio7, series7, repeticoes7, exercicio8, series8, repeticoes8, observacao) VALUES ('$login_usuario', '$nome_personal', '$telefone_personal', '$email_personal', '$exercicio1', '$series1', '$repeticoes1', '$exercicio2', '$series2', '$repeticoes2', '$exercicio3', '$series3', '$repeticoes3', '$exercicio4', '$series4', '$repeticoes4', '$exercicio5', '$series5', '$repeticoes5', '$exercicio6', '$series6', '$repeticoes6', '$exercicio7', '$series7', '$repeticoes7', '$exercicio8', '$series8', '$repeticoes8', '$observacao')";
        if ($bancoDeDados->executaSQL($sql1)) {
            echo "<script language='javascript' type='text/javascript'>alert('Ficha de treino para pernas salva com sucesso!!');window.location.href='../montar_ficha.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, ocorreu um erro. Tente novamente!!');window.location.href='ficha_perna.php';</script>";
        }
    }
    $bancoDeDados->fechar();
} else {
    echo "Acesso inválido a esta página.";
}
?>
