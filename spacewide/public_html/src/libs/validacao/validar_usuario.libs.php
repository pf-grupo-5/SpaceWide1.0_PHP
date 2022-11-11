<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se o email ainda nao consta no banco de dados
 *
 * @param string $email
 * @return bool
 */
function verificar_singularidade_de_email($mysqli, $email) {
    try {

        $sql = 'SELECT id 
                FROM usuario 
                WHERE email = ?';
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
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
 * Retorna "true" se a senha for segura
 *
 * @param string $senha
 * @retun bool
 */
function verificar_seguranca_da_senha($senha) {
    if (preg_match("/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,}$/", $senha)):
        
        return true;
    
    endif;
    
    return false;
}


/**
 * Retorna "true" se o usuario for ativado com sucesso
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function ativar_usuario($mysqli, $dados) {
    try {
        $sql = 'UPDATE usuario 
                SET estado = "ativo" 
                WHERE estado != "ativo" AND email = ? AND codigo_validador = ?';

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $dados['email'], $dados['codigo_validador']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}

?>
