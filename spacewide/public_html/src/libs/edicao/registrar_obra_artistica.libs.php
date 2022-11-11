<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Registra uma obra de arte no banco de dados
 * 
 * @param object $mysqli
 * @param array $dados
 * @return bool
 */
function registrar_obra_artistica_no_bd($mysqli, $dados) {
    try {

        $sql = 'INSERT INTO obra_artistica (id_usuario, titulo, subtitulo, localizacao_da_imagem) 
                VALUES (?,?,?,?)';

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('isss', $dados['id'], $dados['titulo'], 
            $dados['subtitulo'], $dados['localizacao_da_imagem']);
        $stmt->execute();

        registrar_log($sql);

        return($stmt->affected_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}


/**
 * Retorna true quando uma imagem é armazenada com sucesso
 *
 * @param string $nome_da_imagem_tmp
 * @param string $destinacao
 * @return bool
 */
function armazenar_imagem_no_sistema_de_arquivos($nome_da_imagem_tmp, $destinacao) {
    try {

        $caminho = pathinfo($destinacao);
        criar_diretorio($caminho['dirname']);

        return (move_uploaded_file($nome_da_imagem_tmp, $destinacao)) ? (true) : (false);
  
    } catch (Exception $erro) {
        
        registrar_log($erro);
        return false;

    }
 }

?>