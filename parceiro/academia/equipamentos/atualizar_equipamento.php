
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

$host = "localhost";
$user = "root";
$senha = "prof@etec";
$banco = "alpha";

$conexao = mysqli_connect($host, $user, $senha, $banco);

if (!$conexao) {
    die("Erro de conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $equipamento = $_POST["equipamento"];
    $qnt = $_POST["qnt"];

    // Perform the UPDATE operation
    $sql = "UPDATE tbequipamento SET nome_equipamento = ?, qnt_equipamento = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $equipamento, $qnt, $id);
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            echo "<script>alert('Equipamento atualizado com sucesso!');window.location.href='cadastro_equipamento_academia.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar equipamento: " . mysqli_error($conexao) . "');window.location.href='cadastro_equipamento_academia.php';</script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Erro ao preparar a instrução SQL.');window.location.href='cadastro_equipamento_academia.php';</script>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve equipment data based on the id
    $sql = "SELECT * FROM tbequipamento WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }

        mysqli_stmt_close($stmt);
    }

    if (isset($row)) {
        // Display a form for updating the equipment data
        ?>
        <html>
        <head>
            <title>AlphaMT - Academia</title>
            <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
        </head>
        <body>
            <h2>Atualizar Equipamento</h2>
            <form action="atualizar_equipamento.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                <label for="equipamento">Nome do Equipamento:</label>
                <input type="text" name="equipamento" value="<?php echo $row["nome_equipamento"]; ?>" required><br>
                <label for="qnt">Quantidade presente na academia:</label>
                <input type="number" name="qnt" value="<?php echo $row["qnt_equipamento"]; ?>" required><br>
                <input type="submit" value="Atualizar Equipamento">
            </form>
            <a href="cadastro_equipamento_academia.php">Cancelar</a>
        </body>
        </html>
        <?php
    } else {
        echo "<script>alert('Equipamento não encontrado.');window.location.href='cadastro_equipamento_academia.php';</script>";
    }
} else {
    echo "<script>alert('Requisição inválida.');window.location.href='cadastro_equipamento_academia.php';</script>";
}

mysqli_close($conexao);
?>
