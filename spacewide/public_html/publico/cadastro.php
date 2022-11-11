<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(usuario_logado()) ? (header('Location: /index.php')) : (null);

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
    <link rel="stylesheet" href="/src/inc/css/cadastro.css" type="text/css">
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Cadastro</title>
</head>
<body>
    <div class="note">
        <?php

        if (!isset($_GET['cadastro'])) :

        else:
            $mensagem_de_cadastro = $_GET['cadastro'];

            if ($mensagem_de_cadastro == 'email_invalido'):
                echo "<p>E-mail ja cadastrado.</p>";
            elseif ($mensagem_de_cadastro == 'senha_invalida'):
                echo '<p>Sua senha deve conter no mínimo 8 caracteres, 2 letras maiúsculas, 3 letras minúsculas, 2 números e 1 caractere especial.</p>';
            elseif ($mensagem_de_cadastro == 'senhas_incompativeis'):
                echo '<p>As senhas devem ser iguais.</p>';
            elseif ($mensagem_de_cadastro == 'erro_de_cadastramento'):
                echo '<p>Ocorreu um erro. Tente novamente mais tarde.</p>';
            endif;
        endif;  
        ?>

    </div>
    <div class="wrapper">
        <form class='form'  action='/src/cadastrar_usuario.php' method='post'>
            <div class="title">Cadastro</div>
            <div class="form">
                <div class='inputfield'>
                    <input type='text' class="input" name='nome' max="60" placeholder='Nome...' required>
                </div>
                
                <div class='inputfield'>
                    <input type='email' class="input" name='email' max="75" placeholder='Email...' required>
                </div>

                <div class='inputfield'>
                    <input type='password' class="input" id="senha" name='senha' max="75" placeholder='Senha...' required>
                </div>

                <div class='inputfield'>
                    <input type='password' class="input" id="confirmacao_de_senha" name='confirmacao_de_senha' max="75" placeholder='Confirmar senha...' required>
                </div>
                <div class='inputfield'>
                    <label class="check">
                        <input type="checkbox" onclick="mostrar_senha()">
                        <span class="checkmark"></span>
                    </label>
                    <p>Mostrar senha</p>
                </div>

                <div class="inputfield terms">
                    <label class="check">
                        <input type="checkbox" name='termos-de-servicos' required/>
                        <span class="checkmark"></span>
                    </label>
                    <p>Eu concordo com os <span id="myBtn">termos de serviço e privacidade</span></p>

                   <div id="myModal" class="modal">

                   <div class="modal-content">
                     <span class="close">&times;</span>
                      <h2 class="h31">
Os serviços do Space Wide são fornecidos pela pessoa física, Hedyvan, em razão de
prover um espaço de divulgação de imagens entre usuários.<br>
<h3>Objetivo</h3><br>
A plataforma visa licenciar o uso de seu site, fornecendo um ambiente que facilite e
beneficie os usuários.<br>
A plataforma caracteriza-se pela prestação do serviço: divulgação de obras artísticas e
interação entre artistas e seu público.<br>
<br><h3>Aceitação</h3><br>
O presente Termo estabelece obrigações contratadas de livre e espontânea vontade, por
tempo indeterminado, entre a plataforma e as pessoas usuárias do site.<br>
Ao utilizar a plataforma o usuário aceita integralmente as presentes normas e
compromete-se a observá-las, sob o risco de aplicação das penalidades cabíveis.<br>
A aceitação do Termo é imprescindível para o acesso e para a utilização de quaisquer
serviços fornecidos pelo site.<br>
Caso não concorde com as condições deste Termo, o usuário não deve utilizar o site.<br>
<br><h3>Cadastro</h3><br>
O acesso às funcionalidades da plataforma exigirá a realização de um cadastro prévio.<br>
Ao se cadastrar o usuário deverá informar dados completos, recentes e válidos, sendo de
sua exclusiva responsabilidade manter referidos dados atualizados, bem como o usuário se
compromete com a veracidade dos dados fornecidos.<br>
O usuário se compromete a não informar seus dados cadastrais e de acesso à plataforma a
terceiros, responsabilizando-se integralmente pelo uso que deles seja feito.<br>
Mediante a realização do cadastro o usuário declara e garante expressamente ser
plenamente capaz de exercer e usufruir livremente os serviços e obras do site.<br>
O usuário deverá fornecer um endereço de e-mail válido, através do qual o site realizará
todas as comunicações necessárias.<br>
Após a confirmação do cadastro, o usuário possuirá um login e uma senha pessoal, a qual
assegura ao usuário o acesso individual à mesma. Desta forma, cabe ao usuário
exclusivamente a manutenção de referida senha de maneira confidencial e segura, evitando
o acesso indevido às informações pessoais.<br>
Caberá ao usuário assegurar que o seu dispositivo seja compatível com as características
técnicas que viabilize a utilização da plataforma e dos serviços ou obras.<br>
O usuário poderá, a qualquer momento, requerer o cancelamento de seu cadastro junto ao
site. O seu descadastramento será realizado o mais rapidamente possível.<br>
O usuário, ao aceitar os Termos e Política de Privacidade, autoriza expressamente a
plataforma a coletar, usar, armazenar, tratar, ceder ou utilizar as informações derivadas do
uso dos serviços do site, incluindo todas as informações preenchidas pelo usuário no
momento em que realizar ou atualizar seu cadastro, além de outras expressamente
descritas na Política de Privacidade que deverá ser autorizada pelo usuário.<br>
<br><h3>Serviços e obras</h3><br>
A plataforma poderá disponibilizar para o usuário um conjunto específico de funcionalidades
e ferramentas para otimizar o uso dos serviços e obras.
Na plataforma as obras ou serviços oferecidos estão descritos e apresentados com o maior
grau de exatidão, contendo informações sobre suas características, origem, entre outros
dados.<br>
Suporte
Em caso de qualquer dúvida, sugestão ou problema com a utilização da plataforma, o
usuário poderá entrar em contato com o suporte, através do email:
spacewide1305@gmail.com
Estes serviços de atendimento ao usuário estarão disponíveis 24 (vinte e quatro) horas por
dia, todas as semanas, para sempre.<br>
<br><h3>Responsabilidades</h3><br>
É de responsabilidade do usuário:<br>
<br>● a correta utilização da plataforma, dos serviços ou obras oferecidas, prezando pela
boa convivência, pelo respeito e cordialidade entre os usuários;<br>
● pelo cumprimento e respeito ao conjunto de regras disposto neste Termo de
Condições Gerais de Uso, na respectiva Política de Privacidade e na legislação
nacional e internacional;<br>
● pela proteção aos dados de acesso à sua conta (login e senha).<br>
<br><h3>É de responsabilidade do Space Wide:</h3><br>
● indicar as características do serviço ou obra;<br>
● os defeitos encontrados nos serviços oferecidos desde que lhe tenha dado causa;<br>
● as informações que foram por ele divulgadas, sendo que os comentários ou
informações divulgadas por usuários são de inteira responsabilidade dos próprios
usuários;<br>
● os conteúdos ou atividades ilícitas praticadas através da plataforma;<br>
<br><h3>Direitos do SpaceWide</h3><br>
O presente Termo de Uso concede aos usuários uma licença não exclusiva, não transferível
e não sublicenciável, para acessar e fazer uso da plataforma, dos serviços e das obras por
ela disponibilizadas.<br>
A estrutura do site, logotipos, layouts, gráficos e design de interface, imagens, ilustrações,
fotografias e quaisquer outras informações e direitos de propriedade intelectual do Space
Wide, sob os termos da Lei da propriedade Industrial (n° 9.279/ 96), Lei de Direitos Autorais
(n° 9.610/ 98) e Lei do Software (n° 9.609/ 98), estão devidamente reservados.<br>
Este Termo de Uso não cede ou transfere ao usuário qualquer direito, de modo que o
acesso não gera qualquer direito de propriedade intelectual ao usuário, exceto pela licença
limitada ora concedida.<br>
O uso da plataforma pelo usuário é pessoal, individual e intransferível, sendo vedado
qualquer uso não autorizado, comercial ou não-comercial. Tais usos consistirão em violação
dos direitos de propriedade intelectual do Space Wide, puníveis nos termos da legislação
aplicável.<br>
<br><h3>Regras</h3><br>
Sem prejuízo das demais medidas legais cabíveis, o Space Wide poderá, a qualquer
momento, advertir, suspender ou cancelar a conta do usuário que:<br>
<br>● publicar conteúdo pornográfico;<br>
● publicar conteúdo que incite preconceito a determinado grupo da sociedade
pertencente a alguma alguma etnia, ou orientação sexual;<br>
● publicar conteúdo que insinue qualquer tipo de regime totalitarista;<br>
● violar qualquer norma do presente Termo;<br>
● descumprir os seus deveres de usuário;<br>
● tiver qualquer comportamento fraudulento, doloso ou que ofenda a terceiros.<br>
<br>O não cumprimento das obrigações pactuadas neste Termo de Uso ou da legislação
aplicável poderá, sem prévio aviso, ensejar a imediata rescisão unilateral por parte do
Space Wide e o bloqueio de todos os serviços prestados ao usuário.<br>
<br><h3>Política de Privacidade</h3><br>
Além do presente Termo, o usuário deverá consentir com as normas contidas na respectiva
Política de Privacidade a ser apresentada a todos os interessados dentro da interface da
plataforma.</h2>
                  </div>

               </div>

                </div>
            
                <div class="inputfield">
                    <input type="hidden" name="acesso" value="utente">
                    <button type="submit" value="Register" class="btn" name="submit">Cadastrar-se</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrar_senha() {
        var senha = document.getElementById("senha");
        var confirmacao_de_senha = document.getElementById("confirmacao_de_senha")
        if (senha.type === "password") {
            senha.type = "text";
            confirmacao_de_senha.type = "text";
        } else {
            senha.type = "password";
            confirmacao_de_senha.type = "password";
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


</body>
</html>