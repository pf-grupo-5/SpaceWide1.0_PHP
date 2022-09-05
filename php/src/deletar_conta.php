<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_usuario.libs.php');

$mysqli = conectar_bd();
var_export($_SESSION);
if ($_SESSION['acesso'] == 'administrador') {
    if (deletar_conta_do_bd($mysqli)) {
        require(__DIR__ . '/libs/acesso/deslogar.libs.php');
    }
    //erro ao deletar conta.....

} elseif ($_SESSION['acesso'] == 'artista') {
    require_once(__DIR__ . '/libs/acesso/acesso_artista.libs.php');

    $sql = 'DELETE FROM obra_artistica WHERE id_artista = ?';

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute(); 

    if (deletar_conta_do_bd($mysqli)) { 
        var_export(deletar_diretorio(sprintf('/storage/emulated/0/Tgs/projects/spacewide/usuarios/artista/publicacoes/%d', $_SESSION['id'])));
        var_export(deletar_diretorio(sprintf('/storage/emulated/0/Tgs/projects/spacewide/usuarios/artista/foto_de_perfil/%d', $_SESSION['id'])));
        
        require(__DIR__ . '/libs/acesso/deslogar.libs.php');
    }
    // erro ao deletar conta....
    
} elseif ($_SESSION['acesso'] == 'cliente') {
    require(__DIR__ . '/libs/acesso/acesso_cliente.libs.php');
    
    if (deletar_conta_do_bd($mysqli)) {
        deletar_diretorio(sprintf('/storage/emulated/0/Tgs/projects/spacewide/usuarios/cliente/foto_de_perfil/%d', $_SESSION['id']));
        require(__DIR__ . '/libs/acesso/deslogar.libs.php');
    }
    // erro ao deletar conta....

}

?>

