<?php 
    session_start();
    if (!isset($_SESSION['pytanie'])) header('Location: ../');
?>

<!DOCTYPE HTML> 

<html lang="pl"> 
    <head> 
        <?php
            include_once "../user/head.php";
        ?>
        <meta charset = "utf-8"> 
        <link rel="stylesheet" href="../style.css" type="text/css"> 
        <link rel="stylesheet" href="style.css" type="text/css"> 
        <link rel="stylesheet" href="../fontello/css/fontello.css" type="text/css"> 
        <script src="../wymagany.js"> </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
        <title> GRATULACJE :) </title>
    </head>
    
    <body> 
        <?php
            include_once "../user/user.php";
        ?>

        <main>
           <header>
               <h1 class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> 
                    <?php
                        echo '<span style="color: green;">'.$_SESSION['pytanie'].'</span>';
                        unset($_SESSION['pytanie']);
                    ?>
               </h1>
           </header>
          
           <div class="container">
                <div class="row">
                   
                    <div id="szubienica" class="col-lg-6 text-center">
                         <img src="wisielec/winner.gif" alt="" width="450" height="280" />
                    </div>

                    <div id="alfabet" class="col-lg-6 mt-3 text-center">
                        <div class="miss mt-4 mb-0 mt-lg-0"> Tak jest! Podano prawidłowe hasło! </div>
                        <div class="reset" onclick="od_nowa();"> JESZCZE RAZ? </div> 
                        <div class="toindex" onclick="przekieruj('../index.php')"> PRZEJDŹ DO MENU </div>
                    </div>
               </div>
            </div>
            
        </main>
    </body>
</html>			