<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit();
}

$host = "localhost"; // Seu host
$user = "root";      // Seu usuário do banco de dados
$senha = "prof@etec";          // Sua senha do banco de dados
$banco = "alpha";     // Nome do banco de dados

// Conectar ao banco de dados
$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

$login = $_SESSION['login'];
$plano = $_SESSION['plano'];

// Verificar se o usuário já possui uma imagem no banco de dados
$sqlVerificar = "SELECT caminho FROM tbimagens_acad WHERE login = '$login'";
$resultadoVerificar = mysqli_query($conexao, $sqlVerificar);

if ($resultadoVerificar && mysqli_num_rows($resultadoVerificar) > 0) {
    // Usuário já possui uma imagem, realizar atualização
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Diretório onde as imagens serão armazenadas
        $diretorioImagens = '../../../img/imgs/';

        // Nome do arquivo da imagem
        $nomeArquivo = $_FILES['imagem']['name'];

        // Caminho completo para a imagem
        $caminhoCompleto = $diretorioImagens . $nomeArquivo;

        // Move a nova imagem para o diretório de imagens
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            // Atualiza o caminho da imagem no banco de dados
            $sqlAtualizar = "UPDATE tbimagens_acad SET caminho = '$caminhoCompleto' WHERE login = '$login'";
            $resultadoAtualizar = mysqli_query($conexao, $sqlAtualizar);

            if ($resultadoAtualizar) {
                echo "<script language='javascript' type='text/javascript'>alert('Atualização de imagem bem-sucedida!');window.location.href='perfil_academia.php';</script>";
            } else {
                echo"<script language='javascript' type='text/javascript'>alert('Erro ao atualizar caminho da imagem no banco de dados: ' . mysqli_error($conexao)');window.location.href='perfil_academia.php';</script>";
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao mover a nova imagem para o diretório.');window.location.href='perfil_academia.php';</script>";
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro no upload da nova imagem.');window.location.href='perfil_academia.php';</script>";

    }
} else {
    // Usuário não possui uma imagem, realizar inserção
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Diretório onde as imagens serão armazenadas
        $diretorioImagens = '../../../img/imgs/';

        // Nome do arquivo da imagem
        $nomeArquivo = $_FILES['imagem']['name'];

        // Caminho completo para a imagem
        $caminhoCompleto = $diretorioImagens . $nomeArquivo;

        // Move a nova imagem para o diretório de imagens
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoCompleto)) {
            // Insira o caminho da imagem no banco de dados
            $sqlInserir = "INSERT INTO tbimagens_acad (caminho, login) VALUES ('$caminhoCompleto', '$login')";
            $resultadoInserir = mysqli_query($conexao, $sqlInserir);

            if ($resultadoInserir) {
                echo "<script language='javascript' type='text/javascript'>alert('Inserção de imagem bem-sucedida!');window.location.href='perfil_academia.php';</script>";

            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao inserir caminho da imagem no banco de dados: ' . mysqli_error($conexao)');window.location.href='perfil_academia.php';</script>";
 
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao mover a nova imagem para o diretório.');window.location.href='perfil_academia.php';</script>";
 
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro no upload da nova imagem.');window.location.href='perfil_academia.php';</script>";
    }
}

mysqli_close($conexao);
?>
