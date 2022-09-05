<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


if (!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['email'])):
  
    unset($_SESSION);
    session_destroy();
    header('Location: /index.php');
    exit;

else:

    if ($_SESSION['acesso'] != 'administrador'):
	    
        header('Location: /index.php');
		exit;

	endif;

endif;

?>