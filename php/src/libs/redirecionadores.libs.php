<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');

 
/**
 * Redireciona para um url
 * 
 * @param string $url
 * @return void
 */
function redirecionar_para(string $url) {
    header('Location:' . $url);
    exit;
}


/**
 * Redireciona para uma url com dados armazenados na array de itens
 * 
 * @param string $url
 * @param array itens
 * @return void
 */
function redirecionar_com(string $url, array $itens) {
    foreach ($itens as $item => $valor) {
        $_SESSION[$item] = $valor;
    }
    header('Location: . $url');
    exit;
}

?>
