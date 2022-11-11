<?php 

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inicializador.php");

(!usuario_logado()) ? (exit(header('Location: /index.php'))) : (null);

$mysqli = conectar_bd();

$sql = "SELECT 
            obra_artistica.id, obra_artistica.id_usuario, obra_artistica.titulo, 
            obra_artistica.localizacao_da_imagem, 
            usuario.id, usuario.nome, usuario.localizacao_da_imagem_de_perfil 
          FROM obra_artistica 
            INNER JOIN usuario ON usuario.id = obra_artistica.id_usuario  
            INNER JOIN inscricao ON inscricao.id_usuario_seguidor = ? AND 
                       inscricao.id_usuario_seguido = usuario.id 
          WHERE 
            obra_artistica.estado = 'publicada' 
          ORDER BY obra_artistica.data_da_ultima_modificacao DESC";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$resultado = $stmt->get_result();

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
    <link rel="stylesheet" type="text/css" href="/src/inc/css/inscricoes.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/src/inc/javascript/avaliar_obra_artistica.js"></script>
    
    <title>Inscricoes</title>
</head>
<body id="body">
    <header>        
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>
         <div class="content">
            <h1>Inscrições</h1>
            
        </div>
    </header>

    <section class="row" id="row" ?>
        <?php while ($row = $resultado->fetch_assoc()): ?>

        <div class="column">
            <div class="img-wrapper" >
                <a href="<?= sprintf('/publico/imagem.php?src=%s', $row['localizacao_da_imagem']) ?>" >
                <img src="<?= $row['localizacao_da_imagem'] ?>" alt="<?= $row['titulo'] ?>">
                </a>
                <div class="overlay">
                    <div class="user">
                        <a href="<?= sprintf('/publico/portfolio.php?id=%d', $row['id_usuario']) ?>" >
                            <img src="<?= $row['localizacao_da_imagem_de_perfil'] ?>"style=width:60px;height:60px;border-radius:50%;>
                        </a>
                        <h5><?= $row['titulo'] ?></h5>
                    </div>
                        <div class="icon">
                            <form action="/src/salvar_imagem.php" method="get">
                                <button type="submit" name="salvar_imagem" value="<?= $row['localizacao_da_imagem'] ?>" 
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                            </form>
                        </div>

                    
                    <?php if (!tipo_de_usuario_logado('administrador') && (tipo_de_usuario_logado('artista') || tipo_de_usuario_logado('utente'))): ?>

                    <div class="icon">
                        <i
                        <?php if (avaliado_positivamente_pelo_usuario($mysqli, $row['id'], $_SESSION['id'])): ?>
                        
                            class="fa-solid fa-thumbs-up like-btn"
                            
                        <?php else: ?>
                        
                            class="fa-regular fa-thumbs-up like-btn"
                        
                        <?php endif; ?>
                        data-id="<?= $row['id'] ?>"></i>
                    </div>

                    <div class="icon">
                        <i
                        <?php if (avaliado_negativamente_pelo_usuario($mysqli, $row['id'], $_SESSION['id'])): ?>
                        
                            class="fa-solid fa-thumbs-down dislike-btn"
                            
                        <?php else: ?>
                        
                            class="fa-regular fa-thumbs-down dislike-btn"
                        
                        <?php endif; ?>
                        data-id="<?= $row['id'] ?>"></i>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
        
        <?php endwhile; ?>
        
    </section>

    <footer>
        <div class="copyright">2022</div>
        <div class="arrow-up">
            <a href="#body"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>
    
</body>
</html>