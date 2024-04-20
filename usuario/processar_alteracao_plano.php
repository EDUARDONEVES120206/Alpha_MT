<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../fechar_sessao.php';</script>";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["novo_plano"])) {
        $novoPlano = $_POST["novo_plano"];
        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $cpf = $_SESSION['cpf']; 
        
        $updateSql = "UPDATE tbusuario SET plano = '$novoPlano' WHERE cpf = '$cpf'";
        $updateQuery = mysqli_query($mysql->con, $updateSql);
        if ($updateQuery) {

            $sqlstring = "select * from tbusuario where cpf='$cpf'"  ;
        
            $result = @mysqli_query($mysql->con, $sqlstring);
            $total = $result -> num_rows;
          if($total==1){
                $dados=mysqli_fetch_array($result) ;

              $_SESSION['plano'] =$dados['plano'] ;
              $_SESSION['cpf'] =$dados['cpf'] ;
                  $_SESSION['log'] = 'ativo';
          }
            
            echo"<script language='javascript' type='text/javascript'>
              alert('(ESSA PAGINA NO FUTURO SERÁ UMA PAGINA DE PAGAMENTO) Alterado com sucesso!!');window.location.href='../fechar_sessao.php';
              </script>";
    
        exit; 
    }
}
}
?>

<html>
<head>
<title>AlphaMT -  Usuário</title>
</head>
<body>
</body>
</html>
