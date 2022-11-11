<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');

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
    <link rel="stylesheet" type="text/css" href="/src/inc/css/seguranca.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Seguranca e privacidade</title>
</head>
<header>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>
</header>
<body>
    <div class="wrapper">
    <div class='form-container'>
        <div class='form-header'>
       <div class="title">Perfil</div>
        <p class='form-subtitle'>Aqui voce pode redefinir sua senha.</p>
        </div>
        
        <div class='inputfield'>
            <form class='form' action='/src/redefinir_senha.php' method='post'>
                <div class='input-group'>
                        <input type='hidden' name='codigo_validador' value='<?= $_GET['email'] ?>'>
                        <input type='hidden' name='email' value='<?= $_GET['email'] ?>'>
                        <input type='hidden' name='id' value='<?= $_GET['id'] ?>'>
                    <div class='inputfield'>
                        <input type='password' class="input" name='nova_senha' id="nova_senha" max="75" placeholder='Nova senha' required>
                    </div>
                    <div class='inputfield'>
                        <input type='password' class="input" name='confirmacao_da_nova_senha' id="confirmacao_da_nova_senha" max="75" onclick='mostrar_senha' placeholder='Confirmacao_da_nova_senha' required>
                    </div>
                   <label class="control control-checkbox">
                        <a>Mostrar senha</a>
                        <input type="checkbox" onclick="mostrar_senha()">
                    </label>
                    <div class="control_indicator"></div>
                        <div class="inputfield">
                            <button type="submit" class="btn" name="submit">Salvar</button>
                        </div>
                    </div>
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