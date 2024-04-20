<?php
session_start();

if ($_SESSION['log'] != 'ativo') {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ops, acho que não é por aqui!!');
    window.location.href='../../../fechar_sessao.php';</script>";
}
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
    <title>AlphaMT - Academia</title>
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
            <li class="item-menu">
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
                <a href="../../../fechar_sessao.php">
                    <span class="icon"><i class="bi bi-door-open"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>
            

        </ul>

    </nav>

<center>


    <div class="d-flex  align-items-center" style="width: 180vh; margin-top: 40px;">

        <div class="col-xl-8 col-lg-7" style="margin-left: 100px;">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cadastro de Eventos</h6>
                </div>
                <form action="../cronograma/cadastrar_evento.php" method="post">
                    <label class="label-input" for="titulo">Título:
                    <input class="label-input"type="text" id="titulo" name="titulo" required><br><br></label>
                    <label class="label-input" for="descricao">Descrição:
                    <input class="label-input"type="text" id="descricao" name="descricao" required><br><br></label>

                    <label class="label-input"for="data_inicio">Data de Início:
                    <input class="label-input"type="datetime-local" id="data_inicio" name="data_inicio" required><br><br></label>

                    <label class="label-input" for="data_fim">Data de Término:
                    <input class="label-input" type="datetime-local" id="data_fim" name="data_fim" name="data_fim" required><br><br></label>

                    <center><input class="btn btn-second" type="submit" value="Cadastrar"></center>
                </form>
                <a class="btn btn-second" href="../home_academia.php">Voltar </a>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>








        <?php

        include('evento.php');

        $cnpj = $_SESSION['cpf_cnpj'];

        $sql = "SELECT * FROM eventos WHERE cpf_cnpj = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $cnpj);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {

                    echo "<div class='container-fluid'>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col-xl-9 col-lg-6 h-25 w-1000'>"; // Definindo uma altura de 3 unidades (h-25) e largura de 100% (w-100)
                        echo "<div class='card custom-sidebar-style shadow'>"; // Removendo a classe h-75
        
                        echo "<div class='card custom-sidebar-style shadow h-100'>";
                        echo "<div class='card-body'>";
                        echo "<div class='text-xs font-weight-bold text-success text-uppercase mb-1' style='text-align: left;'>";
                        echo "<h4>Titulo: " . $row['titulo'] . "</h4><h5> Descrição: " . $row['descricao'] . "<br></h35>Data: " . $row['data_inicio'] . " a " . $row['data_fim'] . "</div>";
                        echo "<div class='5 mb-0 font-weight-bold text-gray-800'>";
                        echo "<form action='alterar_evento.php' method='post' style='display: inline-block; margin-right: 10px;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input class='btn btn-second' type='submit' name='alterar' value='Alterar'>";
                        echo "</form>";

                        echo "<form action='excluir_evento.php' method='post' onsubmit=\"return confirm('Tem certeza que deseja excluir este evento?');\" style='display: inline-block;'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input class='btn btn-second' type='submit' name='excluir' value='Excluir'>";
                        echo "</form></div>";
                        echo "</div></div></div></div>";
                    }

                    echo "</div>"; // Fechando a div container-fluid
        




                }


            } else {
                echo "<p>Nenhum evento cadastrado pelo CPF/CNPJ atual.</p>";
            }
        } else {
            echo "Erro ao executar a consulta: " . $stmt->error;
        }

        $stmt->close();



        $conn->close();
        ?>
    </div>

    <script src="../../../js/menu.js"></script>
</body>

</html>