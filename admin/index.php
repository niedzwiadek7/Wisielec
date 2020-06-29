<!DOCTYPE HTML> 

<html lang="pl">
    <head>
        <?php
            session_start();
            include_once "../user/head.php";
            if (!isset($_SESSION['zalogowany'])) header ('Location: ../'); 
            else if ($_SESSION['admin']!=1) header ('Location: ../');
        ?>
        <meta charset="utf-8">
        <title> Panel administracyjny </title>
        <link rel="stylesheet" type="text/css" href="/wisielec/style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="/wisielec/fontello/css/fontello.css">
        <script src="/wisielec/wymagany.js"> </script> 
    </head>
    
    <body>
        <?php
            include_once "../user/user.php";
        ?> 
        
        <header>
            <h1 class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> Panel administracyjny </h1>
        </header>
        
        <main>
            
            <div class="container">
                
                <div class="row">
                    
                    <div onclick="przekieruj('adduser.php');" class="opcja col-xl-3 col-md-6">
                        <i class="icon-user-plus text-center"> </i>
                        <div> Dodanie nowych administratorów </div> 
                    </div>
                    
                    <div onclick="przekieruj('removeuser.php');" class="opcja col-xl-3 col-md-6">
                        <i class="icon-user-times"> </i>
                        <div> Usunięcie jednego z obecnych administratorów </div> 
                    </div>
                    
                    <div onclick="przekieruj('addplayer.php');" class="opcja col-xl-3 col-md-6">
                        <i class="icon-help-circled"> </i>
                        <div> Dodanie haseł użytkowników </div>
                    </div>
                    
                    <div onclick="przekieruj('addquest.php');" class="opcja col-xl-3 col-md-6">
                        <i class="icon-plus-circled"> </i> 
                        <div> Dodanie własnych haseł </div>
                    </div>
                    
                </div>
            </div>
        </main>
        
        <footer class="text-center mt-2 p-3 p-lg-5">
            Szkoda czasu na gadanie, czas się wziąć za działanie
        </footer>
            
    </body>
</html>