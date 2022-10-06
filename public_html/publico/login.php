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
    <link rel="stylesheet" href="/src/inc/css/login.css" type="text/css">
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Login</title>
</head>
<body>
   <div class="note">
        <?php

        if (isset($_GET['login'])):

            $mensagem_de_login = $_GET['login'];

            if ($mensagem_de_login == 'usuario_nao_encontrado'):
                echo "<p>E-mail ou senha incorreta.</p>";
            endif;

        endif;  
        ?>
    </div>

    <div class="slider-one">
        <div class="slider-one-image">
            <div class="slider-text">
                <h1>Space Wide</h1>
                <p>O SpaceWide é uma plataforma de compartilhamento de Imagens digitais<br>
                    com alta qualidade , já contamos na nossa comunidade<br>
                    uma grande quantidade de artistas com diversos tipos de artes digitais</p>
            </div>
        </div>
    </div>

    <div class="slider-two">
        <div class="slider-two-image">
            <div class="slider-text">
                 <h1>Space Wide</h1>
                <p>O SpaceWide é uma plataforma de compartilhamento de Imagens digitais<br>
                    com alta qualidade , já contamos na nossa comunidade<br>
                    uma grande quantidade de artistas com diversos tipos de artes digitais</p>
            </div>
        </div>
    </div>

    <div class="slider-three">
        <div class="slider-three-image">
            <div class="slider-text">
                 <h1>Space Wide</h1>
                <p>O SpaceWide é uma plataforma de compartilhamento de Imagens digitais<br>
                    com alta qualidade , já contamos na nossa comunidade<br>
                    uma grande quantidade de artistas com diversos tipos de artes digitais</p>
            </div>
        </div>
    </div>

    <div class="slider-four">
        <div class="slider-four-image">
            <div class="slider-text">
                 <h1>Space Wide</h1>
                <p>O SpaceWide é uma plataforma de compartilhamento de Imagens digitais<br>
                    com alta qualidade , já contamos na nossa comunidade<br>
                    uma grande quantidade de artistas com diversos tipos de artes digitais</p>
            </div>
        </div>
    </div>

    <form action="/src/login.php" method="post" class="form">
        <h2>Space<span>Wide</span></h2>
        <input type="email" name="email" max="75" placeholder="Email..." required>
        <input type="password" id="senha" name="senha" max="75" placeholder="Senha..." required>
        <div class="control-group">
            <label class="control control-checkbox">
                <a>Mostrar senha</a>
                    <input type="checkbox" onclick="mostrar_senha()">
                <div class="control_indicator"></div>
            </label>
        <button type="submit" name="submit" class="btnn"><a href="#">Login</a></button>
        <p class="link">Não possui uma conta?
        Crie uma</a><a href="/publico/cadastro.php"> conta</a>
        </p>
        
    </form>

<script>
    function mostrar_senha() {
        var senha = document.getElementById("senha");
        if (senha.type === "password") {
            senha.type = "text";
        } else {
            senha.type = "password";
        }
    }
</script>

</body>

</html>