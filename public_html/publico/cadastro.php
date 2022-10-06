<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(usuario_logado()) ? (header('Location: /index.php')) : (null);

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
    <link rel="stylesheet" href="/src/inc/css/cadastro.css" type="text/css">
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Cadastro</title>
</head>
<body>
    <div class="note">
        <?php

        if (!isset($_GET['cadastro'])) :

        else:
            $mensagem_de_cadastro = $_GET['cadastro'];

            if ($mensagem_de_cadastro == 'email_invalido'):
                echo "<p>E-mail ja cadastrado.</p>";
            elseif ($mensagem_de_cadastro == 'senha_invalida'):
                echo '<p>Sua senha deve conter no mínimo 8 caracteres, 2 letras maiúsculas, 3 letras minúsculas, 2 números e 1 caractere especial.</p>';
            elseif ($mensagem_de_cadastro == 'senhas_incompativeis'):
                echo '<p>As senhas devem ser iguais.</p>';
            elseif ($mensagem_de_cadastro == 'erro_de_cadastramento'):
                echo '<p>Ocorreu um erro. Tente novamente mais tarde.</p>';
            endif;
        endif;  
        ?>

    </div>
    <div class="wrapper">
        <form class='form'  action='/src/cadastrar_usuario.php' method='post'>
            <div class="title">Cadastro</div>
            <div class="form">
                <div class='inputfield'>
                    <input type='text' class="input" name='nome' max="60" placeholder='Nome...' required>
                </div>

                <div class='inputfield'>
                    <input type='email' class="input" name='email' max="75" placeholder='Email...' required>
                </div>

                <div class='inputfield'>
                    <input type='password' class="input" id="senha" name='senha' max="75" placeholder='Senha...' required>
                </div>

                <div class='inputfield'>
                    <input type='password' class="input" id="confirmacao_de_senha" name='confirmacao_de_senha' max="75" placeholder='Confirmar senha...' required>
                </div>
                <div class='inputfield'>
                    <label class="check">
                        <input type="checkbox" onclick="mostrar_senha()">
                        <span class="checkmark"></span>
                    </label>
                    <p>Mostrar senha</p>
                </div>

                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name='termos-de-servicos' required/>
                        <span class="checkmark"></span>
                    </label>
                    <p>Eu concordo com os <a href=/publico/termos-de-seguranca-e-privacidade.php>termos de serviço e privacidade</a></p>
                </div>
            
                <div class="inputfield">
                    <input type="hidden" name="acesso" value="utente">
                    <button type="submit" value="Register" class="btn" name="submit">Cadastrar-se</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrar_senha() {
        var senha = document.getElementById("senha");
        var confirmacao_de_senha = document.getElementById("confirmacao_de_senha")
        if (senha.type === "password") {
            senha.type = "text";
            confirmacao_de_senha.type = "text";
        } else {
            senha.type = "password";
            confirmacao_de_senha.type = "password";
        }
    }
</script>


</body>
</html>