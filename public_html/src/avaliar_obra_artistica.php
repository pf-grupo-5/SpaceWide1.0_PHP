<?php

require_once(__DIR__ . '/inicializador.php');


(!usuario_logado()) ? (header('Location: /index.php')) : (null);

$mysqli = conectar_bd();

if (isset($_POST['action'])):
    
    $id_obra_artistica = filter_input(INPUT_POST, 'id_obra_artistica');
    $avaliacao = filter_input(INPUT_POST, 'action');
    
    switch ($avaliacao) {
        
        case 'like':
            
            avaliar_obra_artistica($mysqli, $id_obra_artistica, $_SESSION['id'], 1);
            break;
            
        case 'dislike':
            
            avaliar_obra_artistica($mysqli, $id_obra_artistica, $_SESSION['id'], -1);
            break;
        
        case 'unlike':
            
            deletar_avaliacao($mysqli, $id_obra_artistica, $_SESSION['id']);
            break;
            
        case 'undislike':
            
            deletar_avaliacao($mysqli, $id_obra_artistica, $_SESSION['id']);
            break;
    }
    
endif;


?>

