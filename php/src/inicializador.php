<?php

session_start();

include_once(__DIR__ . "/libs/auxiliares.libs.php");
include_once(__DIR__ . "/libs/avaliar_obra_artistica.libs.php");

include_once(__DIR__ . "/libs/conexao.libs.php");
include_once(__DIR__ . "/libs/hash.libs.php");
include_once(__DIR__ . "/libs/log.libs.php");
include_once(__DIR__ . "/libs/redirecionadores.libs.php");

include_once(__DIR__ . "/libs/acesso/login.libs.php");

include_once(__DIR__ . "/libs/edicao/cadastrar_usuario.libs.php");
include_once(__DIR__ . "/libs/edicao/cadastrar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/edicao/deletar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/edicao/deletar_usuario.libs.php");

include_once(__DIR__ . "/libs/edicao/editar_usuario.libs.php");

include_once(__DIR__ . "/libs/email/enviar_email.libs.php");

include_once(__DIR__ . "/libs/validacao/validar_imagem.libs.php");
include_once(__DIR__ . "/libs/validacao/validar_usuario.libs.php");

?>
