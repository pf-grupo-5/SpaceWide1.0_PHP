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
    <link rel="stylesheet" href="/src/inc/css/perfil.css" type="text/css">
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Cadastro</title>
</head>
<body>
    
    <div class="wrapper">
        <form class='form'  action='/src/cadastrar_artista.php' method='post'>
            <div class="title">Cadastro de Artista</div>
            <div class="form">
                <div class='inputfield'>
                    <input type='text' class="input" name='nome_artistico' max="50" placeholder='Nome artistico...' required>
                </div>
                
                <div class="input-file-upload">
                    <div class="upload-btn">
                        <button class="btn">Selecionar o arquivo</button>
                        <input type="file" name="arquivo" id="upfile" onchange="readURL(this);" accept="image/*" required>
                    </div>
                    <img class="upload_img" id="file_upload">
                </div>

                <br>

                </div>
                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name='termos-de-servicos' required/>
                        <span class="checkmark"></span>
                    </label>
                    <p>Eu concordo com os <a href=#>termos de serviço e privacidade</a></p>
                </div>
            
                
                <div class="inputfield">
                    <input type="hidden" name="acesso" value="artista">
                    <input type="hidden" name="codigo_validador" value="<?= $_GET['codigo_validador'] ?>">
                    <button type="submit" value="submit" class="btn" name="submit">Virar artista</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>