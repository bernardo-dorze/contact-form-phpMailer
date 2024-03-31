<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if($_POST){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'SEU EMAIL AQUI!';
    $mail->Password = 'SUA SENHA DE APP AQUI!';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $nome);
    $mail->addAddress('ENDEREÇO DE EMAIL A SER ENVIADO AQUI!');
    $mail->Subject = 'Mensagem do Cliente';
    $mail->Body = "$mensagem <br> Meu Telefone de contato: $telefone";
    $mail->send();
    echo '<script>alert("Formulário enviado com sucesso!");</script>';
}

?>