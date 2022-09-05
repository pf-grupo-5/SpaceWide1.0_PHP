<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();


/**
 * Retorna true se todas as obras artisticas forem deletadas
 *
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function deletar_obras_artisticas_do_bd($mysqli, $indices) {
    try {
        $sql = sprintf('DELETE FROM obra_artistica WHERE id IN (%s)', $indices);

        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        
        registrar_log($sql);
        
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}


/**
 * Retorna true se todas a obra artistica for deletada
 *
 * @param object $mysqli
 * @param int $id
 * @return bool
 */
function deletar_obra_artistica($mysqli, $id) {
    try {
        $sql = 'DELETE FROM obra_artistica WHERE localizacao_da_imagem = ?';

        $stmt = $myslqli->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}
?>