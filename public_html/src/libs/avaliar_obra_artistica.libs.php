<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna a quantidade de avaliacoes positivas de uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_likes($mysqli, $id_obra_artistica) {
    
    try {
        $sql = "SELECT COUNT(id) 
                FROM avaliacao 
                WHERE id_obra_artistica = ? AND avaliacao = 1";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_obra_artistica);
        $stmt->execute();
        
        registrar_log($sql);

        if ($stmt->num_rows) {
            $resultado = $stmt->get_result()->fetch_assoc();
            return $resultado;
        }
        return 0;

    } catch (Exception $erro) {

        registrar_log($erro);
        return 0;

    }

}


/**
 * Retorna a quantidade de avaliacoes negativas de uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_dislikes($mysqli, $id_obra_artistica) {
    
    try {
        $sql = "SELECT COUNT(id) 
                FROM avaliacao 
                WHERE id_obra_artistica = ? AND avaliacao = -1";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_obra_artistica);
        $stmt->execute();
        
        registrar_log($sql);

        if ($stmt->num_rows) {
            $resultado = $stmt->get_result()->fetch_assoc();
            return $resultado;
        }
        return 0;

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return 0;

    }

}


/**
 * Retorna a quantidade de avaliacoes negativas de uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_avaliacoes($mysqli, $id_obra_artistica) {
    
    try {
        $sql = "SELECT COUNT(id) 
                FROM avaliacao 
                WHERE id_obra_artistica = ? AND avaliacao = IN (-1,1)";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id_obra_artistica);
        $stmt->execute();
        
        registrar_log($sql);

        if ($stmt->num_rows) {
            $resultado = $stmt->get_result()->fetch_assoc();
            return $resultado;
        }
        return 0;

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return 0;

    }

}


/**
 * Retorna a true se o usuario ja avaliou positivamente uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return bool
 */
function avaliado_positivamente_pelo_usuario($mysqli, $id_obra_artistica, $id_usuario) {

    try {

        $sql = "SELECT * 
                FROM avaliacao 
                WHERE id_obra_artistica = ? AND id_usuario = ? AND avaliacao = 1";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $id_obra_artistica, $id_usuario);
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
 * Retorna a true se o usuario ja avaliou positivamente uma obra artistica
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return bool
 */
function avaliado_negativamente_pelo_usuario($mysqli, $id_obra_artistica, $id_usuario) {

    try {

        $sql = "SELECT *
                FROM avaliacao 
                WHERE id_obra_artistica = ? AND id_usuario = ? AND avaliacao = -1";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $id_obra_artistica, $id_usuario);
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
 * Retorna "true" se a avaliacao for realizada com sucesso
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @param int $id_usuario
 * @param int $avaliacao
 * @return bool
 */
function avaliar_obra_artistica($mysqli, $id_obra_artistica, $id_usuario, $avaliacao) {

    try {

        $sql = "INSERT INTO avaliacao (id_obra_artistica, id_usuario, avaliacao) 
                VALUES (?,?,?)
                ON DUPLICATE KEY UPDATE avaliacao = ?";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiii", $id_obra_artistica, $id_usuario, $avaliacao, $avaliacao);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;

    }

}


/**
 *  Retorna "true" se a delecao da avaliacao for realizada com sucesso
 * 
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @param int $id_usuario
 * @return bool
 */

function deletar_avaliacao($mysqli, $id_obra_artistica, $id_usuario) {
    try {
        
        $sql = "DELETE FROM avaliacao
                WHERE id_obra_artistica = ? AND id_usuario = ?";
                
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ii', $id_obra_artistica, $id_usuario);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->affected_rows > 0) ? (true) : (false);
        
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;
        
    }
}

?>