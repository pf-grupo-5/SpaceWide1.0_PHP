<?php

session_start();

// ========================================== //
include_once(__DIR__ . "/libs/avaliar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/conexao.libs.php");
include_once(__DIR__ . "/libs/hash.libs.php");
include_once(__DIR__ . "/libs/log.libs.php");

// ========================================== //
include_once(__DIR__ . "/libs/acesso/acesso_usuario.libs.php");
include_once(__DIR__ . "/libs/acesso/login.libs.php");

// ========================================== //
include_once(__DIR__ . "/libs/edicao/deletar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/edicao/deletar_tag.libs.php");
include_once(__DIR__ . "/libs/edicao/deletar_usuario.libs.php");

include_once(__DIR__ . "/libs/edicao/editar_diretorio.libs.php");
include_once(__DIR__ . "/libs/edicao/editar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/edicao/editar_tag.libs.php");
include_once(__DIR__ . "/libs/edicao/editar_usuario.libs.php");

include_once(__DIR__ . "/libs/edicao/registrar_obra_artistica.libs.php");
include_once(__DIR__ . "/libs/edicao/registrar_tag.libs.php");
include_once(__DIR__ . "/libs/edicao/registrar_usuario.libs.php");
// ========================================== //

include_once(__DIR__ . "/libs/email/enviar_email.libs.php");

// ========================================== //
include_once(__DIR__ . "/libs/validacao/validar_imagem.libs.php");
include_once(__DIR__ . "/libs/validacao/validar_usuario.libs.php");

?>
