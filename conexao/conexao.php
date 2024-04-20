<?php
class BancodeDados {
    
    private $host = "localhost";

    private $user = "root"; 		
    private $senha = "prof@etec"; 		
    private $banco = "alpha"; 		
    public $con;

	
	function conecta(){
        $this->con = mysqli_connect($this->host,$this->user,$this->senha, $this->banco);
       
        if(!$this->con){
      		
			die ("Erro");
        }
    }

	
	function fechar(){
		mysqli_close($this->con);
		return;
	}

    function executaSQL($sql) {
        $resultado = mysqli_query($this->con, $sql);
        if ($resultado) {
            return $resultado;
        } else {
            echo "Erro na consulta SQL: " . mysqli_error($this->con);
            return false;
        }
    }


}


?>
