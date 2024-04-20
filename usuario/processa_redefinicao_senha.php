<?php
session_start();
$maxTentativas = 3; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tentativas = isset($_SESSION["tentativas"]) ? $_SESSION["tentativas"] : 0;

    if ($tentativas >= $maxTentativas) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Você excedeu o número máximo de tentativas de redefinição de senha. Entre em contato com o suporte.');window.location.href='../contato.php';
            </script>";
        exit();
    }

    $login = $_POST["login"];
    $palavra_chave = $_POST["palavra_chave"];
    $nova_senha = $_POST["nova_senha"];

    include('conectar.php');
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tbusuario WHERE login = ? AND palavra_chave = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $palavra_chave);
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $sql = "UPDATE tbusuario SET senha = ? WHERE login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nova_senha, $login);

        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Senha alterada com sucesso!');window.location.href='entrar.php';
            </script>";
            exit();
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao redefinir senha, tente novamente mais tarde!!');window.location.href='entrar.php';
            </script>";
            exit();
        }
    } else {
        $_SESSION["tentativas"] = $tentativas + 1;

        echo "<script language='javascript' type='text/javascript'>
        alert('Login ou palavra-chave incorretos, verifique suas informações. Tentativas restantes: " . ($maxTentativas - $tentativas - 1) . "');window.location.href='redefinir_senha.php';
        </script>";
        exit();
    }
} else {
    header("Location: redefinir_senha.php");
    exit();
}
?>
