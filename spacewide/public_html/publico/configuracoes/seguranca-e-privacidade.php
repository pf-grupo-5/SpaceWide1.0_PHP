<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');

(!usuario_logado()) ? (header('Location: /index.php')) : (null);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="/src/inc/css/seguranca.css">
    <link rel="shortcut icon" href="/src/inc/assets/log">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Seguranca e privacidade</title>
</head>
<header id="body">
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>
</header>
<body>
    <div class="wrapper">
    <div class='form-container'>
        <div class='form-header'>
       <div class="title">Perfil</div>
        <p class='form-subtitle' style="color: white">
        <?php if(isset($_GET['perfil'])): ?>    
            <?php echo $_GET['perfil'] ?>
        <?php else: ?>
            <?php echo($_SESSION['nome']); ?>, aqui voce pode ver e atualizar seus dados.
        <?php endif; ?>
        </p>
        </div>
        
        <div class='inputfield'>
            <form class='form'  action='/src/editar_senha.php' method='post'>
                <div class='input-group'>
                    <input type='hidden' name='email' value='<?= $_SESSION["email"] ?>'>
                    <input type='hidden' name='codigo_validador' value='<?= $_SESSION["codigo_validador"] ?>'>
                    <div class='inputfield'>
                        <input type='password' class="input" name='senha_atual' id="senha_atual" max="75" placeholder='Senha atual' required>
                    </div>
                    <div class='inputfield'>
                        <input type='password' class="input" name='nova_senha' id="nova_senha" max="75" placeholder='Nova senha' required>
                    </div>
                    <div class='inputfield'>
                        <input type='password' class="input" name='confirmacao_da_nova_senha' id="confirmacao_da_nova_senha" max="75" onclick='mostrar_senha' placeholder='Confirmacao da nova senha' required>
                    </div>
                   <div class="control-group">
            <label class="control control-checkbox">
                <a>Mostrar senha</a>
                    <input type="checkbox" onclick="mostrar_senha()">
                    
                <div class="control_indicator"></div>
            </label>
                        <div class="inputfield">
                            <button type="submit" class="btn" name="submit">Salvar</button>
                        </div>
            </div>
           </div>
        </form>
            <form>
                 <p class="form-subtitle">Esqueceu a  <span id="myBtn">senha ?</span></p>

                 <div id="myModal" class="modal">

                   <div class="modal-content">
                     <span class="close">&times;</span>
                     <h2 class="h21">Redefinir Senha</h2>
                     <h3 class="h31">Digite seu email...</h3>
                    <input type="email" class="input"name="email" max="75" placeholder="Email..." required>
                   <button type="submit" name="submit" class="btnn1"><a href="">Enviar</a></button>
                  </div>

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
            <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var href = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
href.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

        </div>
    </div>
</body>