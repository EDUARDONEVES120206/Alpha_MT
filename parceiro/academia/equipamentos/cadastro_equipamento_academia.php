<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}

require_once('../../../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();

$nome = $_SESSION['nome'];
$login = $_SESSION['login'];
$cnpj = $_SESSION['cpf_cnpj'];
$plano = $_SESSION['plano'];
$tipo = $_SESSION['tipo'];

$servername = "localhost";
$username = "root";
$password = "prof@etec";
$dbname = "alpha";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processing equipment registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipamento = $_POST['equipamento'];
    $qnt = $_POST['qnt'];

    // Define the SQL query for inserting data
    $sqlInserir = "INSERT INTO tbequipamento (caminho, cpf_cnpj, nome_equipamento, login_academia, qnt_equipamento) VALUES (?, ?, ?, ?, ?)";

    // Prepare the insert query
    $stmtInserir = $conn->prepare($sqlInserir);

    // Check if the statement is prepared successfully
    if ($stmtInserir) {
        // Bind parameters
        $caminhoCompleto = ''; // Replace with the actual path to the image
        $stmtInserir->bind_param("ssssi", $caminhoCompleto, $cnpj, $equipamento, $login, $qnt);

        // Execute the insert query
        $resultadoInserir = $stmtInserir->execute();

        if ($resultadoInserir) {
            echo "<script language='javascript' type='text/javascript'>alert('Inserção de imagem bem-sucedida!');window.location.href='perfil_academia.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Erro ao inserir caminho da imagem no banco de dados: " . $stmtInserir->error . "');window.location.href='perfil_academia.php';</script>";
        }

        // Close the prepared statement for insert
        $stmtInserir->close();
    } else {
        // Handle the error when preparing the insert statement
        echo "<script language='javascript' type='text/javascript'>alert('Erro ao preparar a instrução de inserção: " . $conn->error . "');window.location.href='perfil_academia.php';</script>";
    }
}

// Retrieve equipment list
$sql = "SELECT * FROM tbequipamento WHERE cpf_cnpj = '$cnpj'";
$result = $conn->query($sql);
?>

<html>

<head>
    <link rel="shortcut icon" type="img/mini_logo.png" href="../../../img/logobranco.png">
    <link rel="stylesheet" href="../../../css/sb-admin-3.css">
    <link rel="stylesheet" href="../../../css/style10.css">
    <link rel="stylesheet" href="../../../css/style4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link href="sidebars.css" rel="stylesheet">
    <title>AlphaMt - Academia</title>
    <style>
        .modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    z-index: 1;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    max-width: 550px; 
    max-height: 350px; 
    justify-content: center;
    text-align: center;
}
.hr-bolada {
    border: none;
    height: 20px;
    border-top: 3px solid red;
    border-radius: 10px; /* Valor de raio para criar uma forma arredondada */
  }

        </style>
</head>

<body>
    <nav class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>

            <li class="item-menu">
                <a href="../home_academia.php">
                    <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../perfil/perfil_academia.php">
                    <span class="icon"><i class="bi bi-person-circle"></i></span>
                    <span class="txt-link">Perfil</span>
                </a>
            </li>
            <li class="item-menu ativo">
                <a href="../equipamentos/cadastro_equipamento_academia.php">
                    <span class="icon"><i class="fas fa-dumbbell"></i></span>
                    <span class="txt-link">Equipamentos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../perfil/gerenciar_plano_academia.php">
                    <span class="icon"><i class="bi bi-folder"></i></span>
                    <span class="txt-link">Plano</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class="bi bi-gear"></i></span>
                    <span class="txt-link">Suporte</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../../fechar_sessao.php">
                    <span class="icon"><i class="bi bi-door-open"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>


        </ul>

    </nav>
    <br><br>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-6 col-lg-6" style="margin-right: 20px;">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Equipamentos</h6>
                    </div>
                    <form action="processar_cadastro.php" method="POST" enctype="multipart/form-data">
                        <label class="label-input" for="equipamento"> <i class="fas fa-cogs"></i> &nbsp;Nome do
                            Equipamento:
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="label-input" type="text" name="equipamento" required><br></label>

                        <label class="label-input" for="qnt"><i class="fas fa-chart-bar"></i> &nbsp;Quantidade presente
                            na
                            academia:

                            <input class="label-input" type="number" name="qnt" required><br></label>

                        <h5 class="m-0 font-weight-bold text-primary">Selecione uma imagem para fazer o upload: </h5>
                        <input class="label-input" type="file" name="imagem" required><br>
                        <center> <input class="btn btn-second" type="submit" value="Cadastrar"> </center>
                    </form>
                    <a class="btn btn-second" href="../home_academia.php">Voltar </a>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6" style="margin-right: -100px;">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lista de Equipamentos:</h6>
                    </div>
                    <CENTER><br>

                        <div class="chart-container">
                            <div class="chart"></div>
                            <div class="legend">
                                <?php
                               if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<h2 style='list-style-type: disc; margin-left: 10px; font-size: 16px; color: #333;'>Nome do Equipamento: " . $row["nome_equipamento"] . "</h2>";
                                    echo "<h2 style='list-style-type: disc; margin-left: 10px; font-size: 16px; color: #333;'>Quantidade: " . $row["qnt_equipamento"] . "</h2>";
                                    echo "<style='text-align: left; list-style-type: disc; margin-left: 10px; font-size: 16px; color: #333;'><img src='" . $row["caminho"] . "' style='max-width: 80%; height: 150px; border-radius: 50%;'><br>";

                                    echo "<a class='btn btn-second' href='javascript:void(0);' onclick='openEditarModal(\"equipamentoModal_" . $row["id"] . "\");'>Editar</a>  ";
                                    echo "<a class='btn btn-second' href='javascript:void(0);' onclick='openExcluirModal(\"excluirModal_" . $row["id"] . "\");'>Excluir</a>";
                                    echo "<br><br><br><hr class='hr-bolada'>";
                            
                                    // Crie um modal exclusivo para cada equipamento com um ID único
                                    echo "<div id='equipamentoModal_" . $row["id"] . "' class='modal'>";
                                    echo "    <div class='modal-content'>";
                                    echo "        <span class='close' onclick='closeModal(\"equipamentoModal_" . $row["id"] . "\");'>&times;</span>";
                                    echo "        <h2>Editar Equipamento</h2>";
                                    echo "        <form action='atualizar_equipamento.php' method='POST'>";
                                    echo "            <input class='label-input' type='hidden' name='id' value='" . $row["id"] . "'>";
                                    echo "            <label class='label-input' for='equipamento'>Nome do Equipamento:";
                                    echo "                <input class='label-input' type='text' name='equipamento' value='" . $row["nome_equipamento"] . "' required><br>";
                                    echo "            </label>";
                                    echo "            <label class='label-input' for='qnt'>Quantidade presente na academia:";
                                    echo "                <input class='label-input' type='number' name='qnt' value='" . $row["qnt_equipamento"] . "' required><br>";
                                    echo "            </label>";
                                    echo "            <center><input class='btn btn-second' type='submit' value='Atualizar'></center>";
                                    echo "        </form>";
                                    echo "    </div>";
                                    echo "</div>";
                            
                                    // Crie um modal exclusivo para a exclusão com um ID único
                                    echo "<div id='excluirModal_" . $row["id"] . "' class='modal'>";
                                    echo "    <div class='modal-content'>";
                                    echo "        <span class='close' onclick='closeModal(\"excluirModal_" . $row["id"] . "\");'>&times;</span>";
                                    echo "        <h2>Excluir Equipamento</h2>";
                                    echo "        <p>Tem certeza de que deseja excluir este equipamento?</p>";
                                    echo "        <a class='btn btn-second' href='excluir_equipamento.php?id=" . $row["id"] . "'>Excluir</a>";
                                    echo "        <a class='btn btn-second' href='javascript:void(0);' onclick='closeModal(\"excluirModal_" . $row["id"] . "\");'>Voltar</a>";
                                    echo "    </div>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<h4>Nenhum equipamento encontrado para esta academia.</h4><br>";
                            }
                            ?>
                            
                            <!-- JavaScript para abrir e fechar os modais -->
                            <script>
                                // Função para abrir o modal de edição
                                function openEditarModal(modalId) {
                                    var modal = document.getElementById(modalId);
                                    modal.style.display = "block";
                                }
                            
                                // Função para abrir o modal de exclusão
                                function openExcluirModal(modalId) {
                                    var modal = document.getElementById(modalId);
                                    modal.style.display = "block";
                                }
                            
                                // Função para fechar os modais
                                function closeModal(modalId) {
                                    var modal = document.getElementById(modalId);
                                    modal.style.display = "none";
                                }
                            </script>

                            </div>
                        </div>
                    </CENTER>
                </div>
            </div>
        </div>
    </div>

    <a href="../home_academia.php">Voltar</a><br>
    <script src="../../../js/menu.js"></script>
</body>

</html>
<?php
$conn->close();
?>