<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se as tags forem deletadas do banco de dados
 *
 * @param object $mysqli
 * @param string $indices
 * @return bool
 */
function deletar_multiplas_tags_do_bd($mysqli, $indices) {
    try {

        $sql = 'DELETE FROM tag WHERE id IN(?)';
        
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
 * Retorna "true" se a tag for deletada do banco de dados.
 *
 * @param object $mysqli
 * @param int $id
 * @return bool
 */
function deletar_tag_do_bd($mysqli, $id) {
    try {

        $sql = 'DELETE FROM tag WHERE id = ?';
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        registrar_log($sql);
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
        
    }    
}


/**
 * Retorna "true" se as tagmaps forem deletadas do banco de dados.
 * 
 * @return object $mysqli;
 * @param string $indices
 * @return bool 
 */
function deletar_multiplas_tagmaps_do_bd($mysqli, $indices) {
    try {

        $sql = 'DELETE FROM tagmap WHERE id IN(?)';
        
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
 * Retorna "true" se a tagmap for deletada do banco de dados.
 *
 * @param object $mysqli
 * @param int $id
 * @return bool
 */
function deletar_tagmap_do_bd($mysqli, $id) {
    try {

        $sql = 'DELETE FROM tagmap WHERE id = ?';
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        registrar_log($sql);
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
        
    }    
}


?>