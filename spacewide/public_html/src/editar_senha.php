<?php

require_once(__DIR__ . '/inicializador.php');

(!usuario_logado()) ? (header('Location: /index.php')) : (null);


if (isset($_POST['submit'])):
    
    $senha_atual = filter_input(INPUT_POST, 'senha_atual');
    $nova_senha = filter_input(INPUT_POST, 'nova_senha') ;
    $confirmacao_da_nova_senha = filter_input(INPUT_POST, 'confirmacao_da_nova_senha');
    
    $hash_da_senha = gerar_hash($nova_senha);
    $mysqli = conectar_bd();
    
    $sql = 'SELECT senha FROM usuario WHERE id = ?';
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado) { 
        
        if (!empty($senha_atual) || !empty($nova_senha) || empty($confirmacao_da_nova_senha)) {
            
            if (!password_verify($senha_atual, $resultado['senha'])) {
                
                (exit(header('Location: /publico/configuracoes/seguranca-e-privacidade.php?perfil=senha incorreta')));
            
            } elseif ($nova_senha != $confirmacao_da_nova_senha) {
        
                echo $nova_senha . '<br>';
                echo $confirmacao_da_nova_senha;
                (exit(header('Location: /publico/configuracoes/seguranca-e-privacidade.php?perfil=senhas incompativeis')));
        
            } else {

                $stmt = $mysqli->prepare('UPDATE usuario SET senha = ? WHERE id = ?');
                $stmt->bind_param('si', $hash_da_senha, $_SESSION['id']);
                $stmt->execute();
                ($stmt->affected_rows > 0) ? (exit(header('Location: /publico/configuracoes/seguranca-e-privacidade.php?perfil=atualizado'))) : (exit(header('Location: /publico/configuracoes/seguranca-e-privacidade.php?perfil=nao atualizado'))); 
        
            }
        
        }
        
    } else {
        
        echo 1;
        
    } 

endif;

?>
