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
        <title> Szubienica </title>
        
        <link rel="stylesheet" href="../style.css" type="text/css" /> 
        <script src="../wymagany.js"> </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body> 
	
	<?php
        include_once "../user/user.php"; 
    ?> 

       <div id="pojemnik">
            <div id="plansza"> 
                PODAJ HASŁO
            </div>
               
            <form id="dodaj" action="dodaj_baza.php" method="post"> 
                <input id="zapytanie" type="text" name="pytanie" autocomplete="off" maxlength="50"/> <br />
                <div style="height: 25px;"> </div>
                <input id="wysylanie" type="submit" value="Prześlij" /> 
            </form>
           
            <div style="height: 50px;"> </div>
            <div style="text-align: center;">   
                Podczas wypełniania formularzu staraj się, aby nie stawiać żadnych znaków poza literami i spacjami
            </div>
        </div>
    </body>
</html>