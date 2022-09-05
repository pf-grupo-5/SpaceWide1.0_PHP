<?php
ob_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Permite o acesso a uma conta
 * 
 * @param array $dados
 * @return bool
 */
function logar_usuario(array $dados) {
    try {

        $_SESSION['id'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['email'] = $dados['email'];
        $_SESSION['senha'] = $dados['senha'];
        $_SESSION['acesso'] = $dados['acesso'];

        registrar_log(sprintf('usuario - %d logado',$dados['id']));
      
        redirecionar_para('/index.php');

    } catch (Exception $erro) {
        registrar_log($erro);
    }
}

?>