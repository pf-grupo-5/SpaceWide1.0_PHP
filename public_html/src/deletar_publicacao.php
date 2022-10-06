<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");


(!usuario_logado()) ? (header('Location: /index.php')) : (null);

if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);
    $mysqli = conectar_bd();

endif;

if (isset($_POST['delete-btn']) && !empty($lista_de_ids)):
    
    if (deletar_multiplas_obras_artisticas_do_bd($mysqli, $id_extraido)):
        header("Location: {$_SERVER['HTTP_REFERER']}");
    
    endif;

else:

    header("Location: {$_SERVER['HTTP_REFERER']}");

endif;

?>