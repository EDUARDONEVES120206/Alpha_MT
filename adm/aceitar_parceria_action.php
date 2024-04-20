<HTML>
<HEAD>
 <TITLE>AlphaMT - ADM</TITLE>
 <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">
</HEAD>
<BODY>
<?php
session_start();

if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit;
}
$id_parceria = $_POST['id_parceria'];


$pnome = $_POST['nome'];
$plogin = $_POST['login'];
$ptelefone = $_POST['telefone'];
$pcpf = $_POST['cpf_cnpj'];
$pcidade = $_POST['cidade'];
$pbairro = $_POST['bairro'];
$prua = $_POST['rua'];
$pnumero = $_POST['numero'];
$pcep = $_POST['cep'];
$pemail = $_POST['email'];
$ptipo = $_POST['tipo'];
$pplano = $_POST['plano'];
$psenha = $_POST['senha'];
$ppalavra_chave = $_POST['palavra_chave'];

  if (empty($ptelefone) || empty($pplano) || empty($pcep) || empty($pnumero) || empty($prua) || empty($pbairro) || empty($pcidade) || empty($pnome) || empty($plogin) || empty($pcpf) || empty($pemail) || empty($ptipo) || empty($ppalavra_chave)|| empty($psenha) ) {
            echo "<script language='javascript' type='text/javascript'>alert('Tem campo em branco');window.location.href='aceitar_parceria.php'</script>";
        } else {
            echo "<p><b>Nome:</b> " . $pnome . "</p>";
            echo "<p><b>Nome de Usuario:</b> " . $plogin . "</p>";
            echo "<p><b>Telefone:</b> " . $ptelefone . "</p>";
            echo "<p><b>CPF:</b> " . $pcpf . "</p>";
            echo "<p><b>Cidade:</b> " . $pcidade . "</p>";
            echo "<p><b>Bairro:</b> " . $pbairro . "</p>";
            echo "<p><b>Rua:</b> " . $prua . "</p>";
            echo "<p><b>Numero:</b> " . $pnumero . "</p>";
            echo "<p><b>Cep:</b> " . $pcep . "</p>";
            echo "<p><b>Email:</b> " . $pemail . "</p>";
            echo "<p><b>Tipo:</b> " . $ptipo . "</p>";
            echo "<p><b>Plano:</b> " . $pplano . "</p>";
            echo "<p><b>Palavra Chave:</b> " . $ppalavra_chave . "</p>";
            echo "<p><b>Senha:</b> " . $psenha . "</p>";
            

            require_once('../conexao/conexao.php');
            $mysql = new BancodeDados();
            $mysql->conecta();
            $sqlstring = "INSERT INTO tbparceiro(nome, login, telefone, cpf_cnpj,  cidade, bairro, rua, numero, cep, email, tipo, plano, senha, palavra_chave) VALUES ('$pnome', '$plogin', '$ptelefone', '$pcpf', '$pcidade', '$pbairro', '$prua', '$pnumero', '$pcep', '$pemail', '$ptipo', '$pplano', '$psenha', '$ppalavra_chave')";
            $query = @mysqli_query($mysql->con, $sqlstring);

            echo "<br>";

            if ($query) {

                $sql_excluir = "DELETE FROM parceria WHERE id_parceria = '$id_parceria'";
                $excluir = mysqli_query($mysql->con, $sql_excluir);
                echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!!');window.location.href='pedidos_parceiros.php'</script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>alert('Não foi possivel cadastrar, tente novamente.');window.location.href='pedidos_parceiros.php'</script>";
            }

            $mysql->fechar();

             }

?>
</BODY>
</HTML>
