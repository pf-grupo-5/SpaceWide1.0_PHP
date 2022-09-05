<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_usuario.libs.php');

visualizar('cabecalho', ['titulo' => 'Perfil']);
visualizar('menu');
visualizar('sidebar');

?>

<?php visualizar('rodape') ?>