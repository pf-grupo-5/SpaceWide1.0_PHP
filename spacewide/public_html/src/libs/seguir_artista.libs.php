<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna a quantidade de seguidores que o artista possui
 * 
 * @param object $mysqli
 * @param int $id_usuario_seguido
 * @return int 
 */
function obter_quantidade_de_seguidores($mysqli, $id_usuario_seguido) {
    
    try {
        $sql = "SELECT COUNT(id) FROM inscricao 
                WHERE id_usuario_seguido = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_usuario_seguido);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        
        registrar_log($sql);

        return $resultado['COUNT(id)'];

    } catch (Exception $erro) {

        registrar_log($erro);
        return 3000;

    }

}


/**
 * Retorna a true se o usuario ja avaliou positivamente uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return bool
 */
function artista_seguido_pelo_usuario($mysqli, $id_usuario_seguidor, $id_usuario_seguido) {

    try {

        $sql = "SELECT * 
                FROM inscricao
                WHERE id_usuario_seguidor = ? AND id_usuario_seguido = ?";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $id_usuario_seguidor, $id_usuario_seguido);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        registrar_log($sql);

        return ($resultado->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }

}


/**
 * Retorna "true" se a inscricao for realizada com sucesso
 * 
 * @param object $mysqli
 * @param int $id_usuario_seguidor
 * @param int $id_usuario_seguido
 * @return bool
 */
function seguir_artista($mysqli, $id_usuario_seguidor, $id_usuario_seguido) {

    try {

        $sql = "INSERT INTO inscricao (id_usuario_seguidor, id_usuario_seguido) 
                VALUES (?,?)
                ON DUPLICATE KEY UPDATE 
                    id_usuario_seguidor = ?,
                    id_usuario_seguido = ?";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiii", $id_usuario_seguidor, $id_usuario_seguido, $id_usuario_seguidor, $id_usuario_seguido);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;

    }

}


/**
 *  Retorna "true" se a delecao da inscricao for realizada com sucesso
 * 
 * @param object $mysqli
 * @param int $id_usuario_seguidor
 * @param int $id_usuario_seguido
 * @return bool
 */

function cancelar_inscricao($mysqli, $id_usuario_seguidor, $id_usuario_seguido) {
    try {
        
        $sql = "DELETE FROM inscricao 
                WHERE id_usuario_seguidor = ? AND id_usuario_seguido = ?";
                
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ii', $id_usuario_seguidor, $id_usuario_seguido);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->affected_rows > 0) ? (true) : (false);
        
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
        
    }
}

?>