<?php

require_once(__DIR__ . '/inicializador.php');


(!usuario_logado()) ? (header('Location: /index.php')) : (null);

if (isset($_POST['action'])):

    $mysqli = conectar_bd();
    $id_usuario_seguidor = $_SESSION['id'];
    $id_usuario_seguido = filter_input(INPUT_POST, 'id_usuario_seguido');
    $acao_de_inscricao = filter_input(INPUT_POST, 'action');
    
    switch ($acao_de_inscricao) {
        
        case 'follow':
            
            seguir_artista($mysqli, $id_usuario_seguidor, $id_usuario_seguido);
            break;
            
        case 'unfollow':
            
            cancelar_inscricao($mysqli, $id_usuario_seguidor, $id_usuario_seguido);
            break;
            
    }
    
endif;


?>

