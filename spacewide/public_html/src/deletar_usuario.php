<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(!tipo_de_usuario_logado('administrador')) ? (header('Location: /index.php')) : (null);

if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);
    $mysqli = conectar_bd();

endif;

//botao criar representa um link. Ok? Sandro do futuro



if (isset($_POST['delete-btn']) && !empty($lista_de_id_acesso)) {
    
    $dados['indices'] = $id_extraido;

    deletar_multiplos_usuarios_do_bd($mysqli, $dados['indices']);
    
    header('Location: /administracao/usuarios.php');

} else {
    header("Location: {$_SERVER["HTTP_REFERER"]}");;
}

?>
