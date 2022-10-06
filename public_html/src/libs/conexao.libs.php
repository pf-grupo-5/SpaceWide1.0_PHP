<?php


/**
 * Realiza a conexao com o banco de dados
 *
 * @return object
 */
function conectar_bd() {
    
    $DB_SERVER = 'localhost';
    $DB_NAME = 'id18944596_spacewide_bd';
    $DB_USERNAME = 'id18944596_root';
    $DB_PASSWORD = 'PU+qn<4plxt_TSrK';
    
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
