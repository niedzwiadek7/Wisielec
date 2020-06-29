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
        <title> Dodaj pytania </title>
        <link rel="stylesheet" type="text/css" href="/wisielec/style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="/wisielec/fontello/css/fontello.css">
        <script src="/wisielec/wymagany.js"> </script> 
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
                       <select name="kategoria" class="w-100 my-3 col-8 offset-2">
                           <?php
                                require_once "../baza/db_connect.php";

                                if ($polaczenie->connect_errno!=0)
                                 echo "Error: ".$polaczenie->connect_errno;

                                else 
                                {   
                                    $sql = "SELECT nazwa FROM KATEGORIE";

                                    if ($rezultat = $polaczenie->query($sql)) {
                                        if ($rezultat->num_rows > 0) 
                                            while ($wiersz = $rezultat->fetch_assoc()) 
                                                echo '<option> '.$wiersz['nazwa'].'</option>';
                                    }

                                    $polaczenie->close();
                                }
                            ?>
                       </select>
                       <input type="submit" value="Prześlij" class="col-4 offset-4 mt-3 btn btn-dark" style="height: 50px;">
                   </form>
                    
                    <footer class="w-100">
                       <?php 
                            if (isset($_SESSION['ustawione'])) {
                                if (isset($_SESSION['info'])) echo '<div class="text-danger text-center w-100 pt-2">'.$_SESSION['ustawione'].'</div>';
                                else echo '<div class="text-success text-center w-100 m-auto pt-2">'.$_SESSION['ustawione'].'</div>';
                                unset ($_SESSION['ustawione']);
                                unset ($_SESSION['info']);
                            }
                        ?>
                   </footer>
               </div>
               
               <footer class="p-5 text-center"> 
                    <a href="index.php"> Powrót do menu administratora </a>
                </footer>
        </div>
    </main>
    
    </body>
</html>