<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_artista.libs.php');



if (isset($_POST['submit'])):

    $nome_da_imagem = $_FILES['arquivo']['name'];
    $nome_da_imagem_tmp = $_FILES['arquivo']['tmp_name'];
    $tamanho_da_imagem = $_FILES['arquivo']['size'];
    
    $erro_da_imagem = $_FILES['arquivo']['error'];
    $tipo_da_imagem = $_FILES['arquivo']['type'];

    $titulo = filter_input(INPUT_POST, 'titulo');
    $sub_titulo = filter_input(INPUT_POST, 'sub_titulo');
    
    $extensao_da_imagem = pathinfo($nome_da_imagem);

    $novo_nome_da_imagem = uniqid('', true) . '.' . $extensao_da_imagem['extension'];
    $destinacao = sprintf('%s/usuarios/%s/publicacoes/%u/%s', $_SERVER['DOCUMENT_ROOT'], $_SESSION['acesso'], $_SESSION['id'], $novo_nome_da_imagem);
    $destinacao_bd = sprintf('/usuarios/%s/publicacoes/%u/%s',$_SESSION['acesso'], $_SESSION['id'], $novo_nome_da_imagem); 
    

    if (!verificar_compatibilidade_da_imagem($extensao_da_imagem['extension'])) {
        header("Location: /publico/criar-publicacao.php?publicacao=tipo_de_imagem_invalida");
        exit(); 
    }

    if (!verificar_tamanho_da_imagem($tamanho_da_imagem)) {
        header("Location: /publico/criar-publicacao.php?publicacao=tamanho_de_imagem_invalido");
        exit();
    }

    if (!verificar_erro_na_imagem($erro_da_imagem)) {
        header("Location: /publico/criar-publicacao.php?publicacao=erro_na_imagem");
        exit();
    }

    if (!armazenar_imagem($nome_da_imagem_tmp, $destinacao)) {
        header("Location: /publico/criar-publicacao.php?publicacao=upload_incompleto");
        exit();
    }

    if (cadastrar_obra_artistica_no_bd($mysqli, $_SESSION['id'], $titulo, $sub_titulo,$destinacao_bd) 
    && armazenar_imagem($nome_da_imagem_tmp, $destinacao)) {
   
        header("Location: /publico/portfolio/publicacoes.php?publicacao=operacao_mal_sucedida");
        exit();

    } else {
        
        header("Location: /publico/portfolio/publicacoes.php?publicacao=operacao_bem_sucedida");
        exit();

    }

endif;

?>
