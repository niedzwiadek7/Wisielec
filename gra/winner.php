<?php 
    session_start();
?>

<!DOCTYPE HTML> 

<html lang="pl"> 
    <head> 
        <?php
            include_once "../user/head.php";
        ?>
        <meta charset = "utf-8" /> 
        <link rel="stylesheet" href="../style.css" type="text/css" /> 
        <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css" /> 
        <script src="../wymagany.js"> </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
        <title> GRATULACJE :) </title>
    </head>
    
    <body> 
        <?php
            include_once "../user/user.php";
        ?>

        <div id="plansza"> 
            <span style="color: green;" id="haslo"> <?= $_SESSION['pytanie'] ?></span>
        </div>

        <div id="pojemnik">
            <div id="szubienica">
                <img src="wisielec/winner.gif" alt="" width="450" height="280" />
            </div>

            <div id="alfabet">
                Tak jest! Podano prawidłowe hasło! <br /> <br /> 
                <span class="reset" onclick="przekieruj('gra.php')"> JESZCZE RAZ? </span> <br /> 
                <span class="toindex" onclick="przekieruj('../index.php')"> PRZEJDŹ DO MENU </span>
            </div>
            <div style="clear: both;"> </div>
        </div>
    </body>
</html>			