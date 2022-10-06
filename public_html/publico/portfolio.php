<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inicializador.php");


(!usuario_logado()) ? (header("Location: /index.php")) : (null);

$mysqli = conectar_bd();

$sql_1 = "SELECT id, nome_artistico, localizacao_da_imagem_de_perfil FROM usuario WHERE id = ?";
            
$sql_2 = "SELECT 
              obra.id, obra.titulo, obra.localizacao_da_imagem, obra.id_usuario,
              usuario.nome, usuario.localizacao_da_imagem_de_perfil 
          FROM obra_artistica AS obra 
          INNER JOIN usuario ON usuario.id = obra.id_usuario 
          WHERE obra.id_usuario = ? AND obra.estado = 'publicada' 
          ORDER BY RAND()";
          
$stmt_1 = $mysqli->prepare($sql_1);
$stmt_1->bind_param('i', $_GET['id']);
$stmt_1->execute();
$resultado_1 = $stmt_1->get_result()->fetch_assoc();

$stmt_2 = $mysqli->prepare($sql_2);
$stmt_2->bind_param('i', $_GET['id']);
$stmt_2->execute();
$resultado_2 = $stmt_2->get_result();

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
    <link rel="stylesheet" type="text/css" href="/src/inc/css/portfolio.css">
    <link rel="shortcut icon" href="/src/inc/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title><?php print($resultado_1['nome_artistico']); ?></title>
</head>
<body id="body">
    
    <header>
        
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>

    <div class = "container about">
        <div class = "about-content">
            <div class = "about-img flex">
                <img src = "<?= $resultado_1['localizacao_da_imagem_de_perfil'] ?>">
            </div>

            <h2><?= $resultado_1['nome_artistico'] ?></h2>
        </div>
        
        <div class="portfolio-buttons">
            <button class="button">Seguir</button>
            <button class="button">Sobre</button>
        </div>
        
    </header>
    
<section class="row" id="row">
        
        <?php while ($row_obras = $resultado_2->fetch_assoc()): ?>

        <div class="column">
            <div class="img-wrapper modal" >
                <img src="<?= $row_obras['localizacao_da_imagem'] ?>" alt="<?= $row['titulo'] ?>">
                <div class="overlay">
                    <div class="user">
                        <a href="<?= sprintf('/publico/portfolio.php?id=%d', $row['id_usuario']) ?>" >
                            <img src="<?= $row_obras['localizacao_da_imagem_de_perfil'] ?>"style=width:60px;height:60px;border-radius:50%;>
                        </a>
                        <h5><?= $row_obras['titulo'] ?></h5>
                    </div>
                        <div class="icon">
                            <form action="/src/salvar_imagem.php" method="get">
                                <button type="submit" name="salvar_imagem" value="<?= $row_obras['localizacao_da_imagem'] ?>" 
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                            </form>
                        </div>

                    
                    <?php if (!tipo_de_usuario_logado('administrador') && (tipo_de_usuario_logado('artista') || tipo_de_usuario_logado('utente'))): ?>

                    <div class="icon">
                        <i
                        <?php if (avaliado_positivamente_pelo_usuario($mysqli, $row_['id'], $_SESSION['id'])): ?>
                        
                            class="fa-solid fa-thumbs-up like-btn"
                            
                        <?php else: ?>
                        
                            class="fa-regular fa-thumbs-up like-btn"
                        
                        <?php endif; ?>
                        data-id="<?= $row_obras['id'] ?>"></i>
                    </div>

                    <div class="icon">
                        <i
                        <?php if (avaliado_negativamente_pelo_usuario($mysqli, $row_obras['id'], $_SESSION['id'])): ?>
                        
                            class="fa-solid fa-thumbs-down dislike-btn"
                            
                        <?php else: ?>
                        
                            class="fa-regular fa-thumbs-down dislike-btn"
                        
                        <?php endif; ?>
                        data-id="<?= $row_obras['id'] ?>"></i>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        
        <?php endwhile; ?>
        
    </section>

    <footer>
        <div class="social-icons">
            <a href="https://twitter.com/GontiKirankumar"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="https://www.facebook.com/kmunna2"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a href="https://www.linkedin.com/in/kirankumar-gonti-813870137/"><i class="fab fa-linkedin-in fa-2x"></i></a>
            <a href="https://www.instagram.com/kirankumar_gonti57/"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <div class="copyright"> &copy; 2022. Todos os direitos reservados. </div>
        <div class="arrow-up">
            <a href="#body"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>

    <script>
        const sideNav = document.getElementById("side-nav");

        function openNav() {
            sideNav.style.width = "250px";
        }

        function closeNav() {
            sideNav.style.width = "0";
        }
    </script>

</body>
</html>