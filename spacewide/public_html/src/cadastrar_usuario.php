<?php

require_once(__DIR__ . '/inicializador.php');


if (isset($_POST['submit'])):

    $dados['nome'] = filter_input(INPUT_POST, 'nome');
    $dados['nome_artistico'] = filter_input(INPUT_POST, 'nome_artistico');
    $dados['email'] = filter_input(INPUT_POST, 'email');
    $dados['senha'] = filter_input(INPUT_POST, 'senha');
    $dados['acesso'] = filter_input(INPUT_POST, "acesso");
    $dados['confirmacao_de_senha'] = filter_input(INPUT_POST, 'confirmacao_de_senha');
    $dados['codigo_validador'] = rand(1000000000, 9000000000).time();

    $mysqli = conectar_bd();

    if (verificar_singularidade_de_email($mysqli, $dados['email'])) {
         header("Location: ".$_SERVER['HTTP_REFERER']."?cadastro=email_invalido");
        exit();
    }
/*
    if (!verificar_seguranca_da_senha($dados['senha'])) {
        header("Location: /publico/cadastro.php?cadastro=senha_invalida");
        exit();
    }
*/
    if ($dados['senha'] != $dados['confirmacao_de_senha']) {
        header("Location: ".$_SERVER['HTTP_REFERER']."?cadastro=senhas_incompativeis");
        exit();
    }

    if (!registrar_usuario_no_bd($mysqli, $dados)) {
        header("Location: ".$_SERVER['HTTP_REFERER']."?cadastro=erro_de_cadastramento");
        exit(); 
    }

    $texto = sprintf("Clique <a href='https://projetofinal1305s.000webhostapp.com/publico/ativacao-de-conta.php?email=%s&codigo_validador=%s'>aqui</a>.", $dados['email'], $dados['codigo_validador']);

    enviar_email($dados['nome'], $dados['email'], 'Validar conta', $texto);

    if (tipo_de_usuario_logado('administrador')) {
        exit(header('Location: /administracao/usuarios.php'));
    }
    
    exit(header('Location: /publico/login.php'));

endif;

?>
