<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/libs/acesso/acesso_usuario.libs.php");


if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);
    $mysqli = conectar_bd();

endif;


if (isset($_POST['create-btn'])):

    header('Location: /publico/criar-publicacao.php');

elseif (isset($_POST['update-btn']) && !empty($lista_de_ids)):

    $_SESSION['id_extraido'] = $id_extraido;
    header('Location: /publico/portfolio/editar-publicacao.php');

elseif (isset($_POST['data-update-btn'])):
    
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $estado = $_POST['estado'];
    $id = $_POST['id'];
    $total_de_obras = count($_POST['id']);

    for ($index=0; $index<$total_de_obras; $index++):

        $sql = sprintf("UPDATE obra_artistica SET titulo = '%s', subtitulo = '%s', estado = '%d' WHERE `id` = %d;",
            $titulo[$index], $subtitulo[$index], $estado[$index], $id[$index]);
        
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
    
    endfor;

    if ($_SESSION['acesso'] == "administrador" && $stmt->affected_rows > 0):
        header("Location: /administracao/publicacoes.php");
        
    elseif($_SESSION['acesso'] == 'artista' && $stmt->affected_rows > 0):
        header("Location: /publico/portfolio/publicacoes.php");

    endif;

elseif (isset($_POST['delete-btn']) && !empty($lista_de_ids)):
    
    if (deletar_obras_artisticas_do_bd($mysqli, $id_extraido)):
        header("Location: {$_SERVER['HTTP_REFERER']}");
    
    endif;

else:

    header("Location: {$_SERVER['HTTP_REFERER']}");

endif;

?>
