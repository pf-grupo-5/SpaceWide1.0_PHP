<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");


(!usuario_logado()) ? (header('Location: /index.php')) : (null);


$mysqli = conectar_bd();

$sql = 'SELECT * FROM usuario WHERE id = ?';
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
    
    <title>Perfil</title>
</head>

<body>
    <header id="body">
        
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>

    </header>

    <div class="wrapper">

        <form class="form"  action="/src/editar_perfil.php" method="post" enctype="multipart/form-data">
            <div class="title">Perfil</div>
            <?php if (isset($_GET['perfil'])): ?>
                <small style="color: white; padding-left:160px;"><?php echo $_GET['perfil']; ?></small>
            <?php endif; ?>
            <div class="form">
                <div class='inputfield'>
                    <input type="text" class="input" name="nome" value="<?= $resultado['nome'] ?>" placeholder="Nome">
                </div>

                <?php if ($_SESSION['acesso'] == "artista"): ?>

                <div class='inputfield'>
                    <input type="text" class="input" name="nome_artistico" value="<?= $resultado['nome_artistico'] ?>" placeholder="Nome artistico">
                </div>

                <?php endif; ?>

                <div class='inputfield'>
                    <input type="email" class="input" name="email" value="<?= $resultado['email'] ?>" placeholder="E-mail">
                </div>

                <div class="input-file-upload">
                    <div class="upload-btn">
                        <button class="btn">Selecionar o arquivo</button>
                        <input type="file" name="arquivo" id="upfile" onchange="readURL(this);" accept="image/*">
                    </div>
                    <img class="upload_img" id="file_upload">
                </div>

                <br>

                <div class="inputfield">
                    <button type="submit" class="btn" name="submit">Salvar</button>
                </div>
            </div>

        </form>
        
        <?php if (!tipo_de_usuario_logado('artista') && !tipo_de_usuario_logado('administrador')): ?>

        <a href="<?php echo '/src/cadastrar_artista.php?nome='.$resultado["nome"].'&email='.$resultado["email"].'&codigo_validador='.$resultado["codigo_validador"]; ?>">Transformar-se em artista</a>

        <?php endif; ?>

        <a href="/src/auto_deletar_conta.php">Deletar conta</a>

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