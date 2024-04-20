<!DOCTYPE html>
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
<br>
<br>
<div class="d-flex  align-items-center">
<div class="col-xl-8 col-lg-7 mx-auto">
<div class="card shadow mb-4">

<div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Alterar Evento</h6>
                </div>
    
    <?php
    session_start();
    if ($_SESSION['log'] != 'ativo') {
        echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../../../fechar_sessao.php';</script>";
    }

    include('evento.php');

    // Verifica se o ID do evento foi fornecido no POST
    if (isset($_POST['id'])) {
        $idEvento = $_POST['id'];
        
        // Consulta o evento com base no ID fornecido
        $sql = "SELECT * FROM eventos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $idEvento);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    // Exiba o formulário com os dados do evento para edição
                    echo "<center><form action='processar_alteracao_evento.php' method='post'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'><br>";
                    echo "Título: <input type='text' name='titulo' value='" . $row['titulo'] . "'><br><br>";
                    echo "Descrição: <input type='text' name='descricao' value='" . $row['descricao'] . "'><br><br>";
                    echo "Data de Início: <input type='datetime-local' name='data_inicio' value='" . date('Y-m-d\TH:i', strtotime($row['data_inicio'])) . "'><br><br>";
                    echo "Data de Término: <input type='datetime-local' name='data_fim' value='" . date('Y-m-d\TH:i', strtotime($row['data_fim'])) . "'><br><br>";
                    echo "<input type='submit' class='btn btn-second' value='Salvar'>";
                    echo "</form>";
                } else {
                    echo "<p>Evento não encontrado.</p>";
                }
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
    } else {
        echo "<p>ID do evento não fornecido.</p>";
    }

    $conn->close();
    ?>
    
    <a class="btn btn-second" href="calendarioadm.php">Voltar</a>
    <br>
    <br>
</div>
</div>
</div>

</body>
</html>