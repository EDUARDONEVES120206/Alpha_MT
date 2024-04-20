<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_SESSION['login'];

    $diretorio_destino = "../../../img/"; 

    if (!is_dir($diretorio_destino)) {
        mkdir($diretorio_destino, 0777, true);
    }

    if (isset($_FILES['nova_imagem']) && $_FILES['nova_imagem']['error'] === UPLOAD_ERR_OK) {
        $nome_arquivo = $_FILES['nova_imagem']['name'];
        $caminho_temporario = $_FILES['nova_imagem']['tmp_name'];

        $nome_arquivo_unico = uniqid() . '_' . $nome_arquivo;

        $caminho_final = $diretorio_destino . $nome_arquivo_unico;
        if (move_uploaded_file($caminho_temporario, $caminho_final)) {
            require_once('../../../conexao/conexao.php');
            $mysql = new BancodeDados();
            $mysql->conecta();

            $sql = "SELECT caminho FROM tbimagens_acad_funcionario WHERE login = '$login'";
            $resultado = $mysql->executaSQL($sql);

            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $sql_update = "UPDATE tbimagens_acad_funcionario SET caminho = '$caminho_final' WHERE login = '$login'";
            } else {
                $sql_update = "INSERT INTO tbimagens_acad_funcionario (login, caminho) VALUES ('$login', '$caminho_final')";
            }

            $resultado_update = $mysql->executaSQL($sql_update);

            $mysql->fechar();

            if ($resultado_update) {
                echo "<script language='javascript' type='text/javascript'>alert('Upload de imagem de perfil concluído com sucesso!');window.location.href='conta.php';</script>";
                exit;
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar a imagem de perfil no banco de dados. Tente novamente.');window.location.href='conta.php';</script>";
                exit;
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao mover o arquivo de imagem para o diretório de destino. Tente novamente.');window.location.href='conta.php';</script>";
            exit;
        }
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao fazer o upload da nova imagem. Verifique se o arquivo enviado é uma imagem válida.');window.location.href='conta.php';</script>";
        exit;
    }
} else {
    header("Location: conta.php");
    exit;
}
?>
