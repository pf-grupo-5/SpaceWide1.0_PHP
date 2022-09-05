<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();


/**
 * Retorna true se as informacoes do artista forem atualizadas com sucesso.
 *
 * @param object $mysqli
 * @param string $nome
 * @param string $nome_artistico
 * @param string $email
 * @param string $senha
 * @param string localizacao_da_imagem
 * @return bool 
 */
function editar_artista($mysqli, $id, $nome, $nome_artistico, $email, $senha, $localizacao_da_imagem) {
    try {
        $sql = 'UPDATE artista SET nome = ?, nome_artistico = ?, email = ?, senha = ?, localizacao_da_imagem = ?
                WHERE id = ?';

        $hash_da_senha = gerar_hash($senha);
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssssi', $nome, $nome_artistico, $email, $localizacao_da_imagem, $hash_da_senha, $id);
        $stmt->execute();
        
        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}


/**
 * Retorna true se as informacoes do cliente forem atualizadas com sucesso.
 *
 * @param object $mysqli
 * @param string $nome
 * @param string $email
 * @param string $senha
 * @param string localizacao_da_imagem
 * @return bool 
 */
function editar_cliente($mysqli, $id, $nome, $email, $senha, $localizacao_da_imagem) {
    try {
        $sql = 'UPDATE cliente SET nome = ?, email = ?, senha = ?, localizacao_da_imagem = ?
                    WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssssi', $nome, $email, $hash_da_senha, $localizacao_da_imagem, $id);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rowss > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }

}

?>