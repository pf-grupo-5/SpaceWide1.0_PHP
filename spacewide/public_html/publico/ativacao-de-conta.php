<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(usuario_logado()) ? (header('Location: /index.php')) : (null);

$mysqli = conectar_bd();

$dados['email'] = filter_input(INPUT_GET, 'email');
$dados['codigo_validador'] = filter_input(INPUT_GET, 'codigo_validador');

?>

<?php if (ativar_usuario($mysqli, $dados)): ?>
    
    <p>Sua conta foi ativada com sucesso.</p>
    <a class="button" href="/publico/login.php">Realizar login</a>

<?php else: ?>

    <p>Sua conta não pôde ser ativada. &#128534;</p>
    
<?php endif; ?>