<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se as informacoes da obra artistica forem atualizadas com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_obra_artistica_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE obra_artistica 
                SET titulo = ?, subtitulo = ?, estado = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssi', $dados['titulo'], $dados['subtitulo'], $dados['estado'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se as informacoes das obras artisticas forem atualizadas com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_multiplas_obras_artisticas_do_bd($mysqli, $dados) {
    try {

        $total_de_obras_selecionadas = count($dados['id']);
        for ($indice=0; $indice<$total_de_obras_selecionadas; $indice++):
            
            $sql = 'UPDATE obra_artistica 
                    SET titulo = ?, subtitulo = ?, estado = ? 
                    WHERE id = ?';
        
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('sssi', $dados['titulo'][$indice], $dados['subtitulo'][$indice], 
                $dados['estado'][$indice], $dados['id'][$indice]);
            $stmt->execute();

            registrar_log($sql);
        
        endfor;
        
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}

?>