    <nav class="sidebar">
        <div class="menu-items">
            <ul>
                <li class="menu-item"><a href="/publico/configuracoes/perfil.php">Perfil publico</a></li>
                <li class="menu-item"><a href="/publico/configuracoes/seguranca-e-privacidade.php">Seguranca e privacidade</a></li>
                <?php 

                if ($_SESSION['acesso'] == 'artista') {
                    echo('<li class="menu-item"><a href="#">Configurar Portifolio</a></li>');
                }

                ?>
                <li class="menu-item"><a href="#">Histórico</a></li>
                <li class="menu-item"><a href="#">Notificacoes</a></li>
                <li class="menu-item"><a href="#">Sobre</a></li>
            </ul>
        </div>
    </nav