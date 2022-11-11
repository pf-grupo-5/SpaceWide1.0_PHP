<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna true se os todos os usuarios forem deletados do banco de dados
 *
 * @param object $mysqli
 * @param string $indices
 * @return bool
 */
function deletar_multiplos_usuarios_do_bd($mysqli, $indices) {
    try {

        $sql = 'DELETE FROM usuario 
                WHERE id IN(?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $indices);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    } 
}


/**
 * Retorna true se o usuario for deletado do banco de dados.
 *
 * @param object $mysqli
 * @param int $id
 * @return bool
 */
function deletar_usuario_do_bd($mysqli, $id_usuario) {
    try {

        $sql = 'DELETE FROM usuario 
                WHERE id = ?';
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();

        registrar_log($sql);
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
        
    }    
}


/**
 * Retorna true se as dados do usuario forem deletados
 * do banco de dados e do sistema de arquivos.
 * 
 * @param object $mysqli
 * @param int $id_usuario
 * @return bool
 */
function deletar_usuario($mysqli, $id_usuario) {
    try {
        
        if (deletar_usuario_do_bd($mysqli, $id_usuario) && 
            deletar_diretorio(sprintf('/usuarios/%d', $id_usuario))):
        
            return true;
        
        endif;

        return false;

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}


?>