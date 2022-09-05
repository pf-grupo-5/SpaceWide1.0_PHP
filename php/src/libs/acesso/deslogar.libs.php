<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


if (isset($_SESSION)) {
    
    unset($_SESSION);
    session_destroy();
    header('Location: /index.php');
}

?>