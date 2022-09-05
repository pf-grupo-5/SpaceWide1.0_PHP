<nav>
    <i onclick="openNav()" class="fas fa-bars fa-2x"></i>
</nav>

<div id="side-nav">
    <i onclick="closeNav()" class="fas fa-times fa-2x"></i>
    <a href="/index.php">Inicio</a>
    
    <?php if (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 'cliente') { ?>
    <a href="#">Inscricoes</a>
    <a href="/publico/configuracoes/perfil.php">Configuração</a>
    <a href="/src/libs/acesso/deslogar.libs.php">Sair</a>
    
    <?php } elseif (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 'artista') { ?>
    
    <a href="#">Inscricoes</a>
    <a href="/publico/portfolio/informacoes-do-portfolio.php">Portfolio</a>
    <a href="/publico/configuracoes/perfil.php">Configuração</a>
    <a href="/src/libs/acesso/deslogar.libs.php">Sair</a>
    
    <?php } elseif (isset($_SESSION['acesso']) && $_SESSION['acesso'] == 'administrador') { ?>
    
    <a href="/publico/configuracoes/perfil.php">Configuração</a>
    <a href="/administracao/usuarios.php">Painel de Controle</a>
    <a href="/src/libs/acesso/deslogar.libs.php">Sair</a>
    
    <?php } else { ?>
    
    <a href="/publico/cadastro.php">Cadastro</a>
    <a href="/publico/login.php">Login</a>
    
    <?php } ?>
</div>

<script src="/src/inc/javascript/ativar_barra_de_navegacao_lateral.js"></script>