<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_usuario.libs.php');

visualizar('cabecalho', ['titulo' => 'seguranca e privacidade']);
visualizar('menu');
visualizar('sidebar');

?>

 
<div class='form-container'>
    <div class='form-header'>
        <p class='form-title'>Perfil</p>
        <p class='form-subtitle'><?php echo($_SESSION['nome']) ?>, aqui voce pode ver e atualizar seus dados.</p>
    </div>
     
    <div class='security-form'>
        <form class='form'  action='/src/editar_senha.php' method='post'>
            <div class='input-group'>
                <div class='input-field'>
                    <input type='password' name='senha_atual' id="senha_atual" max="75" placeholder='Senha atual' required>
                </div>

                <div class='input-field'>
                    <input type='password' name='nova_senha' id="nova_senha" max="75" placeholder='Nova senha' required>
                </div>

                <div class='input-field'>
                    <input type='password' name='confirmacao_da_nova_senha' id="confirmacao_da_nova_senha" max="75" onclick='mostrar_senha' placeholder='Confirmacao da nova senha' required>
                </div>

                </div class='input-field'>
                    <input type="checkbox" onclick="mostrar_senha()">Mostrar senha
                </div>
                <a href="#">Esqueceu a senha?</a>

                <button type='submit' class='submit-btn' name='submit'>Salvar</button>

            </div>

        </form>

        <script>
            function mostrar_senha() {
                var senha_atual = document.getElementById("senha_atual");
                var nova_senha = document.getElementById("nova_senha");
                var confirmacao_da_nova_senha = document.getElementById("confirmacao_da_nova_senha");
                if (senha_atual.type === "password") {
                    senha_atual.type = "text";
                    nova_senha.type = "text";
                    confirmacao_da_nova_senha.type = "text";
                } else {
                senha_atual.type = "password";
                nova_senha.type = "password";
                confirmacao_da_nova_senha.type = "password";
                }
            }
        </script>
    </div>
</div>

<?visualizar('rodape') ?>