
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}
?>
    <html>
    
    <head>
        <title>AlphaMT - Funcionário Academia</title>
        <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/Style5.css">
        <link rel="stylesheet" href="../../../css/sb-admin-2.css">
        <link rel="stylesheet" href="../../../css/style9.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
            .space{
    margin-left: 5%;


}

        </style>
    </head>


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
        <a href="#">
            <span class="icon"><i class="bi bi-house-door-fill"></i></span>
            <span class="txt-link">Inicio</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="gerenciar_fichas.php">
            <span class="icon"><i class="bi bi-clipboard"></i></span>
            <span class="txt-link">Fichas</span>
        </a>
    </li>
    <li class="item-menu">
        <a href="gerenciar_fichas_cadastradas.php">
            <span class="icon"><i class="bi bi-clipboard-check"></i></span>
            <span class="txt-link">Fichas_cadastradas</span>
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
        <br>
        <div class="space" >
                    <div style="  display: flex; justify-content: center; align-items: center; width: 180vh;">
                        <div class="col-xl-5 col-lg-3">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Gráficos</h6>
                                </div>
                                <div>
                                <?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "prof@etec";
$dbname = "alpha";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Query para contar o número de linhas na coluna 'login'
$query = "SELECT COUNT(login) AS total_linhas FROM tbperguntasficha";
$result = $conn->query($query);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Obtém o número de linhas na coluna 'login'
    $row = $result->fetch_assoc();
    $numero_linhas_login = $row["total_linhas"];
    
} else {
    echo "Erro na consulta: " . $conn->error;
}

$query = "SELECT COUNT(DISTINCT login_usuario) AS total_login_usuarios FROM tbpeito";
$result = $conn->query($query);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Obtém o número de linhas distintas na coluna 'login_usuario'
    $row = $result->fetch_assoc();
    $numero_linhas_login_usuario = $row["total_login_usuarios"];
 
} else {
    echo "Erro na consulta: " . $conn->error;
}
$query = "SELECT COUNT(nome) AS total_nomes FROM tbusuario";
$result = $conn->query($query);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Obtém o número de linhas na coluna 'nome'
    $row = $result->fetch_assoc();
    $numero_linhas_nome = $row["total_nomes"];
    

} else {
    echo "Erro na consulta: " . $conn->error;
}
// Fecha a conexão
$conn->close();
?>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Pedidos de ficha', 'Fichas Cadastradas', 'Usuários'],
      datasets: [{
        label: '# of Votes',
        data: [<?php echo$numero_linhas_login?>,<?php echo $numero_linhas_login_usuario?>,<?php echo  $numero_linhas_nome;?>],
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
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5 col-lg-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Eventos Cadastrados</h6>
                                </div>
                                <div class="space">
                                <div class="chart-container">
                                    <div class="chart"></div>
                                    <div class="legend">
                                    <?php
        require_once("../../../conexao/conexao.php");
        $bancoDeDados = new BancodeDados();
        $bancoDeDados->conecta();
        $sql = "SELECT login, sexo, altura, peso, cpf FROM tbperguntasficha";
        $resultado = $bancoDeDados->executaSQL($sql);

        if ($resultado) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<center> <div class='col-xl-7 col-lg-5'>"; // Definindo uma altura de 3 unidades (h-25) e largura de 100% (w-100)
                echo "<br><div class='card custom-sidebar-style'>";
                echo "<div class='card-body'>";
                echo "<div style='text-align: Center;'>";
                echo " <h5> Login: " . $row['login'] . "<br>";
                echo "Sexo: " . $row['sexo'] . "<br>";
                echo "Altura: " . $row['altura'] . "<br>";
                echo "Peso: " . $row['peso'] . "<br>";
                echo "<a href='ver_mais.php?login=" . $row['login'] . "'><br><button>Ver Mais</button></a><br>";
                echo "</form></div>";
                echo "</div></div></center> </h5>";
            }
        } else {
            echo "Erro na consulta SQL.";
        }


        if (mysqli_num_rows($resultado) == 0) {
            echo "<script language='javascript' type='text/javascript'>alert('Você não possui fichas pendentes!!');window.location.href='home.php';</script>";
        }

        $bancoDeDados->fechar();
        ?>
                                    </div>
                                </div>
                            </div>


                                 

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
        </div>
    </div>
    </div>

    <script src="../../../js/menu.js"></script>
</BODY>

</HTML>