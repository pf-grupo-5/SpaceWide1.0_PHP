<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();


/**
 * Retorna true se os todos os usuarios forem deletados do banco de dados
 *
 * @param object $mysqli
 * @param string $tipo_de_usuario
 * @param array $indice
 * @return bool
 */
function deletar_usuarios_do_bd($mysqli, $tipo_de_usuario, $indice) {
    try {
        $sql = sprintf('DELETE FROM %s WHERE id = %d', $tipo_de_usuario, $indice);
        
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        
        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? ('true') : ('false');

    } catch (Exception $erro) {
        registrar_log($erro);
    } 
}


/**
 * Retorna true se o usuario for deletado do banco de dados.
 *
 * @param object $mysqli
 * @return bool
 */
function deletar_conta_do_bd($mysqli) {
    try {
        $sql = sprintf('DELETE FROM %s WHERE id = %d', 
          $_SESSION['acesso'], $_SESSION['id']);
    
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }    
}

?>