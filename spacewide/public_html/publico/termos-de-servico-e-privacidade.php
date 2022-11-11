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
    <link rel="shortcut icon" href="/src/inc/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Termos de serviço e privacidade</title>
</head>
<body id="body">
    
    <header>
        
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>
        
    </header>
    
<section class="row" id="row">
</section>

    <footer>
        <div class="social-icons">
            <a href="https://twitter.com/GontiKirankumar"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="https://www.facebook.com/kmunna2"><i class="fab fa-facebook-f fa-2x"></i></a>
            <a href="https://www.linkedin.com/in/kirankumar-gonti-813870137/"><i class="fab fa-linkedin-in fa-2x"></i></a>
            <a href="https://www.instagram.com/kirankumar_gonti57/"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <div class="copyright"> &copy; 2022. Todos os direitos reservados. </div>
        <div class="arrow-up">
            <a href="#body"><i class="fas fa-arrow-up"></i></a>
        </div>
    </footer>

    <script>
        const sideNav = document.getElementById("side-nav");

        function openNav() {
            sideNav.style.width = "250px";
        }

        function closeNav() {
            sideNav.style.width = "0";
        }
    </script>

</body>
</html>