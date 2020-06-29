<?php 
    session_start();
    require_once("losuj.php");
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
        <link rel="stylesheet" href="style.css" type="text/css" /> 
        <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css" /> 
        <script src="szubienica.js"> </script>
        <script src="../wymagany.js"> </script>
        <script>
            haslo = <?='"'.$_SESSION['pytanie'].'"'?> ; 
            <?php 
                if (isset($_SESSION['punkty'])) {
                    echo 'var punkty = '.$_SESSION['punkty'].';'; 
                    echo 'window.onbeforeunload = function () {';
                    echo 'if (koniec==false) return "text"; }';
                }
            ?>
        </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
        <title> ODGADYWANIE HASŁA </title>
    </head>
    
    <body onload="start();" onkeydown="button(event)"> 
    <?php 
        include_once "../user/user.php"; 
    ?> 
       
       <main>
           <header>
               <h1 id="plansza" class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> 
                    
               </h1>
           </header>
          
           <div class="container-fluid">
                <div class="row">
                   
                    <div id="szubienica" class="col-lg-6 text-center">
                        <img src="wisielec/s0.jpg" alt="" />
                    </div>

                    <div id="alfabet" class="col-lg-6 mt-3 text-center">

                    </div>
               </div>
            </div>
            
            <footer id="footer" class="text-center mt-3 p-3 p-lg-5">
                <?php
                    if ((isset($_SESSION['zalogowany'])==true)&&($_SESSION['zalogowany']==true)) 
                        echo "Wyjście z gry w trakcie rozrywki będzie równoznaczne z nieodgadnięciem hasła";
                ?>
            </footer>
        </main>

    </body>
</html>			

<?php
     if (isset($_SESSION['punkty'])) $_SESSION['punkty'] = $_SESSION['punkty'] - 1;
?>		