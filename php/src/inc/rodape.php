<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


if (!isset($_SESSION['id']) || !isset($_SESSION['nome']) || !isset($_SESSION['acesso'])) {
    echo('
        <div class="footer-container">
            <p class="footer-warning-text">Para poder ter acesso a mais imagens, voce deve 
            acessar sua conta atraves do formulario de login. Caso voce ainda
             nao possui uma conta, cadastra-se ;)</p>
            <a href="/publico/login.php">Login</a>
            <a href="/publico/cadastro.php">Cadastre-se</a>
        </div>');
} else {
    echo('
    <div class="footer-container">
    <div class="col">
        <h1>Sobre</h1>
        <ul>
            <li><a href="#"></a>Sobre</li>
            <li><a href="#"></a>Redes sociais</li>
        </ul>
    </div>
    <div class="col">
        <h1>Lorem</h1>
        <ul>
            <li><a href="#"></a>Lorem</li>
            <li><a href="#"></a>Lorem</li>
            <li><a href="#"></a>Lorem</li>
            <li><a href="#"></a>Lorem</li>
        </ul>
    </div>
    </div>

');
}

?>