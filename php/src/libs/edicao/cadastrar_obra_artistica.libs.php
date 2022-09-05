<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Cadastra uma obra de arte no banco de dados
 * 
 * @param object $mysqli
 * @param int $id_artista
 * @param string $titulo
 * @param string $descricao
 * @param string $localizacao_da_imagem
 * @param bool $disponibilidade
 * @return void
 */
function cadastrar_obra_artistica_no_bd($mysqli, $id_artista, $titulo, $subtitulo, $localizacao_da_imagem) {
    try {
        $sql = 'INSERT INTO obra_artistica (id_artista, titulo, subtitulo, localizacao_da_imagem) VALUES (?,?,?,?)';
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('isss', $id_artista, $titulo, $subtitulo, $localizacao_da_imagem);
        $stmt->execute();

        registrar_log($sql);

        return($stmt->affected_rows > 0) ? (true) : (false);
    
    } catch (Exception $erro) {
        registrar_log($erro);
    }
}


/**
 * Retorna true quando uma imagem é armazenada com sucesso
 *
 * @param string $nome_da_imagem_tmp
 * @param string $destinacao
 * @return bool
 */
function armazenar_imagem($nome_da_imagem_tmp, $destinacao) {
    try {
        $caminho = pathinfo($destinacao);
        criar_diretorio($caminho['dirname']);

        return (move_uploaded_file($nome_da_imagem_tmp, $destinacao) == true) ? (true) : (false);
  
    } catch (Exception $erro) {
        registrar_log($erro);
    }
 }

?>