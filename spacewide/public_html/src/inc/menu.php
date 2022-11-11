<nav>
    <i onclick="openNav()" class="fas fa-bars fa-2x"></i>
</nav>

<div id="side-nav">
    <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
    <a href="/index.php">Inicio</a>
    
    <?php if (tipo_de_usuario_logado('utente')): ?>
    
        <a href="/publico/inscricoes.php">Inscrições</a>
        <a href="/publico/configuracoes/perfil.php">Perfil</a>
        <a href="/publico/configuracoes/seguranca-e-privacidade.php">Segurança e privacidade</a>
        <a href="/src/deslogar.php">Sair</a>
    
    <?php elseif (tipo_de_usuario_logado('artista')): ?>
    
        <a href="/publico/inscricoes.php">Inscrições</a>
        <a href="/publico/portfolio/publicacoes.php">Publicações</a>
        <a href="/publico/portfolio/criar-publicacao.php">Publicar</a>
        <a href="/publico/configuracoes/perfil.php">Perfil</a>
        <a href="/publico/configuracoes/seguranca-e-privacidade.php">Segurança e privacidade</a>
        <a href="/src/deslogar.php">Sair</a>
    
    <?php elseif (tipo_de_usuario_logado('administrador')): ?>
    
        <a href="/administracao/publicacoes.php">Relatório de publicações</a>
        <a href="/administracao/usuarios.php">Relatório de usuário</a>
        <a href="/publico/configuracoes/perfil.php">Perfil</a>
        <a href="/publico/configuracoes/seguranca-e-privacidade.php">Segurança e privacidade</a>
        <a href="/src/deslogar.php">Sair</a>
    
    <?php else: ?>
    
    <a href="/publico/cadastro.php">Cadastro</a>
    <a href="/publico/login.php">Login</a>
    
    <?php endif; ?>
</div>

<script src="/src/inc/javascript/ativar_barra_de_navegacao_lateral.js"></script>