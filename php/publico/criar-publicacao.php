<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/libs/acesso/acesso_usuario.libs.php");


$mysqli = conectar_bd();

$sql = sprintf("SELECT * FROM %s WHERE id = ?", $_SESSION['acesso']);
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$resultado = $stmt->get_result()->fetch_assoc();

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
    
    <title>Criar publicacao</title>
</head>

<body>
    <header id="body">
        <div class="note">
            
            <?php

            if (isset($_GET['publicacao'])) :

                $mensagem_de_publicacao = $_GET['publicacao'];

                if ($mensagem_de_publicacao == 'tipo_de_imagem_invalida'):
                    echo "<p>Este tipo de arquivo nao e suportado.</p>";
                elseif ($mensagem_de_publicacao == 'tamanho_de_imagem_invalido'):
                    echo "<p>A imagem deve ter no maximo 10MB.</p>";
                elseif ($mensagem_de_publicacao == "erro"):
                    echo "<p>Um erro ocorreu, tente novamente.</p>";
                elseif ($mensagem_de_publicacao == 'erro_na_imagem'):
                    echo "<p>A imagem pode esta corrompida.</p>";
                elseif ($mensagem_de_publicacao == 'upload_incompleto'):
                    echo "<p>Ocorreu um erro durante o upload, tente novamente.</p>";
                elseif ($mensagem_de_publicacao == 'perfil_atualizado'):
                    echo "<p>Perfil atualizado com sucesso :)</p>";
                endif;

            endif;

            ?>

        </div>
        
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>

    </header>

    <div class="wrapper">

        <form class='form' action='/src/publicar_obra_artistica.php' method='post' enctype='multipart/form-data'>
            <div class="title">Perfil</div>
            <div class="form">
                <div class='inputfield'>
                    <input type='text' name='titulo' placeholder='titulo' required>
                </div>

                <?php if ($_SESSION['acesso'] == "artista"): ?>

                <div class='inputfield'>
                    <input type='text' name='sub_titulo' placeholder='subtitulo'>
                </div>

                <?php endif; ?>

                <div class="input-file-upload">
                    <div class="upload-btn">
                        <button class="btn">Selecionar o arquivo</button>
                        <input type='file' name='arquivo' id="upfile" value='' accept='image/*' onchange="readURL(this);" required>
                    </div>
                    <img class="upload_img" id="file_upload">
                </div>

                <br>

                <div class="inputfield">
                    <button type="submit" class="btn" name="submit">Salvar</button>
                </div>
            </div>

        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8ae0fe9b21.js" crossorigin="anonymous"></script>
    <script>
        const sideNav = document.getElementById('side-nav');

        function openNav() {
            sideNav.style.width = '250px';
        }

        function closeNav() {
            sideNav.style.width = '0';
        }
    </script>
    <script src="/src/inc/javascript/app.js"></script>


</body>
</html>
</body>