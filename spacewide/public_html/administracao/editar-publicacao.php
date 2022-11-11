<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(!tipo_de_usuario_logado('administrador')) ? (exit(header('Location: .index.php'))) : (null);


$mysqli = conectar_bd();

$sql = sprintf('SELECT id, titulo, subtitulo, estado, data_de_criacao, data_da_ultima_modificacao 
                FROM obra_artistica
                WHERE id IN (%s)', $_SESSION['id_extraido']);

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
    <link rel="stylesheet" type="text/css" href="/src/inc/css/perfil.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/src/inc/javascript/avaliar_obra_artistica.js"></script>
    
    <title>Inicio</title>
</head>
<body id="body">
    <div class='wrapper'>
        <form class='form' action='/administracao/editar_publicacao.php' method='post'>
            <div class='input-group-container'>
            <div class="title">Editar</div>
            
            <?php
    
            if ($resultado->num_rows > 0):
                while ($row = $resultado->fetch_assoc()):
    
            ?>
    
            <div class='input-group'>
                <div class='inputfield'>
                    <input type='text' class="input" name='titulo[]' value='<?= $row["titulo"] ?>' placeholder='titulo'>
                </div>
    
                <div class='inputfield'>
                    <input type='text' class="input" name='subtitulo[]' value='<?php echo($row["subtitulo"]) ?>' placeholder='tag'>
                </div>
    
                <div class='inputfield'>
                    <select class="input" name='estado[]'>
                        <option value="" selected hidden><?= $row['estado'] ?></option>
                        <option value='1'>publicada</option>
                        <option value="2">pendente</option>
                        <option value="3">indisponivel</option>
                    </select>
                </div>
    
                <div class='inputfield'>
                    <input type='hidden' name='id[]' value='<?= $row["id"] ?>'>
                </div>
            </div>
    
            <?php
    
                endwhile;
            endif;
    
            ?>
    
            </div>
    
            <button type='submit' class='btn' name='data-update-btn'>Atualizar</button>
    
        </form>
    </div>
</body>
</html>