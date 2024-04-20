<!DOCTYPE html>
<html>
<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
</head>
<body>
<?php
session_start();

if ($_SESSION['log'] !== "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

$id_pd = isset($_GET['id_pd']) ? $_GET['id_pd'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$login = isset($_GET['login']) ? $_GET['login'] : '';
$plano = isset($_GET['plano']) ? $_GET['plano'] : '';
$academia_selecionada = isset($_GET['academia_selecionada']) ? $_GET['academia_selecionada'] : '';
$data_registro = isset($_GET['data_registro']) ? $_GET['data_registro'] : '';

if (empty($id_pd) || empty($nome) || empty($login) || empty($plano) || empty($academia_selecionada) || empty($data_registro)) {
    echo "<script language='javascript' type='text/javascript'>alert('Tem campo em branco');window.location.href='verificacao_usuario.php'</script>";
} else {
    require_once('../../../conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();
    
    $sqlstring = "INSERT INTO tbfichaof (id_pd, nome, login2, nivel, plano, nome_academia, data_hora) VALUES (?, ?, ?, 'usuario', ?, ?, ?)";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'isssss', $id_pd, $nome, $login, $plano, $academia_selecionada, $data_registro);

        
        if (mysqli_stmt_execute($stmt)) {

            $sql_excluir = "DELETE FROM tbficha WHERE id_pd = ?";
            $stmt_excluir = mysqli_prepare($mysql->con, $sql_excluir);
            
            if ($stmt_excluir) {
                mysqli_stmt_bind_param($stmt_excluir, 'i', $id_pd);
                
                if (mysqli_stmt_execute($stmt_excluir)) {
                  
                } else {
                    echo "Erro MySQL ao excluir: " . mysqli_error($mysql->con);
                }
                
                mysqli_stmt_close($stmt_excluir);
            } else {
                echo "Erro na preparação da consulta de exclusão: " . mysqli_error($mysql->con);
            }
            
            echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso');window.location.href='verificacao_usuario.php'</script>";
        } else {
           
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Não funcionou!');window.location.href='verificacao_usuario.php'</script>";
    }
    
    $mysql->fechar();
}
?>
</body>
</html>
