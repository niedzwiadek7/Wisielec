<!DOCTYPE HTML> 

<html lang="pl">
    <head>
        <?php
            include_once "../user/head.php";
        ?>
        <meta charset="utf-8" />
        <title> Panel administracyjny </title>
        <link rel="stylesheet" type="text/css" href="/./style.css" />
        <link rel="stylesheet" type="text/css" href="/./fontello/css/fontello.css" />
        <script src="/./wymagany.js"> </script> 
    </head>
    
    <body>
        <?php
            include_once "../user/user.php";
        ?> 
        <div id="pojemnik">
            <div id="plansza">
                Panel administracyjny
            </div>
            
            <div id="opcje">
                <div class="opcja" onclick="przekieruj ('adduser.php');">
                    <i class="icon-user-plus" style="font-size: 200px;"> </i>
                    Dodanie nowych administratorów 
                </div>

                <div class="opcja" onclick="przekieruj ('removeuser.php');">
                    <i class="icon-user-times" style="font-size: 200px;"> </i>
                    Usunięcie jednego z obecnych administratorów 
                </div>

                <div style="clear: both;"> </div>

                <div class="opcja" onclick="przekieruj ('addplayer.php');">
                    <i class="icon-help-circled" style="font-size: 200px;"> </i>
                    Dodanie haseł użytkowników 
                </div>

                <div class="opcja" onclick="przekieruj ('addquest.php');">
                    <i class="icon-plus-circled" style="font-size: 200px;"> </i> 
                    Dodanie własnych haseł 
                </div>

                <div style="clear: both;"> </div>
            </div>
            
            <div id="footer">
                Szkoda czasu na gadanie, czas się wziąć za działanie
            </div>
        </div>
    </body>
</html>