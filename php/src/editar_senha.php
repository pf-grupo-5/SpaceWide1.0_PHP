<?php

require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_usuario.libs.php');



if (isset($_POST['submit'])) {
    $senha_atual = filter_input(INPUT_POST, 'senha_atual');
    $nova_senha = filter_input(INPUT_POST, 'nova_senha') ;
    $confirmacao_da_nova_senha = filter_input(INPUT_POST, 'confirmacao_da_nova_senha');
    
    $hash_da_senha = gerar_hash($nova_senha);
    $mysqli = conectar_bd();
    
    $sql = sprintf('SELECT senha FROM %s WHERE id = ?', $_SESSION['acesso']);
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $resultado = $stmt->get_result()->fetch_assoc();

    if ($resultado) { 
        if (!empty($senha_atual) || !empty($nova_senha) || empty($confirmacao_da_nova_senha)) {
            if (!password_verify($senha_atual, $resultado['senha'])) {
                echo 'nao combina 1';
            } elseif ($nova_senha != $confirmacao_da_nova_senha) {
                echo $nova_senha . '<br>';
                echo $confirmacao_da_nova_senha;
                echo 'nao combina 2';
            } else {
                $stmt = $mysqli->prepare(sprintf('UPDATE %s SET senha = ? WHERE id = ?', $_SESSION['acesso']));
                $stmt->bind_param('si', $hash_da_senha, $_SESSION['id']);
                $stmt->execute();
                ($stmt->affected_rows > 0) ? (exit('true')) : (exit('false')); 
            }
        }
    } else {
        echo 1;
    } 
}
?>