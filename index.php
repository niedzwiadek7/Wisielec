<?php
    session_start();
?>

<html lang="pl"> 
    <head> 
        <meta charset = "utf-8" /> 
        <title> Szubienica </title>
        
        <link rel="stylesheet" href="style.css" type="text/css" /> 
        <script src="wymagany.js"> </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body>
    <?php
        include_once "user/user.php"; 
    ?> 
        
       <div id="pojemnik">
            <div id="plansza"> 
                SZUBIENICA
            </div>
           
            <div class="wybor" onclick="przekieruj('gra/gra.php');">
                <div style="height: 36px;"> </div>
                 Wylosuj z bazy danych
                <div style="height: 36px;"> </div>
            </div>
            
           <div class="wybor" onclick="przekieruj('gra/dodaj.php');">
                <div style="height: 36px;"> </div>
                    Zagraj z drugim graczem
                <div style="height: 36px;"> </div>
           </div>
        </div>
    </body>
</html>	