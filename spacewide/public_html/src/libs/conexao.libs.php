<?php


/**
 * Realiza a conexao com o banco de dados
 *
 * @return object
 */
function conectar_bd() {
    
    $DB_SERVER = 'xxxxxxxx';
    $DB_NAME = 'xxxxxxxx';
    $DB_USERNAME = 'xxxxxxxx';
    $DB_PASSWORD = 'xxxxxxxx';
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    set_exception_handler(function($e) {
        error_log($e->getMessage());
        exit($e);
    });
    
    $mysqli = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    
    return $mysqli;
}

conectar_bd();
?>
