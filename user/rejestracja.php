<?php 
    require_once('walidacja.php');
    
    function err (&$zmienna) {
        if (isset($zmienna)) {
            echo '<div class="error">'.$zmienna.'</div>';
            unset ($zmienna);
        }
    }

    if ((isset($_SESSION['wszystko_ok']))&&($_SESSION['wszystko_ok']==true)) {
    // dodajemy gracza do bazy
    //require_once "../baza/db_connect.php";
        
    try {
        if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email', 0, 0)"))    {
                $_SESSION['udanarejestracja'] = true; 
                header ('Location: witamy.php');
                // ustawienie zmiennych do automatycznego zalogowania po rejestracji
                $_SESSION['z1'] = $nick;
                $_SESSION['z2'] = $haslo1; 
            }   else throw new Exception($polaczenie->error); 
            $polaczenie->close();
            exit(); 
    } catch (Exception $e) {
        echo '<span style="color: red"> Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie </span> <br /> <br /> ';
        echo 'Informacja developerska: '.$e;
        exit();
    }
    }
?>

<!DOCTYPE HTML> 


<html lang="pl">
    <head>
        <?php
            include_once ("head.php");
        ?>
        <meta charset="utf-8" />
        <title> Szubienica - załóż darmowe konto </title> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="stylesheet" href="../style.css" type="text/css" /> 
        <link rel="stylesheet" href="style.css" type="text/css" /> 
        
    </head>
    
    <body>
       
        <main>
           <header>
               <h1 id="plansza" class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> 
                    REJESTRACJA
               </h1>
           </header>
          
           <div class="container">
                <div class="row">
                   
                    <div class="col-lg-6 text-center">
                        <img src="../img/logo.png"/>
                        <p class="mt-1 mt-lg-5"> Zgadujesz lub umierasz </p>
                    </div>

                    <div class="col-lg-6 mt-3 text-center">
                        <form method="post">
                            <div class="form-group">
                                <label for="uname">Nazwa użytkownika:</label>
                                <input type="text" class="form-control" placeholder="Login" id="uname" name="nick" maxlength="20" <?= (!isset($_SESSION['e_nick']))&&(isset($_POST['nick'])) ? 'value="'.$_POST['nick'].'"' : '' ?> >
                                <?php 
                                    if (isset($_SESSION['e_nick'])) {
                                        echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                                        unset ($_SESSION['e_nick']);
                                    }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Adres e-mail:</label>
                                <input type="text" class="form-control" placeholder="Enter email" id="email" name="email" <?= (!isset($_SESSION['e_mail']))&&(isset($_POST['email'])) ? 'value="'.$_POST['email'].'"' : '' ?>>
                                <?php 
                                    if (isset($_SESSION['e_mail'])) {
                                        echo '<div class="error">'.$_SESSION['e_mail'].'</div>';
                                        unset ($_SESSION['e_mail']);
                                    }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="pwd"> Hasło: </label>
                                <input type="password" class="form-control" placeholder="Hasło" id="pwd" name="haslo1">
                                <?php 
                                    if (isset($_SESSION['e_pass'])) {
                                        echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
                                        unset ($_SESSION['e_pass']);
                                    }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="pwd2"> Powtórz hasło: </label>
                                <input type="password" class="form-control" placeholder="Powtórz hasło" id="pwd2" name="haslo2">
                            </div>
                            
                            <label class="form-check-label text-center mb-3">
                                <input class="form-check-input" type="checkbox" name="regulamin" <?= (!isset($_SESSION['e_check']))&&(isset($_POST['regulamin'])) ? 'checked' : '' ?> > Akceptuję regulamin
                                <?php 
                                    if (isset($_SESSION['e_check'])) {
                                        echo '<div class="error">'.$_SESSION['e_check'].'</div>';
                                        unset ($_SESSION['e_check']);
                                    }
                                ?>
                            </label>
                            

                                <div class="g-recaptcha mb-3" data-sitekey="6LezonIUAAAAAHxv6tK2qD4t7TS3fsy_g7mkJ_yk"></div>
                                <?php 
                                    if (isset($_SESSION['e_cap'])) {
                                        echo '<div class="error">'.$_SESSION['e_cap'].'</div>';
                                        unset ($_SESSION['e_cap']);
                                    }
                                ?>

                            <button type="submit" class="btn btn-dark mt-4">Zarejestruj się</button>
                        </form>
                    </div>
               </div>
            </div>
            
            <footer class="text-center mt-3 p-3 p-lg-5">
                <a href="../"> Powrót do menu </a>
            </footer>
        </main>
        
    </body>
</html>