<?php

require_once(__DIR__ . '/inicializador.php');

if (isset($_POST['submit'])):
    
    $dados['senha'] = filter_input(INPUT_POST, "nova_senha");
    $dados['confirmacao_de_senha'] = filter_input(INPUT_POST, "confirmacao_da_nova_senha");
    $dados['codigo_validador'] = filter_input(INPUT_POST, "codigo_validador");
    $dados['email'] = filter_input(INPUT_POST, "email");
    $dados['id'] = filter_input(INPUT_POST, "id");
    
    $mysqli = conectar_bd();
    
    /*
    if (!verificar_seguranca_da_senha($dados['senha'])) {
        header("Location: /publico/redefinir-senha.php?erro=senha_invalida");
        exit();
    }
    */
    
    if ($dados['senha'] != $dados['confirmacao_de_senha']) {
        header("Location: /publico/redefinir-senha.php?erro=senhas_incompativeis");
        exit();
    }
    
    $dados['senha'] = gerar_hash($dados['senha']);
    
    if (editar_senha_do_usuario_do_bd($mysqli, $dados)) {
        
        deslogar_usuario();
        header("Location: /index.php?perfil=senha_atualizada");
        exit();
    
    } else {

        header("Location: /publico/redefinir-senha.php?".$_GET['codigo_validador']."&email=".$_GET['email']."perfil=erro");
        exit();
    
    }

elseif (usuario_logado()):
    
    $texto = sprintf("Clique <a href='https://projetofinal1305s.000webhostapp.com/publico/redefinir-senha.php?email=%s&codigo_validador=%s'>aqui</a>.", $_GET['email'], $_GET['codigo_validador']);

    enviar_email($_GET['nome'], $_GET['email'], 'Redefinicao de senha', $texto);

    header('Location: /publico/configuracoes/seguranca-e-privacidade.php?email=email_enviado');

else:
    
    $texto = sprintf("Clique <a href='https://projetofinal1305s.000webhostapp.com/publico/redefinir-senha.php?email=%s&codigo_validador=%s'>aqui</a>.", $_GET['email'], $_GET['codigo_validador']);

    enviar_email($_GET['nome'], $_GET['email'], 'Redefinicao de senha', $texto);

    header('Location: /publico/login.php?email=email_enviado');

endif;

?>
