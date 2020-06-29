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
        <link rel="stylesheet" href="style.css" type="text/css" /> 
        <script src="../wymagany.js"> </script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body> 
	
	<?php
        include_once "../user/user.php"; 
    ?> 

       <main>
           <header>
               <h1 class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> 
                    podaj hasło
               </h1>
           </header>
          
           <div class="container">
               
               <div class="row">
                  
                   <form action="dodaj_baza.php" method="post" class="text-align w-100">
                       <input type="text" name="pytanie" autocomplete="off" maxlength="50" class="col-10 offset-1 text-center text-uppercase mt-3">
                       <input type="submit" value="Prześlij" class="col-4 offset-4 mt-3 btn btn-dark" style="height: 50px;">
                   </form>
                   
                   <footer class="w-100">
                       <?php 
                            if (isset($_SESSION['ustawione'])) {
                                echo '<div class="text-danger text-center w-100 m-auto pt-3">'.$_SESSION['ustawione'].'</div>';
                                unset ($_SESSION['ustawione']);
                            }
                        ?>
                   </footer>
               </div>
        </div>
    </main>
    
    <footer class="p-5 text-center"> 
        Podczas wypełniania formularzu staraj się, aby nie stawiać żadnych znaków poza literami i spacjami
    </footer>
    </body>
</html>