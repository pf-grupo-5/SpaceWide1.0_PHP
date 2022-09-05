<?php


/**
 * Realiza a conexao com o banco de dados
 *
 * @return object
 */
function conectar_bd() {
    
    $DB_SERVER = 'sql307.epizy.com';
    $DB_NAME = 'epiz_32094758_website_bd';
    $DB_USERNAME = 'epiz_32094758';
    $DB_PASSWORD = 'GaLZtwCGqHj';
    
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
