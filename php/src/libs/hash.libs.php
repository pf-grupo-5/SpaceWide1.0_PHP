<?php


/**
 * Retorna um hash
 * 
 * @param string $mensagem
 * @return string
 */
function gerar_hash($mensagem) {
    
    $opcoes = ['cost' => 13];
    return password_hash($mensagem, PASSWORD_BCRYPT, $opcoes);
    
}


?>
