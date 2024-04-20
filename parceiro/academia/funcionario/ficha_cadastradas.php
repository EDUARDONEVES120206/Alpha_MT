<html>

<head>
    <title>AlphaMT - Funcionário Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/Style5.css">
    <link rel="stylesheet" href="../../../css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/95dc93da07.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <style>
        h5{
            color: white;
            padding: 60px;
        }
        body{
            background-color: #111111;
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
        <a href="home.php">
            <span class="icon"><i class="bi bi-house-door-fill"></i></span>
            <span class="txt-link">Inicio</span>
        </a>
    </li>
    <li class="item-menu ">
        <a href="gerenciar_fichas.php">
            <span class="icon"><i class="bi bi-clipboard"></i></span>
            <span class="txt-link">Fichas</span>
        </a>
    </li>
    <li class="item-menu ativo">
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
<div id="column">
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../fechar_sessao.php';</script>";
    exit;
}


require_once("../../../conexao/conexao.php");

$bancoDeDados = new BancodeDados();
$bancoDeDados->conecta();

$login_usuario = $_SESSION['login_usuario'];

$sql = "SELECT * FROM tbperna WHERE login_usuario=?";
$stmt = $bancoDeDados->con->prepare($sql);
$stmt->bind_param("s", $login_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<br><br>";
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Perna:<br>";
        echo "Login: " . $row['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row['exercicio8'] . "<br>";
        echo "Observação: " . $row['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_perna.php?login_usuario=" . $row['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_perna.php?login_usuario=" . $row['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";

    }
} else {
    echo "Sem ficha de Perna cadastrada.<br>";
}
$stmt->close();

$sql1 = "SELECT * FROM tbpeito WHERE login_usuario=?";
$stmt1 = $bancoDeDados->con->prepare($sql1);
$stmt1->bind_param("s", $login_usuario);
$stmt1->execute();
$resultado1 = $stmt1->get_result();
if ($resultado1->num_rows > 0) {
    while ($row1 = mysqli_fetch_assoc($resultado1)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Peito:<br>";
        echo "Login: " . $row1['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row1['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row1['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row1['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row1['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row1['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row1['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row1['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row1['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row1['exercicio8'] . "<br>";
        echo "Observação: " . $row1['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_peito.php?login_usuario=" . $row1['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_peito.php?login_usuario=" . $row1['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>"; 
    }
} else {
    echo "Sem ficha de Peito cadastrada.<br>";
}
$stmt1->close();

$sql2 = "SELECT * FROM tbbiceps WHERE login_usuario=?";
$stmt2 = $bancoDeDados->con->prepare($sql2);
$stmt2->bind_param("s", $login_usuario);
$stmt2->execute();
$resultado2 = $stmt2->get_result();
if ($resultado2->num_rows > 0) {
    while ($row2 = mysqli_fetch_assoc($resultado2)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Biceps:<br>";
        echo "Login: " . $row2['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row2['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row2['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row2['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row2['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row2['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row2['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row2['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row2['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row2['exercicio8'] . "<br>";
        echo "Observação: " . $row2['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_biceps.php?login_usuario=" . $row2['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_biceps.php?login_usuario=" . $row2['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Biceps cadastrada.<br>";
}
$stmt2->close();

$sql3 = "SELECT * FROM tbombro WHERE login_usuario=?";
$stmt3 = $bancoDeDados->con->prepare($sql3);
$stmt3->bind_param("s", $login_usuario);
$stmt3->execute();
$resultado3 = $stmt3->get_result();
if ($resultado3->num_rows > 0) {
    while ($row3 = mysqli_fetch_assoc($resultado3)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Ombro:<br>";
        echo "Login: " . $row3['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row3['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row3['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row3['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row3['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row3['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row3['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row3['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row3['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row3['exercicio8'] . "<br>";
        echo "Observação: " . $row3['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_ombro.php?login_usuario=" . $row3['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_ombro.php?login_usuario=" . $row3['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Ombro cadastrada.<br>";
}
$stmt3->close();

$sql4 = "SELECT * FROM tbcostas WHERE login_usuario=?";
$stmt4 = $bancoDeDados->con->prepare($sql4);
$stmt4->bind_param("s", $login_usuario);
$stmt4->execute();
$resultado4 = $stmt4->get_result();
if ($resultado4->num_rows > 0) {
    while ($row4 = mysqli_fetch_assoc($resultado4)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Costas:<br>";
        echo "Login: " . $row4['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row4['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row4['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row4['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row4['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row4['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row4['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row4['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row4['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row4['exercicio8'] . "<br>";
        echo "Observação: " . $row4['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_costas.php?login_usuario=" . $row4['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_costas.php?login_usuario=" . $row4['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Costas cadastrada.<br>";
}
$stmt4->close();

$sql5 = "SELECT * FROM tbtriceps WHERE login_usuario=?";
$stmt5 = $bancoDeDados->con->prepare($sql5);
$stmt5->bind_param("s", $login_usuario);
$stmt5->execute();
$resultado5 = $stmt5->get_result();
if ($resultado5->num_rows > 0) {
    while ($row5 = mysqli_fetch_assoc($resultado5)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Triceps:<br>";
        echo "Login: " . $row5['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row5['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row5['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row5['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row5['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row5['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row5['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row5['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row5['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row5['exercicio8'] . "<br>";
        echo "Observação: " . $row5['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_triceps.php?login_usuario=" . $row5['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_triceps.php?login_usuario=" . $row5['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Triceps cadastrada.<br>";
}
$stmt5->close();

$sql6 = "SELECT * FROM tbtrapezio WHERE login_usuario=?";
$stmt6 = $bancoDeDados->con->prepare($sql6);
$stmt6->bind_param("s", $login_usuario);
$stmt6->execute();
$resultado6 = $stmt6->get_result();
if ($resultado6->num_rows > 0) {
    while ($row6 = mysqli_fetch_assoc($resultado6)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Trapézio:<br>";
        echo "Login: " . $row6['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row6['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row6['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row6['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row6['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row6['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row6['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row6['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row6['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row6['exercicio8'] . "<br>";
        echo "Observação: " . $row6['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_trapezio.php?login_usuario=" . $row6['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_trapezio.php?login_usuario=" . $row6['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Trapezio cadastrada.<br>";
}
$stmt6->close();

$sql7 = "SELECT * FROM tbantebraco WHERE login_usuario=?";
$stmt7 = $bancoDeDados->con->prepare($sql7);
$stmt7->bind_param("s", $login_usuario);
$stmt7->execute();
$resultado7 = $stmt7->get_result();
if ($resultado7->num_rows > 0) {
    while ($row7 = mysqli_fetch_assoc($resultado7)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> AnteBraço:<br>";
        echo "Login: " . $row7['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row7['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row7['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row7['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row7['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row7['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row7['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row7['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row7['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row7['exercicio8'] . "<br>";
        echo "Observação: " . $row7['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_antebraco.php?login_usuario=" . $row7['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_antebraco.php?login_usuario=" . $row7['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Antebraço cadastrada.<br>";
}
$stmt7->close();

$sql8 = "SELECT * FROM tbabdomen WHERE login_usuario=?";
$stmt8 = $bancoDeDados->con->prepare($sql8);
$stmt8->bind_param("s", $login_usuario);
$stmt8->execute();
$resultado8 = $stmt8->get_result();
if ($resultado8->num_rows > 0) {
    while ($row8 = mysqli_fetch_assoc($resultado8)) {
        echo "<p style='color: white; text-align: left; margin: 0 auto;'> Abdômen:<br>";
        echo "Login: " . $row8['login_usuario'] . "<br>";
        echo "Nome do Profissional: " . $row8['nome_personal'] . "<br>";
        echo "Exercicio 1: " . $row8['exercicio1'] . "<br>";
        echo "Exercicio 2: " . $row8['exercicio2'] . "<br>";
        echo "Exercicio 3: " . $row8['exercicio3'] . "<br>";
        echo "Exercicio 4: " . $row8['exercicio4'] . "<br>";
        echo "Exercicio 5: " . $row8['exercicio5'] . "<br>";
        echo "Exercicio 6: " . $row8['exercicio6'] . "<br>";
        echo "Exercicio 7: " . $row8['exercicio7'] . "<br>";
        echo "Exercicio 8: " . $row8['exercicio8'] . "<br>";
        echo "Observação: " . $row8['observacao'] . "<br>";
        echo "<div>";
        echo "<a href='aba/editar_ficha_abdomen.php?login_usuario=" . $row8['login_usuario'] . "'><button>Editar</button></a>";
        echo "<a href='aba/excluir_ficha_abdomen.php?login_usuario=" . $row8['login_usuario'] . "'><button style='margin-left: 20px;'>Excluir</button></a>";
        echo "</div>";
        echo "</style>";
    }
} else {
    echo "Sem ficha de Abdômen cadastrada.<br>";
}
$stmt8->close();

$bancoDeDados->fechar();
?>
</div>
<br>
<a href="gerenciar_fichas.php">Voltar</a>
</body>