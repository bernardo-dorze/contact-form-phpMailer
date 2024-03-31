<?php

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

    if($_POST){
        $mensagemErr = "";
        $telefoneErr = "";
        $nomeErr = "";
        $emailErr = "";

        if (!preg_match("/^[a-zA-Z ]*$/",$nome)) {
            $nomeErr = "Apenas letras são permitidas ";
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email invalido! ";
        } 

        if (!filter_var($telefone, FILTER_VALIDATE_INT)) {
            $telefoneErr = "Formato de telefone invalido! ";
        }
    }
    if ($nomeErr != "" || $emailErr != "" || $telefoneErr != "" || $mensagemErr != "") {
        echo '<script>alert("' . $nomeErr . $telefoneErr . $emailErr. $mensagemErr .'");</script>';
    } else {
        require 'email.php';
    }
?>