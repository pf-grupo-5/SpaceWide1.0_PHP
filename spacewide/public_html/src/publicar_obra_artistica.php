<?php

require_once(__DIR__ . '/inicializador.php');


(!tipo_de_usuario_logado('artista')) ? (header('Location: /index.php')) : (null);

if (isset($_POST['submit'])):

    $mysqli = conectar_bd();

    
    $dados_da_imagem['nome_da_imagem'] = $_FILES['arquivo']['name'];
    $dados_da_imagem['nome_da_imagem_tmp'] = $_FILES['arquivo']['tmp_name'];
    $dados_da_imagem['tamanho_da_imagem'] = $_FILES['arquivo']['size'];
    
    $dados_da_imagem['erro_da_imagem'] = $_FILES['arquivo']['error'];
    $dados_da_imagem['tipo_da_imagem'] = $_FILES['arquivo']['type'];

    $extensao_da_imagem = pathinfo($dados_da_imagem['nome_da_imagem']);

    $dados_da_imagem['novo_nome_da_imagem'] = uniqid('', true) . '.' . $extensao_da_imagem['extension'];
    $dados_da_imagem['destinacao'] = sprintf('%s/usuarios/%d/publicacoes/%s', $_SERVER['DOCUMENT_ROOT'], $_SESSION['id'], $dados_da_imagem['novo_nome_da_imagem']);
    
    
    $dados['id'] = $_SESSION['id'];
    $dados['titulo'] = filter_input(INPUT_POST, 'titulo');
    $dados['subtitulo'] = filter_input(INPUT_POST, 'subtitulo');
    $dados['localizacao_da_imagem'] = sprintf('/usuarios/%d/publicacoes/%s', $_SESSION['id'], $dados_da_imagem['novo_nome_da_imagem']);
    $dados['tag'] = filter_input(INPUT_POST, 'tag');

    if (!verificar_compatibilidade_da_imagem($extensao_da_imagem['extension'])) {
        header("Location: /publico/portfolio/criar-publicacao.php?publicacao=tipo_de_imagem_invalida");
        exit(); 
    }

    if (!verificar_erro_na_imagem($dados_da_imagem['erro_da_imagem'])) {
        header("Location: /publico/portfolio/criar-publicacao.php?publicacao=erro_na_imagem");
        exit();
    }


    if (registrar_obra_artistica_no_bd($mysqli, $dados) && 
        armazenar_imagem_no_sistema_de_arquivos($dados_da_imagem['nome_da_imagem_tmp'], $dados_da_imagem['destinacao'])) 
    {
   
        header("Location: /publico/portfolio/publicacoes.php?publicacao=operacao_bem_sucedida");
        exit();

    } else {
        
        header("Location: /publico/portfolio/publicacoes.php?publicacao=operacao_mal_sucedida");
        exit();

    }

endif;

?>
