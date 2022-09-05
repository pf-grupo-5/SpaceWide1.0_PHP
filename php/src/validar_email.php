<?php

require_once (__DIR__ . '/inicializador.php');
require_once (__DIR__ . '/libs/acesso/ja_logado.libs.php');

$mysqli = conectar_bd();

$acesso = filter_input(INPUT_GET, 'acesso');
$email = filter_input(INPUT_GET, 'id');
$codigo_validador = filter_input(INPUT_GET, 'codigo_validador');

if (ativar_usuario($mysqli, $acesso, $email, $codigo_validador));
    header("location: /publico/login.php");
?>
