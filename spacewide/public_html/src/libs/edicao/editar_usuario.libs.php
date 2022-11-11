<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se as informacoes dos usuarios forem atualizadas com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_multiplos_usuarios_do_bd($mysqli, $dados) {
    try {

        $total_de_usuarios_selecionados = count($dados['id']);
        for ($indice=0; $indice<=$total_de_usuarios_selecionados; $indice++):
            
            $sql = 'UPDATE usuario 
                    SET nome = ?, nome_artistico = ?, estado = ?, acesso = ? 
                    WHERE id = ?';
        
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssssi', $dados['nome'][$indice], $dados['nome_artistico'][$indice], 
                $dados['estado'][$indice], $dados['acesso'][$indice], $dados['id'][$indice]);
            $stmt->execute();

            registrar_log($sql);
        
        endfor;
        
        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se as informacoes do usuario forem atualizadas com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET nome = ?, nome_artistico = ?, email = ?, 
                    senha = ?, localizacao_da_imagem_de_perfil = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssssi', $dados['nome'], $dados['nome_artistico'], $dados['email'], $dados['senha'], $dados['localizacao_da_imagem_de_perfil'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se o nome do usuario for atualizado com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_nome_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET nome = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['nome'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se o nome artistico do usuario for atualizado com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_nome_artistico_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET nome_artistico = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['nome_artistico'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se o email do usuario for atualizado com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_email_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET email = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['email'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se a senha do usuario for atualizada com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function editar_senha_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET senha = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['senha'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


/**
 * Retorna "true" se a localizacao da imagem de perfil do usuario for atualizada com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
 function editar_localizacao_da_imagem_de_perfil_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET localizacao_da_imagem_de_perfil = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['localizacao_da_imagem_de_perfil'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


 /**
 * Retorna "true" se o acesso do usuario for atualizado com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
 function editar_acesso_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET acesso = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['acesso'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}


 /**
 * Retorna "true" se o estado do usuario for atualizado com sucesso.
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
 function editar_estado_do_usuario_do_bd($mysqli, $dados) {
    try {

        $sql = 'UPDATE usuario 
                SET estado = ? 
                WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $dados['estado'], $dados['id']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt-> execute() || $stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}

?>