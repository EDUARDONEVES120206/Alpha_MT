<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script language='javascript' type='text/javascript'>alert('Ops, acho que não é por aqui!!');window.location.href='../../../fechar_sessao.php';</script>";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["novo_plano"])) {
        $novoPlano = $_POST["novo_plano"];
        require_once('../../../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();

        $cpf_cnpj = $_SESSION['cpf_cnpj']; 
        
        $updateSql = "UPDATE tbparceiro SET plano = '$novoPlano' WHERE cpf_cnpj = '$cpf_cnpj'";
        $updateQuery = mysqli_query($mysql->con, $updateSql);
        if ($updateQuery) {
             



            $sqlstring = "select * from tbparceiro where login='$cpf_cnpj'"  ;
        
            $result = @mysqli_query($mysql->con, $sqlstring);
            $total = $result -> num_rows;
          if($total==1){
                $dados=mysqli_fetch_array($result) ;


              $_SESSION['plano'] =$dados['plano'] ;
              $_SESSION['cpf_cnpj'] =$dados['cpf_cnpj'] ;
                  $_SESSION['log'] = 'ativo';
                  //

          }
            
           
            echo"<script language='javascript' type='text/javascript'>
              alert('(ESSA PAGINA NO FUTURO SERÁ UMA PAGINA DE PAGAMENTO) Alterado com sucesso!!');window.location.href='../../../fechar_sessao.php';
              </script>";
    
        exit; 
    }
}
}
?>