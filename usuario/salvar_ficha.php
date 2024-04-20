<?php
include('conectar.php');

session_start();

if ($_SESSION['log'] !== 'ativo') {
    echo "<script>alert('Ops, acho que não é por aqui!!'); window.location.href='../fechar_sessao.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $data_nascimento = $_POST["data"];
    $sexo = $_POST["sexo"];
    $altura = $_POST["altura"];
    $peso = $_POST["peso"];
    $objetivo = $_POST["objetivo"];
    $restricao_medica = $_POST["restricao_medica"];
    $medicamentos = $_POST["medicamentos"];
    $experiencia = $_POST["experiencia"];
    $frequencia = $_POST["frequencia"];
    $disponibilidade = $_POST["disponibilidade"];
    $carga_horaria = $_POST["carga_horaria"];
    $preferencia_treino = $_POST["preferencia_treino"];
    $alergias = $_POST["alergias"];
    $outros = $_POST["outros"];

    $conn = new mysqli("localhost", "root", "prof@etec", "alpha");

    if ($conn->connect_error) {
        die("Falha na conexão com o MySQL: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbperguntasficha (login, cpf, email, numero, data, sexo, altura, peso, objetivo, restricao, medicamento, experiencia, frequencia, dia, tempo, treinamento, alergia, extra) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $login = $_SESSION['login'];
        $cpf = $_SESSION['cpf'];
        $email = $_SESSION['email'];
        $numero = $_SESSION['numero'];

        $stmt->bind_param("ssssssssssssssssss", $login, $cpf, $email, $numero, $data_nascimento, $sexo, $altura, $peso, $objetivo, $restricao_medica, $medicamentos, $experiencia, $frequencia, $disponibilidade, $carga_horaria, $preferencia_treino, $alergias, $outros);

        if ($stmt->execute()) {
            echo "<script>alert('As informações foram salvas com sucesso no banco de dados.'); window.location.href='fichat.php';</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao salvar as informações no banco de dados.'); window.location.href='fichat.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Ocorreu um erro ao preparar a consulta.'); window.location.href='fichat.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('O formulário não foi enviado corretamente.'); window.location.href='fichat.php';</script>";
}
?>
