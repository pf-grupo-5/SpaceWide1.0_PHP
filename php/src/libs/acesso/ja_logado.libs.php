<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


if (isset($_SEESION)) {
  
    header('Location: /index.php');
    exit;

}

?>