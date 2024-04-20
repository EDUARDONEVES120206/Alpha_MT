<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <link rel="shortcut icon" type="../img/mini_logo.png" href="../img/logobranco.png">
    <link rel="stylesheet" href="../css/Style5.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    
<body>
   
    <div id="column">
    <h1>Excluir Pedido de ficha</h1>
    <form action="excluir_pedido_ficha_action.php" method="POST">
        <p>Você tem certeza de que deseja excluir o pedido de ficha?</p>
        <input type="submit" name="excluir" value="Sim, Excluir">
        <a href="pedido_ficha.php">Não, Voltar</a>
    </form>
    
</body>

</html>
