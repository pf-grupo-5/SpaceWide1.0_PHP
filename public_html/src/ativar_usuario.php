<?php

require_once (__DIR__ . '/inicializador.php');


(usuario_logado()) ? (header('Location: /index.php')) : (null);

$mysqli = conectar_bd();

$dados['acesso'] = filter_input(INPUT_GET, 'acesso');
$dados['email'] = filter_input(INPUT_GET, 'id');
$dados['codigo_validador'] = filter_input(INPUT_GET, 'codigo_validador');

if (ativar_usuario($mysqli, $acesso, $email, $codigo_validador)):
    header("location: /publico/login.php");
endif;

header('Location: /index.php');

?>
