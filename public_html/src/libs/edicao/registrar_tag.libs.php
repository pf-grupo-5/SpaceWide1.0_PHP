<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Registra uma tag no banco de dados e
 * retorna "true" se a tag for registrada no banco de dados
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function registrar_tag_no_bd($mysqli, $dados) {
    try {
        
        $sql = 'INSERT INTO tag (titulo) 
                VALUES (?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $dados['titulo']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
    
    }
}


/**
 * Registra uma tagmap no banco de dados e 
 * retorna "true" se a tagmap for registrada no banco de dados
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function registrar_tagmap_no_db($mysqli, $dados) {
    try {

        $sql = 'INSERT INTO tag (titulo) 
                VALUES (?)
                WHERE NOT EXISTS (
                    SELECT titulo FROM tag WHERE titulo="?"
                )';

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $dados['titulo'], $dados['titulo']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
    
    }
}

?>