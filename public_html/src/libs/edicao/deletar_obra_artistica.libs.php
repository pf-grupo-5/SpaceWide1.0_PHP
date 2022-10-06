<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna true se os todas as obras artisticas forem deletadas do banco de dados
 *
 * @param object $mysqli
 * @param string $indices
 * @return bool
 */
function deletar_multiplas_obras_artisticas_do_bd($mysqli, $indices) {
    try {

        $sql = 'DELETE FROM obra_artistica 
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
 * Retorna true se a obra artistica for deletada do banco de dados.
 *
 * @param object $mysqli
 * @param int $id
 * @return bool
 */
function deletar_obra_artistica_do_bd($mysqli, $id) {
    try {
        
        $sql = 'DELETE FROM obra_artistica 
                WHERE id = ?';
    
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