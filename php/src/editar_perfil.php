<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_usuario.libs.php');


if (isset($_POST['submit'])):
    
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $nome_da_imagem = $_FILES['arquivo']['name'];

    $nome_da_imagem_tmp = $_FILES['arquivo']['tmp_name'];
    $tamanho_da_imagem = $_FILES['arquivo']['size'];
    $erro_da_imagem = $_FILES['arquivo']['error'];

    $extensao_da_imagem = pathinfo($nome_da_imagem);
    $novo_nome_da_imagem = uniqid('', true) . '.' . $extensao_da_imagem['extension'];

    $destinacao = sprintf('%s/usuarios/%s/foto_de_perfil/%u/%s', 
        $_SERVER['DOCUMENT_ROOT'], $_SESSION['acesso'], $_SESSION['id'], $novo_nome_da_imagem);
    $destinacao_bd = sprintf('/usuarios/%s/foto_de_perfil/%u/%s',$_SESSION['acesso'], $_SESSION['id'], $novo_nome_da_imagem);

    $mysqli = conectar_bd();

    if ($_SESSION['acesso'] == 'artista'):
        $nome_artistico = filter_input(INPUT_POST, 'nome_artistico');
    
    endif; 

    if ($tamanho_da_imagem > 0):

        if (!verificar_compatibilidade_da_imagem($extensao_da_imagem['extension'])) {
            header("Location: /publico/configuracoes/perfil.php?perfil=tipo_de_imagem_invalida");
             exit(); 
        }

        if (!verificar_tamanho_da_imagem($tamanho_da_imagem)) {
            header("Location: /publico/configuracoes/perfil.php?perfil=tamanho_de_imagem_invalido");
            exit();
        }
        
        if (!verificar_erro_na_imagem($erro_da_imagem)) {
            header("Location: /publico/configuracoes/perfil.php?perfil=erro_na_imagem");
            exit();
        }

        if (!armazenar_imagem($nome_da_imagem_tmp, $destinacao)) {
            header("Location: /publico/configuracoes/perfil.php?perfil=upload_incompleto");
            exit();
        }

        $sql = sprintf("UPDATE %s SET localizacao_da_imagem = ?
                WHERE id = ?", $_SESSION['acesso']);
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('si', $destinacao_bd, $_SESSION['id']);
        $stmt->execute();

        if ($stmt->affected_rows < 0):
            echo 1;
            header("Location: /publico/configuracoes/perfil.php?perfil=erro");
            exit();

        endif;
        
    endif;
        
    $sql = sprintf('UPDATE %s SET nome = ?, email = ? 
            WHERE id = ?', $_SESSION['acesso']);
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssi', $nome, $email, $_SESSION['id']);
    
    if ($stmt->execute() || $stmt->affected_rows > 0):

        header("Location: /publico/configuracoes/perfil.php?perfil=perfil_atualizado");
        exit();
    
    else:
    
        header("Location: /publico/configuracoes/perfil.php?perfil=erro");
        exit();

    endif;

endif;

?>