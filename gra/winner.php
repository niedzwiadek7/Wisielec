<?php 
    session_start();
?>

<!DOCTYPE HTML> 

<html lang="pl"> 
    <head> 
        <meta charset = "utf-8" /> 
        <title> Szubienica </title>

        <link rel="stylesheet" href="../style.css" type="text/css" /> 
        <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css" /> 
        <script src="szubienica.js"> </script>
        <script src="../wymagany.js"> </script>
        <script>
            haslo = <?='"'.$_SESSION['pytanie'].'"'?> ; 
            <?php if (isset($_SESSION['punkty'])) echo 'var punkty = '.$_SESSION['punkty']; ?> ;
            document.getElementById("haslo").innerHTML = haslo;
        </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
        <title> GRATULACJE :) </title>
    </head>
    
    <body> 
        <?php 
            include_once "../user/user.php"; 
        ?>

        <div id="plansza"> 
            <span style="color: green;" id="haslo"> </span>
        </div>

        <div id="pojemnik">
            <div id="szubienica">
                <img src="wisielec/winner.gif" alt="" width="450" height="280" />
            </div>

            <div id="alfabet">
                Tak jest! Podano prawidłowe hasło! <br /> <br /> 
                <span class="reset" onclick="przekieruj('gra.php')"> JESZCZE RAZ? </span> <br /> 
                <span class="toindex" onclick="przekieruj('/../index.php')"> PRZEJDŹ DO MENU </span>
            </div>
            <div style="clear: both;"> </div>
        </div>
    </body>
</html>			