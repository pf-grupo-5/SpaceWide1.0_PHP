<?php

require_once(__DIR__ . '/inicializador.php');


(usuario_logado()) ? (header('Location: /index.php')) : (null);

if (isset($_POST['submit'])) {

    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');

    $mysqli = conectar_bd();
    
    $sql = 'SELECT id, nome, email, senha, acesso, codigo_validador  
            FROM usuario 
            WHERE email = ? AND estado = "ativo"';
            
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado):
    
        if (password_verify($senha, $resultado['senha'])):
          logar_usuario($resultado);
        else:
            header("Location: /publico/login.php?login=usuario_nao_encontrado");
        endif;

    else:
        header("Location: /publico/login.php?login=usuario_nao_encontrado");

    endif;
    
}

?>
