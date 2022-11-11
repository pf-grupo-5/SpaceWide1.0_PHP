<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Registra um usuario no banco de dados e retorna
 * "true" se o mesmo for registrado no banco de dados.
 * 
 * @param object $mysqli
 * @param array $dados[]
 * @return bool
 */
function registrar_usuario_no_bd($mysqli, $dados) {
    try {
        
        $dados['senha'] = gerar_hash($dados['senha']);
        $sql = 'INSERT INTO usuario (nome, nome_artistico, email, senha, acesso, codigo_validador)
                VALUES (?,?,?,?,?,?)';

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssssss', $dados['nome'], $dados['nome_artistico'], 
            $dados['email'], $dados['senha'], $dados['acesso'], $dados['codigo_validador']);
        $stmt->execute();

        registrar_log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}

?>