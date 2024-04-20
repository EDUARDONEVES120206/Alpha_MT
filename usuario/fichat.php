<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AlphaMT - Usuário</title>
<link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
<link rel="stylesheet" href="../css/Style5.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<style>
    #column {
        position: absolute;
        left: 28%;
        width: 100vh;
        height: auto;
        justify-content: center;
        text-align: center;
        background-color: #0e0e0e;
    }

    input[type="submit"] {
        background-color: #db0001;
        color: white;
        padding: 10px 15px;

        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #b30000;
    }

    select {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        appearance: none;
        background-image: url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/svgs/solid/caret-down.svg');
        background-repeat: no-repeat;
        background-position: right center;
        background-size: 20px 20px;
        cursor: pointer;
    }

    select option {
        background-color: #fff;
        color: #333;
    }

    button {
        width: auto;
        border: 0;
        outline: 0;
        background: #db0001;
        color: #fff;
        padding: 7px 20px;
        font-size: 16px;
        border-radius: 4px;
        margin-left: 10px;
        cursor: pointer;
        z-index: 4;
        transition: all 0.5s ease-in-out;
    }

    button:hover {
        transition: all 0.5s ease-in-out;
        background: #b30000;
        width: auto;
    }

    .carousel-container {
        overflow: hidden;
        width: 300px;
        margin: 0 auto;
    }

    .carousel-list {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
        min-width: 100%;
        color: #fff;
    }

    .carousel-prev,
    .carousel-next {
        cursor: pointer;
        font-size: 24px;
        margin-top: 50px;
    }
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  background-color: #f2f2f2
}

tr:nth-chil{background-color: #f2f2f2}
td:nth-child{background-color: #f2f2f2}

th {
  background-color:  #aa0404;
  color: white;
}
</style>
</head>

<body>

    <?php
session_start();

if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
            alert('Ops, acho que não é por aqui!!');
            window.location.href='../fechar_sessao.php';</script>";
    exit();
}

$conexao = mysqli_connect("localhost", "root", "prof@etec", "alpha");

if (mysqli_connect_errno()) {
    echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
    exit();
}

$plano = $_SESSION['plano'];
$cpf = $_SESSION['cpf'];

$sql = "SELECT nome FROM tbparceiro WHERE plano = '$plano' AND tipo = 'academia'";
$resultado = mysqli_query($conexao, $sql);

$sql1 = "SELECT cpf FROM tbperguntasficha WHERE cpf = '$cpf'";
$resultado1 = mysqli_query($conexao, $sql1);

?>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="item-menu">
                <a href="home.php">
                    <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="academias.php">
                    <span class="icon"><i class="bi bi-geo-alt"></i></span>
                    <span class="txt-link">Academias</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="conta_usuario.php">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Conta</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../loja/loja.php">
                    <span class="icon"><i class="bi bi-bag"></i></span>
                    <span class="txt-link">Loja</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Suporte</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../fechar_sessao.php">
                    <span class="icon"><i class="bi bi-door-open"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>

        </ul>

    </nav>


    <div id="column">
        <br><br>
        <div class="carousel-container" style="margin-top: 10vh;">
            <ul class="carousel-list">
                <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbperna";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);



        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Perna</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
                </li>
                <li class="carousel-item"> 
                    
<?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbcostas";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Costas</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
                <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbpeito";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Peito</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
                                            <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbbiceps";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Biceps</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
                                            <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbtriceps";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Triceps</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
                                            <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbantebraco";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Ante Braço</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
                                            <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbabdomen";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Abdomen</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>
</li>
                                            <li class="carousel-item"> <?php
include('conectar.php');

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}


// Consulta SQL para buscar a linha correspondente ao usuário logado
$sql = "SELECT * FROM tbombro";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<table>";
        echo "<tr>";
        echo "<th>Treino Ombro</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Exercicio</th>";
        echo "<th>Serie</th>";
        echo "<th>Reps</th>";
        echo "</tr>";
        if (!empty($row['exercicio1'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio1'] . "</td>";
            echo "<td>" . $row['series1'] . "</td>";
            echo "<td>" . $row['repeticoes1'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio2'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio2'] . "</td>";
            echo "<td>" . $row['series2'] . "</td>";
            echo "<td>" . $row['repeticoes2'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio3'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio3'] . "</td>";
            echo "<td>" . $row['series3'] . "</td>";
            echo "<td>" . $row['repeticoes3'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio4'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio4'] . "</td>";
            echo "<td>" . $row['series4'] . "</td>";
            echo "<td>" . $row['repeticoes4'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio5'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio5'] . "</td>";
            echo "<td>" . $row['series5'] . "</td>";
            echo "<td>" . $row['repeticoes5'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio6'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio6'] . "</td>";
            echo "<td>" . $row['series6'] . "</td>";
            echo "<td>" . $row['repeticoes6'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio7'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio7'] . "</td>";
            echo "<td>" . $row['series7'] . "</td>";
            echo "<td>" . $row['repeticoes7'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['exercicio8'])) {
            echo "<tr>";
            echo "<td>" . $row['exercicio8'] . "</td>";
            echo "<td>" . $row['series8'] . "</td>";
            echo "<td>" . $row['repeticoes8'] . "</td>";
            echo "</tr>";
        }
        else {
        }
        if (!empty($row['observacao'])) {
            echo "<tr>";
            echo "<td>Observação:</td>";
            echo "<td>" . $row['observacao'] . "</td>";
            echo "<td></td>";
            echo "</tr>";
        }
        else {
        }

        echo "</table>";
    }
    else {
        echo "Nenhum resultado encontrado para o usuário logado.";
    }
}
else {
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados quando terminar.
mysqli_close($conn);
?></li>

            </ul>
        </div>

        <button class="carousel-prev" onclick="prevSlide()">&#10094;</button>
        <button class="carousel-next" onclick="nextSlide()">&#10095;</button>

        <script>
            let currentIndex = 0;

            function showSlide(index) {
                const carouselList = document.querySelector('.carousel-list');
                const itemWidth = document.querySelector('.carousel-item').offsetWidth;

                currentIndex = index;
                const transformValue = -currentIndex * itemWidth + 'px';
                carouselList.style.transform = 'translateX(' + transformValue + ')';
            }

            function nextSlide() {
                const totalItems = document.querySelectorAll('.carousel-item').length;
                currentIndex = (currentIndex + 1) % totalItems;
                showSlide(currentIndex);
            }

            function prevSlide() {
                const totalItems = document.querySelectorAll('.carousel-item').length;
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                showSlide(currentIndex);
            }
        </script>
        <form class="form" action="fichat_action.php" method="post">
            <label for="academia">
                <h2 class="tex1" style="margin-top: 250px;"> Qual academia você está treinando?</h2>
            </label><br>
            <select name="academia">
                <?php
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $academiaNome = $row['nome'];
        echo "<option value='$academiaNome'>$academiaNome</option>";
    }
    mysqli_free_result($resultado);
}
else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}
?>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <br>
        <h3 class="tex1"> Não tem ficha ou quer trocar? Faça um pedido</h3><br>
        <a href="pedido_ficha.php"> <button> aqui!</button></a>
        <br>
        <br>
    </div>
</body>
<script src="../js/menu.js"></script>

</html>