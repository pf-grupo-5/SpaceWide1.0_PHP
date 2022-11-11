<?php

require_once(__DIR__ . '/inicializador.php');


(!usuario_logado()) ? (header('Location: /index.php')) : (null);

if (isset($_POST['submit'])):
    
    $dados['id'] = $_SESSION['id'];
    $dados['nome'] = filter_input(INPUT_POST, 'nome');
    $dados['email'] = filter_input(INPUT_POST, 'email');
    $dados['nome_artistico'] = filter_input(INPUT_POST, 'nome_artistico');

    // ========================================== //
    
    $dados_da_imagem['nome_da_imagem'] = $_FILES['arquivo']['name'];
    $dados_da_imagem['nome_da_imagem_tmp'] = $_FILES['arquivo']['tmp_name'];
    $dados_da_imagem['tamanho_da_imagem'] = $_FILES['arquivo']['size'];
    $dados_da_imagem['erro_da_imagem'] = $_FILES['arquivo']['error'];
    
    $extensao_da_imagem = pathinfo($dados_da_imagem['nome_da_imagem']);
    
    $dados_da_imagem['novo_nome_da_imagem'] = uniqid('', true) . '.' . $extensao_da_imagem['extension'];
    $dados_da_imagem['destinacao'] = sprintf('%s/usuarios/%d/foto_de_perfil/%s', $_SERVER['DOCUMENT_ROOT'], $_SESSION['id'], $dados_da_imagem['novo_nome_da_imagem']);
    $dados['localizacao_da_imagem_de_perfil'] = sprintf('/usuarios/%d/foto_de_perfil/%s', $_SESSION['id'], $dados_da_imagem['novo_nome_da_imagem']);
    
    // ========================================== //
    
    $mysqli = conectar_bd();

    if ($dados_da_imagem['tamanho_da_imagem'] > 0) {

        if (!validar_imagem($dados_da_imagem, $extensao_da_imagem['extension']) || 
            !armazenar_imagem_no_sistema_de_arquivos($dados_da_imagem['nome_da_imagem_tmp'], $dados_da_imagem['destinacao']) || 
            !editar_localizacao_da_imagem_de_perfil_do_usuario_do_bd($mysqli, $dados))
        {
            
            header("Location: /publico/configuracoes/perfil.php?perfil=erro_na_imagem");
            exit();
            
        }

    }
    
    
    if (editar_nome_do_usuario_do_bd($mysqli, $dados) &&
        editar_nome_artistico_do_usuario_do_bd($mysqli, $dados) &&
        editar_email_do_usuario_do_bd($mysqli, $dados)) 
    {

        header("Location: /publico/configuracoes/perfil.php?perfil=perfil_atualizado");
        exit();
    
    } else {
        
        header("Location: /publico/configuracoes/perfil.php?perfil=erro");
        exit();
    
    }

endif;

?>