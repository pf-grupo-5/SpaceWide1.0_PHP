<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");

(!tipo_de_usuario_logado('administrador') || !tipo_de_usuario_logado('artista')) ? (header('Location: /index.php')) : (null);

if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);
    $mysqli = conectar_bd();

endif;

if (isset($_POST['create-btn'])):

    header('Location: /publico/portfolio/criar-publicacao.php');

elseif (isset($_POST['update-btn']) && !empty($lista_de_ids)):

    $_SESSION['id_extraido'] = $id_extraido;
    header('Location: /publico/portfolio/editar-publicacao.php');

elseif (isset($_POST['data-update-btn'])):
    
    $dados['titulo'] = $_POST['titulo'];
    $dados['subtitulo'] = $_POST['subtitulo'];
    $dados['estado'] = $_POST['estado'];
    $dados['id'] = $_POST['id'];
    $total_de_obras_selecionadas = count($_POST['id']);

        editar_obra_artistica_do_bd($mysqli, $dados[]); //fazer alguma coisa se ocorrer um erro

    header("Location: {$_SERVER['HTTP_REFERER']}");

endif;

?>