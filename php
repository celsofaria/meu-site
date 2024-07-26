<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $data = htmlspecialchars($_POST['data']);
    $hora = htmlspecialchars($_POST['hora']);
    $quantidade = htmlspecialchars($_POST['quantidade']);

    // Configurações do e-mail
    $to = $email; // Envia o e-mail para o endereço fornecido pelo usuário
    $subject = "Confirmação de Reserva - Children's Kingdom";
    $message = "Olá $nome,\n\nSua reserva foi recebida com sucesso.\n\nDetalhes da reserva:\n\nData: $data\nHora: $hora\nQuantidade de pessoas: $quantidade\n\nEm breve entraremos em contato para confirmar os detalhes.\n\nObrigado,\nChildren's Kingdom";
    $headers = "From: info@childrenskingdom.pt\r\n" .
               "Reply-To: info@childrenskingdom.pt\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid_request";
}
?>
