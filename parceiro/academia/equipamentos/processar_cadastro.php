<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}

$host = "localhost";
$user = "root";
$senha = "prof@etec";
$banco = "alpha";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

$login = $_SESSION['login'];
$cnpj = $_SESSION['cpf_cnpj'];
$equipamento = $_POST['equipamento'];
$qnt = $_POST['qnt'];



if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $diretorioImagens = '../../../img/imgs/';
    $nomeArquivo = $_FILES['imagem']['name'];
    $caminhoCompleto = $diretorioImagens . $nomeArquivo;


    if (!is_dir($diretorioImagens)) {
        if (!mkdir($diretorioImagens, 0755, true)) {
            die("Erro ao criar o diretório de imagens.");
        }
    }

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
        // Insert equipment data into the database
        $sqlInserir = "INSERT INTO tbequipamento (caminho, cpf_cnpj, nome_equipamento, login_academia, qnt_equipamento) VALUES (?, ?, ?, ?, ?)";
        $stmtInserir = mysqli_prepare($conexao, $sqlInserir);

        if ($stmtInserir) {
            mysqli_stmt_bind_param($stmtInserir, "ssssi", $caminhoCompleto, $cnpj, $equipamento, $login, $qnt);
            $resultadoInserir = mysqli_stmt_execute($stmtInserir);

            if ($resultadoInserir) {
                echo "<script>alert('Inserção de imagem bem-sucedida!');window.location.href='cadastro_equipamento_academia.php';</script>";
            } else {
                echo "<script>alert('Erro ao inserir dados no banco de dados: " . mysqli_error($conexao) . "');window.location.href='cadastro_equipamento_academia.php';</script>";
            }

            mysqli_stmt_close($stmtInserir);
        } else {
            echo "<script>alert('Erro ao preparar a instrução de inserção: " . mysqli_error($conexao) . "');window.location.href='cadastro_equipamento_academia.php';</script>";
        }
    } else {
        echo "<script>alert('Erro ao mover a nova imagem para o diretório.');window.location.href='cadastro_equipamento_academia.php';</script>";
    }
} else {
    echo "<script>alert('Erro no upload da nova imagem. Erro: " . $_FILES['imagem']['error'] . "');window.location.href='cadastro_equipamento_academia.php';</script>";
}

mysqli_close($conexao);
?>
