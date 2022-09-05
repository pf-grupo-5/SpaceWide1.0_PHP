<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();


/**
 * Retorna true se o email ainda nao consta no banco de dados
 *
 * @param string $senha
 * @retun bool
 */
function verificar_singularidade_de_email($mysqli, $email) {
    try { 
        $sql = 'SELECT id FROM administrador WHERE email = ?
                UNION 
                SELECT id FROM artista WHERE email = ?
                UNION 
                SELECT id FROM cliente WHERE email = ?';
    
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sss', $email, $email, $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        registrar_log($sql);

        return ($resultado->num_rows > 0) ? (true) : (false);
        
    } catch (Exception $erro) {
        registrar_log($erro);
   }
}


/**
 * Retorna true se a senha for segura
 *
 * @param string $senha
 * @retun bool
 */
function verificar_seguranca_da_senha($senha) {
    if (preg_match("/^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8,}$/", $senha)) {
        return true;
    }
    return false;
}


/**
 * Retorna true se o usuario for cadastrado com sucesso
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function ativar_usuario($mysqli, $acesso, $email, $codigo_validador) {
    try {
        $sql = sprintf('UPDATE %s SET estado = "ativo" WHERE
                estado = "inativo" AND
                email = ? AND codigo_validador = ?', $acesso);

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $email, $codigo_validador);

        $stmt->execute();
        $resultado = $stmt->get_result();
        $resultado->num_rows;

        registrar_log($sql);

        return ($resultado->num_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}

?>
