<?php

require_once(__DIR__ . '/inicializador.php');


$mysqli = conectar_bd();

(!usuario_logado()) ? (header('Location: /index.php')) : (null);

if (deletar_usuario($mysqli, $_SESSION['id'])):
    //redirecionamento com mensagem
    header('Location: /index.php');
else:
    //redirecionamento com mensagem
endif;

?>

