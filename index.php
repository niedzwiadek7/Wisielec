<?php
    session_start();
?>

<html lang="pl"> 
    <head> 
        <?php
            include_once "user/head.php";
        ?>
        <meta charset = "utf-8" /> 
        <title> Szubienica </title>
        <link rel="stylesheet" href="style.css" type="text/css" /> 
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body>
    <?php
        include_once "user/user.php";
    ?>        
    <main>
       
       <div class="container">
           
            <div class="h1 text-center my-5"> 
                Miejsce na hasło :D
            </div>
           
            <button class="wybor col-12 mb-3 mt-lg-5" onclick="przekieruj('gra/gra.php');">
                <p> Wylosuj z bazy danych </p> 
            </button>
            
           <button class="wybor col-12" onclick="przekieruj('gra/dodaj.php');">
                    Zagraj z drugim graczem
           </button>
           
        </div>
    </main> 
     
    <script src="wymagany.js"> </script>
    
    </body>
</html>	