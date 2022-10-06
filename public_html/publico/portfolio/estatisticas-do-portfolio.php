<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_artista.libs.php');

visualizar('cabecalho', ['titulo' => 'Estatisticas do portifolio']);
visualizar('menu');
visualizar('dashboard_sidebar');

$mysqli = conectar_bd();

?>
