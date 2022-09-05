<?php

define('TAMANHO_MAX_IMAGEM', pow(1024, 2.45));
define('TAMANHO_MIN_IMAGEM', pow(1024, 1));
define('TIPOS_DE_IMAGENS_PERMITIDAS', ['jpg', 'jpeg', 'png', 'dng', 'gif', 'webp']);
define('ERRO_COD_DA_IMAGEM', 0);


/**
 * Retorna true se o formato da imagem for permitido
 * 
 * @param string $nome_da_imagem
 * @return bool
 */
function verificar_compatibilidade_da_imagem($extensao_do_arquivo) {

    return (in_array($extensao_do_arquivo, TIPOS_DE_IMAGENS_PERMITIDAS)) ? (true) : (false);
    
}


/**
 * Retorna true se o tamanho da imagem for permitido
 * 
 * @param string $tamanho_da_imagem
 * @return bool
 */
function verificar_tamanho_da_imagem($tamanho_da_imagem) {

    return (TAMANHO_MIN_IMAGEM <= $tamanho_da_imagem && $tamanho_da_imagem <= TAMANHO_MAX_IMAGEM) ? (true) : (false);

}


/**
 * Retorna true se a imagem apresenta quaisquer erros
 * 
 * @param string $erro_da_imagem
 * @return bool
 */
function verificar_erro_na_imagem(string $erro_da_imagem) {

    return ($erro_da_imagem == ERRO_COD_DA_IMAGEM) ? (true) : (false);

}

?>