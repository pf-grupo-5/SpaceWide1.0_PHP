<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna "true" se o usuario esta logado.
 * 
 * @return bool
 */
function usuario_logado() {
    try{

        if ((isset($_SESSION['id']) && (isset($_SESSION['nome']) || isset($_SESSION['nome_artistico'])) && isset($_SESSION['email']))):
            return true;
        endif;

        return false;

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;

    }
}


/**
 * Retorna "true" se um tipo de usuario esta logado.
 * 
 * @param string $acesso
 * @return bool
 */
function tipo_de_usuario_logado($acesso) {
    try {

        return (usuario_logado() && $_SESSION['acesso'] == $acesso) ? (true) : (false);
    
    } catch(Exception $erro) {
        
        registrar_log($erro);
        return false;
    
    }
}

?>