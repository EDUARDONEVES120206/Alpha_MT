php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $mensagem = $_POST["mensagem"];

    // Endereço de email para onde você deseja enviar o email
    $destinatario = "itsastech.ltda@gmail.com";

    // Assunto do email
    $assunto = "Mensagem do formulário de contato";

    // Corpo do email
    $mensagem_email = "Nome: $nome\n";
    $mensagem_email .= "Email: $email\n";
    $mensagem_email .= "Celular: $celular\n\n";
    $mensagem_email .= "Mensagem:\n$mensagem";

    // Cabeçalhos do email
    $cabecalhos = "From: $email\r\n";

    // Envie o email
    if (mail($destinatario, $assunto, $mensagem_email, $cabecalhos)) {
        // Email enviado com sucesso
        echo "Obrigado por entrar em contato! Sua mensagem foi enviada com sucesso.";
    } else {
        // Erro ao enviar o email
        echo "Desculpe, houve um problema ao enviar sua mensagem. Por favor, tente novamente mais tarde.";
    }
} else {
    // Redirecione de volta para o formulário se alguém tentar acessar este script diretamente
    header("Location: seuformulario.html");
}
?>

