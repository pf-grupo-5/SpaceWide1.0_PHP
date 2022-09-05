<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/ja_logado.libs.php');



if (isset($_POST['submit'])) {
    
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmacao_de_senha = filter_input(INPUT_POST, 'confirmacao_de_senha');

    $codigo_validador = rand(10000000,99999999);

    $mysqli = conectar_bd();

    if (verificar_singularidade_de_email($mysqli, $email)) {
        header("Location: /publico/cadastro.php?cadastro=email_invalido");
        exit();
    }

    if (!verificar_seguranca_da_senha($senha)) {
        header("Location: /publico/cadastro.php?cadastro=senha_invalida");
        exit();
    }

    if ($senha != $confirmacao_de_senha) {
        header("Location: /publico/cadastro.php?cadastro=senhas_incompativeis");
        exit();
    }

    if (!cadastrar_cliente_no_bd($mysqli, $nome, $email, $senha, $codigo_validador)) {
        header("Location: /publico/cadastro.php?cadastro=erro_de_cadastramento");
        exit(); 
    }

    $texto = sprintf("Clique <a href='http://spacewide5.infinityfreeapp.com/src/validar_email.php?acesso=cliente&id=%s&codigo_validador=%d'>aqui</a>.", $email, $codigo_validador);

    enviaremail($nome, $email, 'Validar conta', $texto);

    header('Location: /publico/mensagem-de-verificacao-de-email.php');

}

?>
