<?php

require_once(__DIR__ . '/inicializador.php');

if (isset($_POST['submit'])):
    
    $dados['nome_artistico'] = filter_input(INPUT_POST, 'nome_artistico');
    $dados['acesso'] = filter_input(INPUT_POST, "acesso");
    $dados['codigo_validador'] = uniqid('', true);
    $dados['email'] = filter_input(INPUT_POST, "email");
    $dados['id'] = $_SESSION['id'];

    // ========================================== //

    $dados_da_imagem['nome_da_imagem'] = $_FILES['arquivo']['name'];
    $dados_da_imagem['nome_da_imagem_tmp'] = $_FILES['arquivo']['tmp_name'];
    $dados_da_imagem['tamanho_da_imagem'] = $_FILES['arquivo']['size'];
    $dados_da_imagem['erro_da_imagem'] = $_FILES['arquivo']['error'];
    $dados_da_imagem['extensao_da_imagem'] = pathinfo($nome_da_imagem);
    $dados_da_imagem['novo_nome_da_imagem'] = uniqid('', true) . '.' . $dados['extensao_da_imagem']['extension'];
    $dados_da_imagem['destinacao_da_imagem'] = $_SERVER['DOCUMENT_ROOT'] . '/usuarios/{$_SESSION["id"]}/foto_de_perfil/{$novo_nome_da_imagem}';

    $dados['localizacao_da_foto_de_perfil'] = sprintf('/usuarios/{$_SESSION["id"]}/foto_de_perfil/{$novo_nome_da_imagem}');
    
    // ========================================== //
    
    $mysqli = conectar_bd();

    if ($dados_da_imagem['tamanho_da_imagem'] > 0) {

        if (!validar_imagem($dados_da_imagem) && !armazenar_imagem_no_sistema_de_arquivos($dados_da_imagem['nome_da_imagem_tmp'], $dados_da_imagem['destinacao_da_imagem'])) {
            
                $dados_da_imagem['destinacao_da_imagem'];
            
                header("Location: /publico/configuracoes/perfil.php?perfil=perfil_atualizado");
                exit();
            
        } else {
            header("Location: /publico/cadastro-de-artista.cadastro=erro");
            exit();
        }

    }

    if (editar_nome_artistico_do_usuario_do_bd($mysqli, $dados) && 
        editar_acesso_do_usuario_do_bd($mysqli, $dados)) {
        
        deslogar_usuario();
        header("Location: /publico/login.php?perfil=atualizado");
        exit();
    
    } else {

        header("Location: /publico/perfil.php?cadastro=erro");
        exit();
    
    }

else:
    
    $texto = sprintf("Clique <a href='https://projetofinal1305s.000webhostapp.com/publico/cadastro-de-artista.php?email=%s&codigo_validador=%s'>aqui</a>.", $_GET['email'], $_GET['codigo_validador']);

    enviar_email($_GET['nome'], $_GET['email'], 'Validar conta de artista', $texto);

    header('Location: /publico/configuracoes/perfil.php?email=email_enviado');
    
endif;

?>
