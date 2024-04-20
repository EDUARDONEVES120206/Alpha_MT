<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlphaMT -  Usuário</title>
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="../css/Style12.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
       
        body{
            background-color: #111111;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
        <?php
        
        session_start();

        if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'ativo') {
            echo "<script language='javascript' type='text/javascript'>
        alert('Ops, acho que não é por aqui!!');
        window.location.href='../fechar_sessao.php';</script>";
        }

        include('conectar.php');

        if (mysqli_connect_errno()) {
            echo "<script language='javascript' type='text/javascript'>
            alert('Algo não esta certo, entre em contato com o suporte!!');
            window.location.href='home.php';</script>";
            exit();
        }

     

        require_once("../conexao/conexao.php");
        $bancoDeDados = new BancodeDados();
        $bancoDeDados->conecta();

        $cpf = $_SESSION['cpf'];
        $sql1 = "SELECT cpf FROM tbperguntasficha WHERE cpf = '$cpf'";

        $result = $bancoDeDados->executaSQL($sql1);

        if (mysqli_num_rows($result)>1) {
            echo "Esse usuario não possui ficha de treino para pernas cadastrado.";
            
        } else {
            echo " <h6> Esse usuario ja tem um pedido de ficha cadastrado. Para excluir aperte ";
            echo "<a href='excluir_pedido_ficha.php'>aqui!</a></h6>"; 
        }

        $bancoDeDados->fechar();

        ?>



        <form action='salvar_ficha.php' method='POST'>
            <div class="row">
                <div class="col">
                    <label for='data' style='display: block;'>1. Data de nascimento:</label>
                    <input type='date' name='data' required style=' width: 100%;padding: 10px;margin-top: 5px;border: 1px solid #ccc;border-radius: 5px;background-color: #333;color: white;' placeholder='Data de nascimento'><br>
                </div>
                <div class="col">
                <label for='sexo'>2. Sexo:</label>
            <select name='sexo' required style=' width: 100%;padding: 10px;margin-top: 5px;border: 1px solid #ccc;border-radius: 5px;background-color: #333;color: white;' placeholder='Data de nascimento'><br>'>
                <option value='masculino'>Masculino</option>
                <option value='feminino'>Feminino</option>
            </select>
                </div>
            </div>

            <label for='altura'>3. Altura (em centímetros):</label>
                    <input type='number' name='altura' required><br>
            <br>



            <label for='peso'>4. Peso (em quilogramas):</label>
            <input type='number' name='peso' required><br>

            <label for='objetivo'>5. Qual é o seu objetivo principal ao participar da academia?</label>
            <input type='text' name='objetivo' required><br>

            <label for='restricao_medica'>6. Você possui alguma restrição médica?</label>
            <input type='text' name='restricao_medica' required><br>

            <label for='medicamentos'>7. Você está tomando algum medicamento atualmente? Se sim, por favor, liste-os.</label>
            <br><textarea name='medicamentos' rows='2' required></textarea><br>

            <label for='experiencia'>8. Você já teve alguma experiência anterior com atividades físicas ou musculação? Se sim, descreva.</label>
            <br><textarea name='experiencia' rows='4' required></textarea><br>

            <label for='frequencia'>9. Com que frequência você pretende treinar na academia?</label>
            <input type='text' name='frequencia' required><br>

            <label for='disponibilidade'>10. Quais são os dias da semana que você está disponível para treinar?</label>
            <input type='text' name='disponibilidade' required><br>

            <label for='carga_horaria'>11. Qual a sua carga horária de treino diária?</label>
            <input type='text' name='carga_horaria' id='carga_horaria' required>


            <label for='preferencia_treino'>12. Você tem alguma preferência por treinamento específico, como treinamento funcional, musculação, cárdio etc.?</label>
            <input type='text' name='preferencia_treino' required><br>

            <label for='alergias'>13. Você tem alguma alergia alimentar ou restrição dietética que o profissional de educação física deve estar ciente?</label>
            <br><textarea name='alergias' rows='4' required></textarea><br>

            <label for='outros'>14. Há algo mais que você gostaria de compartilhar ou discutir com o profissional de educação física para que ele possa criar uma ficha de treino personalizada para você?</label>
            <br><textarea name='outros' rows='4' required></textarea><br>
            <center>
                <button class='btn btn-primary' type='submit' name='submit'>Enviar</button>
            </center>

        </form>


    </div>
</body>
<script src="../js/menu.js"></script>

</html>