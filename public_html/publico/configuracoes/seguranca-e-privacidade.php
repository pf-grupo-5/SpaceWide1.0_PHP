<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');

(!usuario_logado()) ? (header('Location: /index.php')) : (null);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="/src/inc/css/perfil.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Seguranca e privacidade</title>
</head>
<body>
    <div class='form-container'>
        <div class='form-header'>
            <p class='form-title'>Perfil</p>
            <p class='form-subtitle'><?php echo($_SESSION['nome']) ?>, aqui voce pode ver e atualizar seus dados.</p>
        </div>
        
        <div class='security-form'>
            <form class='form'  action='/src/editar_senha.php' method='post'>
                <div class='input-group'>
                    <div class='input-field'>
                        <input type='password' name='senha_atual' id="senha_atual" max="75" placeholder='Senha atual' required>
                    </div>

                    <div class='input-field'>
                        <input type='password' name='nova_senha' id="nova_senha" max="75" placeholder='Nova senha' required>
                    </div>

                    <div class='input-field'>
                        <input type='password' name='confirmacao_da_nova_senha' id="confirmacao_da_nova_senha" max="75" onclick='mostrar_senha' placeholder='Confirmacao da nova senha' required>
                    </div>

                    </div class='input-field'>
                        <input type="checkbox" onclick="mostrar_senha()">Mostrar senha
                    </div>
                    <a href="#">Esqueceu a senha?</a>

                    <button type='submit' class='submit-btn' name='submit'>Salvar</button>

                </div>

            </form>

            <script>
                function mostrar_senha() {
                    var senha_atual = document.getElementById("senha_atual");
                    var nova_senha = document.getElementById("nova_senha");
                    var confirmacao_da_nova_senha = document.getElementById("confirmacao_da_nova_senha");
                    if (senha_atual.type === "password") {
                        senha_atual.type = "text";
                        nova_senha.type = "text";
                        confirmacao_da_nova_senha.type = "text";
                    } else {
                    senha_atual.type = "password";
                    nova_senha.type = "password";
                    confirmacao_da_nova_senha.type = "password";
                    }
                }
            </script>
        </div>
    </div>
</body>