<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_cliente.libs.php');

$mysqli = conectar_bd();

$sql  = 'INSERT INTO artista (nome, email, senha, localizacao_da_imagem,
        estado, codigo_validador) SELECT nome, email, senha, localizacao_da_imagem,
        estado, codigo_validador FROM cliente WHERE id = ?;';

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();

deletar_diretorio(sprintf('/storage/emulated/0/Tgs/projects/spacewide/usuarios/cliente/foto_de_perfil/%d', $_SESSION['id']));
deletar_conta_do_bd($mysqli);

$sql_2 = 'SELECT id, nome, email, "artista" AS acesso FROM artista WHERE email = ?';

$stmt_2 = $mysqli->prepare($sql_2);
$stmt_2->bind_param('s', $_SESSION['email']);
$stmt_2->execute();
$resultado = $stmt_2->get_result()->fetch_assoc();

logar_usuario($resultado);

?>
