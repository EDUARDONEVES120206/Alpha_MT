<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit();
}

$host = "localhost"; 
$user = "root";      
$senha = "prof@etec";        
$banco = "alpha";   

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, algo não esta certo. Entre em contato com o suporte!!');window.location.href='home.php';</script>";
}

$login = $_SESSION['login'];
$plano = $_SESSION['plano'];

$sqlVerificar = "SELECT caminho FROM tbimagens_usuario WHERE login = '$login'";
$resultadoVerificar = mysqli_query($conexao, $sqlVerificar);

if ($resultadoVerificar && mysqli_num_rows($resultadoVerificar) > 0) {
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $diretorioImagens = '../img/imgs/';

        $nomeArquivo = $_FILES['imagem']['name'];

        $caminhoCompleto = $diretorioImagens . $nomeArquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            $sqlAtualizar = "UPDATE tbimagens_usuario SET caminho = '$caminhoCompleto' WHERE login = '$login'";
            $resultadoAtualizar = mysqli_query($conexao, $sqlAtualizar);

            if ($resultadoAtualizar) {
                echo "<script language='javascript' type='text/javascript'>alert('Atualização de imagem bem-sucedida!');window.location.href='conta_usuario.php';</script>";
            } else {
                echo"<script language='javascript' type='text/javascript'>alert('Erro ao atualizar caminho da imagem no banco de dados: ' . mysqli_error($conexao)');window.location.href='conta_usuario.php';</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao mover a nova imagem para o diretório.');window.location.href='conta_usuario.php';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro no upload da nova imagem.');window.location.href='conta_usuario.php';</script>";

    }
} else {
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $diretorioImagens = '../img/imgs/';

        $nomeArquivo = $_FILES['imagem']['name'];

        $caminhoCompleto = $diretorioImagens . $nomeArquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            $sqlInserir = "INSERT INTO tbimagens_usuario (caminho, login) VALUES ('$caminhoCompleto', '$login')";
            $resultadoInserir = mysqli_query($conexao, $sqlInserir);

            if ($resultadoInserir) {
                echo "<script language='javascript' type='text/javascript'>alert('Inserção de imagem bem-sucedida!');window.location.href='conta_usuario.php';</script>";

            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao inserir caminho da imagem no banco de dados: ' . mysqli_error($conexao)');window.location.href='conta_usuario.php';</script>";
 
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao mover a nova imagem para o diretório.');window.location.href='conta_usuario.php';</script>";
         }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro no upload da nova imagem.');window.location.href='conta_usuario.php';</script>";
    }
}

mysqli_close($conexao);
?>
