<!DOCTYPE html>
<html>

<head>
    <title>AlphaMT - Academia</title>
    <link rel="shortcut icon" type="image/png" href="../../../img/logobranco.png">
    <link href="../../../css/style19.css" rel="stylesheet">
    <link href="../../../css/style9.css" rel="stylesheet">
    <link href="../../../css/style4.css" rel="stylesheet">
    <link href="../../../css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <?php
    session_start();
    if ($_SESSION['log'] != "ativo") {
        echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
        exit;
    }
    ?>
    <br>
    <center>
        <div style="display: flex; justify-content: center; align-items: flex-start; width: 180vh;">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Verificação de entradas</h6>
                    </div>

                    <div class="card-body">
                        <?php
                        require_once('../../../conexao/conexao.php');
                        $mysql = new BancodeDados();
                        $mysql->conecta();

                        if (isset($_GET['id_pd'])) {
                            $id_pd = $_GET['id_pd'];

                            if (!is_numeric($id_pd)) {
                                echo "ID inválido.";
                            } else {
                                $sqlstring = "SELECT * FROM tbfichaof WHERE id_pd = $id_pd";
                                $query = @mysqli_query($mysql->con, $sqlstring);

                                if ($query) {
                                    if (mysqli_num_rows($query) > 0) {
                                        $dados = mysqli_fetch_array($query);
                                        echo "<b>Academia:</b> " . $dados['nome_academia'] . "<br>";
                                        echo "<b>Data e Hora:</b> " . $dados['data_hora'] . "<br>";

                                        $login = $dados['login2'];

                                        $sql_entradas = "SELECT * FROM tbfichaof WHERE login2 = '$login'";
                                        $query_entradas = @mysqli_query($mysql->con, $sql_entradas);

                                        $sql_usuario = "SELECT * FROM tbusuario WHERE login = '$login'";
                                        $query_usuario = @mysqli_query($mysql->con, $sql_usuario);

                                        if ($query_entradas) {
                                            if (mysqli_num_rows($query_entradas) > 0) {
                                                $usuario = mysqli_fetch_array($query_usuario);
                                                echo "<h3><center>Informações de contato do Aluno:</center> </h3>";
                                                echo "ID: " . $dados['id_pd'] . "<br>";
                                                echo "Nome do aluno: " . $dados['nome'] . "<br>";
                                                echo "Login: " . $dados['login2'] . "<br>";
                                                echo "Telefone: " . $usuario['numero'] . "<br>";
                                                echo "Email: " . $usuario['email'] . "<br>";
                                                echo "Plano: " . $dados['plano'] . "<br>";
                                                echo "";
                                                echo "<h3><center>Entradas do Aluno:</center> </h3>";
                                                echo "<table id='customers'>";
                                                echo "<tr><th>Login</th><th>Nome da Academia</th><th>Data e Hora</th>";

                                                while ($entrada = mysqli_fetch_array($query_entradas)) {


                                                    echo "<tr>";
                                                    echo "<td>" . $entrada['login2'] . "</td>";
                                                    echo "<td>" . $entrada['nome_academia'] . "</td>";
                                                    echo "<td>" . $entrada['data_hora'] . "</td>";

                                                    echo "</tr>";
                                                }

                                                echo "</table>";
                                            }
                                        }


                                    } else {
                                        echo "O aluno não possui entradas.";
                                    }

                                } else {
                                    echo "<script language='javascript' type='text/javascript'>alert('Aluno não encontrado.');window.location.href='gerenciar_entrada_academia.php';</script>";
                                }
                            }
                        }



                        $mysql->fechar();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <form action="gerenciar_entrada_academia.php" method="post">
        <a class="btn btn-primary" href="gerenciar_entrada_academia.php">Voltar</a>

        </form>
    </center>

</body>

</html>