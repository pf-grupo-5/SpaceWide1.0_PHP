<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


/**
 * Retorna registra um evento do site em um arquivo texto
 * @param string $text
 * @return void
 */
function registrar_log($menssagem) {

    $log = fopen($_SERVER['DOCUMENT_ROOT'] . "/administracao/log.txt", "a") or die("Um erro ocorreu durante a gravacao");

    $texto = sprintf("%d - %s | %s - %s-%s\n ", $_SESSION['id'], $_SESSION['nome'], $menssagem, date("d/m/Y"), date("H:i:s")); 

    fwrite($log, $texto);
    fclose($log);
}

?>