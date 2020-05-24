<?php 
    require_once('walidacja.php');

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
        <meta charset="utf-8" />
        <title> Szubienica - załóż darmowe konto </title> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="stylesheet" href="../style.css" type="text/css" /> 
        
        <style>
            .error
            {
                color: red;
                margin-top: 10px; 
                margin-bottom: 10px; 
                font-size: 20px;
            }
            
            #alfabet
            {
                min-height: 600px;
                text-align: center;
            }
            
            #haselko
            {
                font-size: 50px;
                text-transform: uppercase;
            }
        </style>
    </head>
    
    <body>
        <div id="pojemnik">
        
            <div id="plansza">
                REJESTRACJA
            </div>
            
            <div id="szubienica">
                <img src="../gra/wisielec/s4.jpg" />
                <br /> <br />
                <br />
                <div id="haselko">
                    Zgadujesz 
                    <div style="font-size: 100px;"> lub </div>
                    umierasz
                </div>
            </div>
            
            <div id="alfabet">
                <form method="post"> 
                    
                    <?php
                        if (isset($_SESSION['e_nick']))
                        {
                            echo '<input placeholder="Login" class="dostep2" type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Login\' "name="nick" />';
                            echo '<br /> <br /> <div class="error">'.$_SESSION['e_nick'].'</div>'; 
                            unset ($_SESSION['e_nick']); 
                        }
                    
                        else if (isset($_POST['nick']))
                        {
                            echo '<input placeholder="Login" class="dostep2" type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Login\'"name="nick" value="'.$_POST['nick'].'"/> <br />';
                        }
                    
                        else echo '<input placeholder="Login" class="dostep2" type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Login\'"name="nick" /> <br />';
                    ?>
                    
                    <br /> 
                    
                    <?php
                        if (isset($_SESSION['e_mail']))
                        {
                            echo '<input placeholder="E-mail" class="dostep2"  type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'E-mail\'" name="email" />';
                            echo '<br /> <br /> <div class="error">'.$_SESSION['e_mail'].'</div>'; 
                            unset ($_SESSION['e_mail']); 
                        }
                    
                        else if (isset($_POST['email']))
                        {
                            echo '<input placeholder="E-mail" class="dostep2" type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'E-mail\'" name="email" value="'.$_POST['email'].'"/> <br />';
                        }
                    
                        else echo '<input placeholder="E-mail" class="dostep2" type="text" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'E-mail\'" name="email" /> <br />';
                    ?>
                    
                    <br />
                    
                    <input class="dostep2" placeholder="Hasło" type="password" onfocus="this.placeholder=''" onblur="this.placeholder='Hasło'"name="haslo1"/>
                    <br /> 
                    
                    <?php
                        if (isset($_SESSION['e_pass']))
                        {
                            echo '<br /> <div class="error">'.$_SESSION['e_pass'].'</div>'; 
                            unset ($_SESSION['e_pass']); 
                        }
                    ?>
                    
                    <br />
                    
                    
                    <input class="dostep2" placeholder="Powtórz hasło" type="password" onfocus="this.placeholder=''" onblur="this.placeholder='Powtórz hasło'"name="haslo2"/>
                    <br /> <br /> <br />
                    
                    <?php
                        if (isset($_SESSION['e_check']))
                        {
                            echo '<label> <input type="checkbox" name="regulamin" /> Akceptuję regulamin </label>';
                            echo '<br /> <div class="error">'.$_SESSION['e_check'].'</div>'; 
                            unset ($_SESSION['e_check']); 
                        }
                    
                        else if (isset($_POST['regulamin'])==true)
                        {
                            echo '<label> <input type="checkbox" name="regulamin" checked /> Akceptuję regulamin </label>';
                            unset($_POST['regulamin']);
                        }
                    
                        else echo '<label> <input type="checkbox" name="regulamin" /> Akceptuję regulamin </label>';
                    ?>
                    
                    <br /> <br />
                    
                    <div class="g-recaptcha" data-sitekey="6LezonIUAAAAAHxv6tK2qD4t7TS3fsy_g7mkJ_yk"></div>
                    
                    <?php
                        if (isset($_SESSION['e_cap']))
                        {
                            echo '<div class="error">'.$_SESSION['e_cap'].'</div>'; 
                            unset ($_SESSION['e_cap']); 
                        }
                    ?>
                    
                    <br /> 
                    
                    <input class="dostep" type="submit" value="Zarejestruj się" /> 
            </form>
        </div>
        <div style="clear: both;"> </div>
        
        <div id="footer">
            <a href="/./index.php"> Powrót do gry </a>
        </div> 
        </div>
        
    </body>
</html>