<HTML>

<HEAD>
    <TITLE>AlphaMT - ACADEMIA</TITLE>
    <link rel="shortcut icon" type="img/mini_logo.png" href="../../img/logobranco.png">
    <link rel="stylesheet" href="../../css/sb-admin-2.css">
    <link rel="stylesheet" href="../../css/style9.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link href="sidebars.css" rel="stylesheet">
    <?php
    session_start();

    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
        exit;
    }


    ?>
    <link href="sidebars.css" rel="stylesheet">
</HEAD>

<BODY>
    <br> <br>

    <div id="wrapper">
        <nav class="menu-lateral">

            <div class="btn-expandir">
                <i class="bi bi-list" id="btn-exp"></i>
            </div>

            <ul>

                <li class="item-menu ativo">
                    <a href="home_academia.php">
                        <span class="icon"><i class="bi bi-house-door-fill"></i></span>
                        <span class="txt-link">Inicio</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="perfil/perfil_academia.php">
                        <span class="icon"><i class="bi bi-person-circle"></i></span>
                        <span class="txt-link">Perfil</span>
                    </a>
                </li>
                <li class="item-menu">
                <a href="equipamentos/cadastro_equipamento_academia.php">
                    <span class="icon"><i class="fas fa-dumbbell"></i></span>
                    <span class="txt-link">Equipamentos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="perfil/gerenciar_plano_academia.php">
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
        <br>
        <center>
            <div class="container-fluid">
                <div style=" margin-left: 70px;" class="row">
                    <div style="display: flex; justify-content: center; align-items: center; width: 180vh;">
                        <div class="col-xl-3 col-md-6 mb-4 ">
                            <div class="card custom-sidebar-style shadow h-100">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="entrada/verificacao_usuario.php">Verificação de Entradas de Usuario</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <!-- Conteúdo aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Repita o código com as mesmas classes para os outros elementos -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card custom-sidebar-style shadow h-100">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="usuarios_academia.php">Vizualizar Usuários do plano</a><br>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <!-- Conteúdo aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card custom-sidebar-style shadow h-100">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="entrada/gerenciar_entrada_academia.php">Gerenciar Entradas</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <!-- Conteúdo aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-xl-3 col-md-6 mb-4">
                            <div class="card custom-sidebar-style shadow h-100">
                                <div class="card-body">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="funcionario/gerenciar_funcionarios_academia.php"> Gerenciar Funcionarios </a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <!-- Conteúdo aqui -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="  display: flex; justify-content: center; align-items: center; width: 180vh; ">
                        <div style="margin-top: 40px;" class="col-xl-8 col-lg-10">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Gráficos</h6>
                                </div>
                                <div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['em Breve', 'Em breve', 'Em breve','Em breve','Em breve','Em breve'],
      datasets: [{
        label: 'Grafico funcional em breve',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
      ' rgb(37, 35, 35)',
      ' rgb(129, 10, 10)',
      ' rgb(0, 0, 0)'
    ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Eventos Cadastrados</h6>
                                </div>
                                <CENTER><br><a class="btn btn-primary" href="cronograma/calendarioadm.php">Eventos</a><br>
                                <div class="chart-container">
                                    <div class="chart"></div>
                                    <div class="legend">
                                    <?php

include('cronograma/evento.php');

$cnpj = $_SESSION['cpf_cnpj'];

$sql = "SELECT * FROM eventos WHERE cpf_cnpj = ?";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("s", $cnpj);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {

   
            while ($row = $result->fetch_assoc()) {
                echo "<center><div class='col-xl-10 col-lg-5'>"; // Definindo uma altura de 3 unidades (h-25) e largura de 100% (w-100)
        
                echo "<br><div class='card custom-sidebar-style'>";
                echo "<div class='card-body'>";
                echo "<div style='text-align: left;'>";
                echo "<h4>Titulo: " . $row['titulo'] . "</h4><h5> Descrição: " . $row['descricao'] . "<br></h35>Data: " . $row['data_inicio'] . " a " . $row['data_fim'] . "</div>";


                echo "<form action='cronograma/excluir_evento.php' method='post' onsubmit=\"return confirm('Tem certeza que deseja excluir este evento?');\" style='display: inline-block;'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<input class='btn btn-second' type='submit' name='excluir' value='Excluir'>";
                echo "</form></div>";
                echo "</div></div></center>";
            }







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
                                </div>
                                </CENTER>


                                 

                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
    </div>

    <script src="../../js/menu.js"></script>
</BODY>

</HTML>