<nav class="sidebar">
        <div class="menu-items">
            <ul>
                <?php if ($_SESSION['acesso'] == 'artista'): ?>
                    
                <li class="menu-item"><a href="/publico/portfolio/informacoes-do-portifolio.php">Informacoes do portifolio</a></li>
                <li class="menu-itme"><a href="/publico/portfolio/publicacoes.php">Publicacoes</a></li>

                <?php endif; ?>
                <?php if ($_SESSION['acesso'] == 'administrador'): ?>

                <li class="menu-item"><a href="/administracao/usuarios.php">Usuarios</a></li>
                <li class="menu-item"><a href="/administracao/publicacoes.php">Obras artisticas</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>