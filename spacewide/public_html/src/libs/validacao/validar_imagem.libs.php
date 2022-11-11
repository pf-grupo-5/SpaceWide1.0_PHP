<?php

define('TAMANHO_MAX_IMAGEM', (int)pow(1024, 2.45));
define('TAMANHO_MIN_IMAGEM', (int)pow(1024, 1));
define('TIPOS_DE_IMAGENS_PERMITIDAS', ['jpg', 'jpeg', 'png', 'dng', 'gif', 'webp', 'raw']);
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

    return ((TAMANHO_MIN_IMAGEM <= $tamanho_da_imagem) && ($tamanho_da_imagem <= TAMANHO_MAX_IMAGEM) ? (true) : (false));

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


/**
 * Retorna "true" se todos os dados da imagem estiverem
 * corretos
 * 
 * @param array dados_da_imagem
 * @return bool
 */
function validar_imagem($dados_da_imagem, $extensao_da_imagem) {
    try{

        if ($dados_da_imagem['tamanho_da_imagem'] <= 0): 
            return false;
        endif;

        if (verificar_compatibilidade_da_imagem($extensao_da_imagem) &&
            verificar_erro_na_imagem($dados_da_imagem['erro_da_imagem'])):

            return true;
        
        endif;

            return false;

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}

?>