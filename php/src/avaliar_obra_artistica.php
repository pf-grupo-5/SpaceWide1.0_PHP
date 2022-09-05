<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/usuario.libs.php');

$mysqli = conectar_bd();

if ($_POST['submit']):

    $obra_artistica_id = filter_input(INPUT_POST, 'obra_artistica_id');
    $acao_de_avaliacao = filter_input(INPUT_POST, 'acao_de_avaliacao');
    
    ($_SESSION['acesso' == "artista"]) ? ($id_artista = $_SESSION['id']) : ($id_artista = "NULL");
    ($_SESSION['acesso' == "cliente"]) ? ($id_cliente = $_SESSION['id']) : ($id_cliente = "NULL");

    switch ($acao_de_avaliacao):

    case 'like':

        $sql = "INSERT INTO avaliacao (id_obra_artistica, id_artista, id_cliente, avaliacao) 
                    VALUES (?,?,?,1)
                    ON DUPLICATE KEY UPDATE avaliacao = 1";

        break;

    case 'deslike';

        $sql = "INSERT INTO avaliacao (id_obra_artistica, id_artista, id_cliente, avaliacao) 
                    VALUES (?,?,?,0)
                    ON DUPLICATE KEY UPDATE avaliacao = 0";

        break;

    case 'unlike':

        $sql = "DELETE FROM avaliacao 
			        WHERE obra_artistica_id = ? AND artista_id = ? AND cliente_id = ?";

        break;

    case 'undeslike':

        $sql = "DELETE FROM avaliacao 
			        WHERE obra_artistica_id = ? AND artista_id = ? AND cliente_id = ?";
        
        break;

    default:

        break;

    endswitch;


    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('iii', $id_obra_artistica, $id_artista, $id_cliente);
    $stmt->execute();


endif;

?>