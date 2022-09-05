<?php 

require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inicializador.php");


$mysqli = conectar_bd();

if (!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['email'])):

        $sql = "SELECT obra.id, obra.titulo, obra.localizacao_da_imagem, artista.id AS id_artista, 
                artista.nome, artista.localizacao_da_imagem AS localizacao_da_foto_de_perfil 
            FROM obra_artistica AS obra 
            INNER JOIN artista ON artista.id = obra.id_artista 
            WHERE obra.estado = 'publicada' 
            ORDER BY obra.data_de_criacao DESC
            LIMIT 35";

else:
    
    $sql = "SELECT obra.id, obra.titulo, obra.localizacao_da_imagem, artista.id AS id_artista, 
                artista.nome, artista.localizacao_da_imagem AS localizacao_da_foto_de_perfil 
            FROM obra_artistica AS obra 
            INNER JOIN artista ON artista.id = obra.id_artista 
            WHERE obra.estado = 'publicada' 
            ORDER BY obra.data_de_criacao DESC";
            
endif;

if (isset($_GET['submit-search'])):

    $item_de_pesquisa = filter_input(INPUT_GET, 'search-bar');

    $_sql = "SELECT obra.id, obra.titulo, obra.localizacao_da_imagem, artista.id AS id_artista,
                artista.nome, artista.localizacao_da_imagem AS localizacao_da_foto_de_perfil 
            FROM obra_artistica AS obra 
            INNER JOIN artista ON artista.id = obra.id_artista 
            WHERE obra.estado = 'publicada' AND LOWER(CONCAT(obra.titulo, obra.subtitulo, artista.nome)) 
            LIKE LOWER('%". $item_de_pesquisa ."%') 
            ORDER BY obra.data_de_criacao DESC";
            
endif;

$stmt = $mysqli->prepare($sql);
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
    <link rel="stylesheet" type="text/css" href="/src/inc/css/main.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Inicio</title>
</head>
<body id="body">
    <header>        
        
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>

        <div class="content">
            <h1>SpaceWide</h1>
            <p>Vidas, fardos, meros dados incontáveis, casos de desamor. Quanta dor, muita dor...Sucumbir com certeza representa uma meta</p>
        </div>

        <div class="search">
            <form action="" method="get">
                <input type="search" name="search-bar" placeholder="Search Images"/>
                <button type="submit" name="submit-search"><i class="fas fa-search fa-2x"></i></button>
            </form>
        </div>
    </header>

    <section class="row" id="row">
        
        <?php while ($row = $resultado->fetch_assoc()): ?>

        <div class="column">
            <div class="img-wrapper">
                <img src="<?= $row['localizacao_da_imagem'] ?>" alt="<?= $row['titulo'] ?>">
                <div class="overlay">
                    <div class="user">
                        <a href="<?= sprintf('/publico/portfolio.php?id=%d', $row['id_artista']) ?>" >
                            <img src="<?= $row['localizacao_da_foto_de_perfil'] ?>">
                        </a>
                        <h5><?= $row['titulo'] ?></h5>
                    </div>

                    <div class="icon">
                        <form action="/src/salvar_imagem.php" method="get">
                            <button type="submit" name="submit" value="<?= $row['localizacao_da_imagem'] ?>" class="b-btn">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                        </form>
                    </div>

                    <?php if ((isset($_SESSION['id']) || isset($_SESSION['nome']) || isset($_SESSION['email'])) && $_SESSION['acesso'] != "administrador"): ?>

                    <div class="icon">
                        <?php if (avaliado_positivamente_pelo_usuario($mysqli, $row['id'])): ?>
                            <button>
                                <i class="fa-regular fa-heart" data-id="<?= $row['id'] ?>" value="0"></i>
                            </button>
                        <?php else: ?>
                            <button>
                                <i class="fa-regular fa-heart" data-id="<?= $row['id'] ?>" value="1"></i>
                            </button>
                        <?php endif; ?>
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
    
    <script src="/src/inc/javascript/avaliar_obra_artistica.js"></script>

</body>
</html>