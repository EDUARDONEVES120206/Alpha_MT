<!DOCTYPE html>
<html>
<head>
    <title>AlphaMT - Funcionario da Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../../img/logobranco.png">
</head>
<body>
<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['login_usuario'])) {
    $logUsu = $_GET['login_usuario'];

    $sqlstring = "SELECT * FROM tbcostas WHERE login_usuario = ?";
    $stmt = mysqli_prepare($mysql->con, $sqlstring);
    mysqli_stmt_bind_param($stmt, "s", $logUsu);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado && $dados = mysqli_fetch_assoc($resultado)) {
        ?>
        <h2>Editar ficha de Costas:</h2>
        <form action='atualizar_ficha_costas.php' method='POST'>
            <input type='hidden' name='login_usuario' value='<?php echo $dados['login_usuario']; ?>'>
            <label for='exercicio1'>Exercicio 1:</label>
            <input type="text" name="exercicio1" value="<?php echo $dados['exercicio1']; ?>"><br>
            <label for='series1'>Series 1:</label>
            <input type="text" name="series1" value="<?php echo $dados['series1']; ?>"><br>
            <label for='repeticoes1'>Repetições 1:</label>
            <input type="text" name="repeticoes1" value="<?php echo $dados['repeticoes1']; ?>"><br><br>

            <label for='exercicio2'>Exercicio 2:</label>
            <input type="text" name="exercicio2" value="<?php echo $dados['exercicio2']; ?>"><br>
            <label for='series2'>Series 2:</label>
            <input type="text" name="series2" value="<?php echo $dados['series2']; ?>"><br>
            <label for='repeticoes2'>Repetições 2:</label>
            <input type="text" name="repeticoes2" value="<?php echo $dados['repeticoes2']; ?>"><br><br>

            <label for='exercicio3'>Exercicio 3:</label>
            <input type="text" name="exercicio3" value="<?php echo $dados['exercicio3']; ?>"><br>
            <label for='series3'>Series 3:</label>
            <input type="text" name="series3" value="<?php echo $dados['series3']; ?>"><br>
            <label for='repeticoes3'>Repetições 3:</label>
            <input type="text" name="repeticoes3" value="<?php echo $dados['repeticoes3']; ?>"><br><br>

            <label for='exercicio4'>Exercicio 4:</label>
            <input type="text" name="exercicio4" value="<?php echo $dados['exercicio4']; ?>"><br>
            <label for='series4'>Series 4:</label>
            <input type="text" name="series4" value="<?php echo $dados['series4']; ?>"><br>
            <label for='repeticoes4'>Repetições 4:</label>
            <input type="text" name="repeticoes4" value="<?php echo $dados['repeticoes4']; ?>"><br><br>

            <label for='exercicio5'>Exercicio 5:</label>
            <input type="text" name="exercicio5" value="<?php echo $dados['exercicio5']; ?>"><br>
            <label for='series5'>Series 5:</label>
            <input type="text" name="series5" value="<?php echo $dados['series5']; ?>"><br>
            <label for='repeticoes5'>Repetições 5:</label>
            <input type="text" name="repeticoes5" value="<?php echo $dados['repeticoes5']; ?>"><br><br>

            <label for='exercicio6'>Exercicio 6:</label>
            <input type="text" name="exercicio6" value="<?php echo $dados['exercicio6']; ?>"><br>
            <label for='series6'>Series 6:</label>
            <input type="text" name="series6" value="<?php echo $dados['series6']; ?>"><br>
            <label for='repeticoes6'>Repetições 6:</label>
            <input type="text" name="repeticoes6" value="<?php echo $dados['repeticoes6']; ?>"><br><br>

            <label for='exercicio7'>Exercicio 7:</label>
            <input type="text" name="exercicio7" value="<?php echo $dados['exercicio7']; ?>"><br>
            <label for='series7'>Series 7:</label>
            <input type="text" name="series7" value="<?php echo $dados['series7']; ?>"><br>
            <label for='repeticoes7'>Repetições 7:</label>
            <input type="text" name="repeticoes7" value="<?php echo $dados['repeticoes7']; ?>"><br><br>

            <label for='exercicio8'>Exercicio 8:</label>
            <input type="text" name="exercicio8" value="<?php echo $dados['exercicio8']; ?>"><br>
            <label for='series8'>Series 8:</label>
            <input type="text" name="series8" value="<?php echo $dados['series8']; ?>"><br>
            <label for='repeticoes8'>Repetições 8:</label>
            <input type="text" name="repeticoes8" value="<?php echo $dados['repeticoes8']; ?>"><br><br>

            <label for='observacao'>Observação:</label>
            <input type="text" name="observacao" value="<?php echo $dados['observacao']; ?>"><br><br>


            <input type="submit" value="Atualizar">
        </form>
        <?php
    }
}

$mysql->fechar();
?>
<br>
<a href="../ficha_cadastradas.php">Voltar</a>
</body>
</html>
