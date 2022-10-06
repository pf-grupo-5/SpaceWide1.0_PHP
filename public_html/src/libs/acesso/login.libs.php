<?php
ob_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Permite o acesso a uma conta e define as variaveis superglobais de sessao
 * 
 * @param array $dados
 * @return bool
 */
function logar_usuario(array $dados) {
    try {

        $_SESSION['id'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['nome_artistico'] = $dados['nome_artistico'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['acesso'] = $dados['acesso'];

        registrar_log(sprintf('usuario - %d logado',$dados['id']));  
        header('Location: /index.php');

        return true;

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    
    }
}


/**
 * Destroi todas as sessoes do usuario
 * 
 * @return bool
 */
function deslogar_usuario() {
    try{

        unset($_SESSION);
        session_destroy();
        header('Location: /index.php');
        
        return true;

    } catch (Exception $erro) {

        registrar_log($erro);
        return false;
    }
}

?>