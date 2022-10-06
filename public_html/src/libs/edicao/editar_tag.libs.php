<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se as informacoes da obra artistica forem atualizadas com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_tag_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE tag 
                SET titulo = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['titulo'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}

?>