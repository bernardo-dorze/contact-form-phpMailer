<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script type=" text/javascript" src="validation.js"></script>
    <title>Formulário de Contato</title>
</head>

<body>
    <header>
    </header>
    <div class="menu">
        <form class="form" id="input_form" novalidate method="post">
            <h1>Mensagem</h1>
            <input type="text" name="nome" placeholder=" Nome*" id="nome" required><br>
            <input type="number" name="telefone" placeholder=" Telefone*" id="telefone" required><br>
            <input type="text" name="email" placeholder=" Email*" id="email" required><br>
            <textarea type="text" rows="10" cols="150" name="mensagem" id="mensagem" placeholder=" Sua Mensagem Aqui*"></textarea required><br>
            <div class="space"></div>
            <button type="submit" name="enviar" class="submit-button" id="submit">Enviar Mensagem</button>
        </form>
        <div class="mostrar"></div>
    </div>
    <script>
        // Validações Jquery
        $('.form').validate({
            errorElement: 'div',
            rules:{
               nome:{
                minlength: 2
               },
               email:{
                email: true
               },
               telefone:{
                number: true,
                minlength: 10,
                maxlength: 10,
               },
               mensagem: { 
                required: true
                }
            }, messages:{
                nome:{
                    required: "Por favor digite seu nome!",
                    minlength: "No mínimo 2 caracteres para o nome",
                },
                email: {
                    required: "Por favor digite seu email!",
                    email: "Email digitado incorreto",
                },
                telefone:{
                    required: "Por favor digite seu telefone!",
                    minlength: "Telefone no mínimo 10 caracteres",
                    maxlength: "Telefone no máximo 10 caracteres",
                } ,
                mensagem: "Por favor digite sua mensagem!"
            },
            // Post Ajax formulário
            submitHandler: function(){
                $.ajax({
                url: 'validation.php',
                type: 'POST',
                data: $('.form').serialize(),
                success: function(data){
                    $('.mostrar').html(data);
                }
            })
        }
    })
    </script>
</body>
</html>