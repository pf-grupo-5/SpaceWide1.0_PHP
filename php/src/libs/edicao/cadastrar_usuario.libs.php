<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


$mysqli = conectar_bd();

/**
 * Cadastra administrador no banco de dados.
 * 
 * @param object $mysqli
 * @param string $nome
 * @param string $email
 * @param string $senha
 * @param string $codigo_validador
 * @return bool
 */
function cadastrar_administrador_no_bd($mysqli, $nome, $email, $senha, $codigo_validador) {
    try {
        $hash_da_senha = gerar_hash($senha);
        $sql = 'INSERT INTO administrador (nome, email, senha, codigo_validador) 
                VALUES (?,?,?,?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssss', $nome, $email, $hash_da_senha, $codigo_validador);
        $stmt->execute();

        log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {
        log($erro);
    }
}

/**
 * Cadastra artista no banco de dados.
 * 
 * @param object $mysqli
 * @param string $nome
 * @param string $nome_artistico
 * @param string $email
 * @param string $senha
 * @param string $codigo_validador
 * @return bool
 */
function cadastrar_artista_no_bd($mysqli, $nome, $nome_artistico, $email, $senha, $codigo_validador) {
    try {
        $hash_da_senha = gerar_hash($senha);
        $sql = 'INSERT INTO artista 
                (nome, nome_artistico, email, senha, codigo_validador) 
                VALUES (?,?,?,?,?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssss', $nome, $nome_artistico, $email, $hash_da_senha, $codigo_validador);
        $stmt->execute();

        log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {
        log($erro);
    }
}


/**
 * Cadastra artista no banco de dados.
 * 
 * @param object $mysqli
 * @param string $nome
 * @param string $email
 * @param string $senha
 * @param string $codigo_validador
 * @return bool
 */
function cadastrar_cliente_no_bd($mysqli, $nome, $email, $senha, $codigo_validador) {
    try {
        $hash_da_senha = gerar_hash($senha);
        $sql = 'INSERT INTO cliente 
                (nome, email, senha, codigo_validador) 
                VALUES (?,?,?,?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssss', $nome, $email, $hash_da_senha, $codigo_validador);
        $stmt->execute();

        log($sql);

        return ($stmt->affected_rows > 0) ? (true) : (false);
        
    } catch (Exception $erro) {
        log($erro);
    }
}

?>