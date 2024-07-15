<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir arquivos do PHPMailer
require 'vendor/autoload.php'; // Se estiver usando o Composer
// require 'PHPMailer/PHPMailer.php'; // Se baixou o PHPMailer manualmente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hrnegocios083@gmail.com';
        $mail->Password = 'djey luhv vrpt apxl';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinatário
        $mail->setFrom('hrnegocios083@gmail.com', 'Contato Site - S&F');
        $mail->addAddress('sef.engenharia@simplesefuncional.com');
        $mail->addAddress('emedigitalmkt@gmail.com');

        // Conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato do site';
        $mail->Body    = "Nome: $name<br>Telefone: $telefone<br>Email: $email<br><br>Mensagem:<br>$message";
        $mail->AltBody = "Nome: $name\nTelefone: $telefone\nEmail: $email\n\nMensagem:\n$message";

        $mail->send();
        // Redireciona para a página de agradecimento
        header('Location: obrigado.html');
        exit();
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }
}
?>