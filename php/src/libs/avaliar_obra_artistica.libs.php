<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


//$mysqli = conectar_bd();

($_SESSION['acesso' == "artista"]) ? ($id_artista = $_SESSION['id']) : ($id_artista = "0");
($_SESSION['acesso' == "cliente"]) ? ($id_cliente = $_SESSION['id']) : ($id_cliente = "0");


/**
 * Retorna a quantidade de avaliacoes positivas de uma obra artistica
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_likes($mysqlli, $id_obra_artistica) {
    
    try {
        $sql = "SELECT COUNT(id) FROM avaliacao 
                    WHERE id_obra_artistica = ? AND avaliacao = 1";

        $stmt->prepare($sql);
        $stmt->bind_param("i", $id_obra_artistica);
        $stmt->execute();
        
        registrar_log($sql);

        if ($stmt->num_rows) {
            $resultado = get_result()->fetch_assoc();
            return $resultado;
        }
        return 0;

    } catch (Exception $erro) {
        registrar_log($erro);
    }

}


/**
 * Retorna a quantidade de avaliacoes negativas de uma obra artistica
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_deslikes($mysqli, $id_obra_artistica) {
    
    try{
        $sql = "SELECT COUNT(id) FROM avaliacao 
                    WHERE id_obra_artistica = ? AND avaliacao = -1";

        $stmt->prepare($sql);
        $stmt->bind_param("i", $id_obra_artistica);
        $stmt->execute();

        registrar_log($sql);

        if ($stmt->num_rows) {
            $resultado = get_result()->fetch_assoc();
            return $resultado;
        }
        return 0;
    
    } catch (Exception $erro) {
        registrar_log($erro);
    }

}

/**
 * Retorna a quantidade de avaliacoes positivas e negativas de uma obra artistica
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return int 
 */
function obter_quantidade_de_avaliacoes($myslqi, $id_obra_artistica) {
    
    try {
        $sql = "SELECT COUNT(id) FROM avaliacao WHERE id_obra_artistica = ? AND avaliacao = 1
                UNION 
                SELECT COUNT(id) FROM avaliacao WHERE id_obra_artistica = ? AND avaliacao = -1";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $id_obra_artistica, $id_obra_artistica);
        $stmt->execute();
        
        registrar_log($sql);

        $avaliacoes = get_result()->fetch_assoc();
        $array_de_avaliacoes = ['likes' => $avaliacoes['COUNT(id)'][1],
                                'deslikes' => $avaliacoes['COUNT(id)'][0]];

        return json_encode($array_de_avaliacoes);

    } catch (Exception $erro) {
        registrar_log($erro);
    }

}


/**
 * Retorna a true se o usuario ja avaliou positivamente uma obra artistica
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return bool
 */
function avaliado_positivamente_pelo_usuario($mysqli, $id_obra_artistica) {

    try {
        $sql = "SELECT COUNT(id) FROM avaliacao 
                    WHERE id_obra_artistica = ? AND id_artista = ? AND id_cliente = ? AND avaliacao = 1";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iii", $id_obra_artistica, $id_artista, $id_cliente);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }

}


/**
 * Retorna a true se o usuario ja avaliou negativamente uma obra artistica
 * @param object $mysqli
 * @param int $id_obra_artistica
 * @return bool
 */
function avaliado_negativamente_pelo_usuario($mysqli, $id_obra_artistica) {

    try {
        $sql = "SELECT COUNT(id) FROM avaliacao 
                    WHERE id_obra_artistica = ? AND id_artista = ? AND id_cliente = ? AND avaliacao = -1";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iii", $id_obra_artistica, $id_artista, $id_cliente);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }

}

?>