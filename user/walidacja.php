<?php 
    
    session_start();
    
    if (isset($_POST['email']))
    {
        $_SESSION['wszystko_ok'] = true; 
        
        //sprawdzenie nickname
        $nick = $_POST['nick'];
        
        if ((strlen($nick)<3)||(strlen($nick)>20))
        {
            $_SESSION['wszystko_ok'] = false;
            $_SESSION['e_nick'] = "Nick musi posiadać od 3 do 20 znaków"; 
        }
        
        if (ctype_alnum($nick)==false)
        {
            $_SESSION['wszystko_ok'] = false; 
            $_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)"; 
        }
        
        // sprawdzenie email
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL); 
        
        if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($email!=$emailB))
        {
            $_SESSION['wszystko_ok'] = false; 
            $_SESSION['e_mail'] = "Podaj poprawny adres e-mail"; 
        }
        
        // sprawdzenie hasel
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];
        
        if ((strlen($haslo1)<8)||(strlen($haslo1)>20))
        {
            $_SESSION['wszystko_ok'] = false;
            $_SESSION['e_pass'] = "Hasło powinno zawierać od 8 do 20 znaków"; 
        }
        
        if ($haslo1!=$haslo2)
        {
            $_SESSION['wszystko_ok'] = false;
            $_SESSION['e_pass'] = "Podane hasła nie są identyczne"; 
        }
        
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT); 
        
        // sprawdzenie zatwierdzenia regulaminu
        if (isset($_POST['regulamin'])==false)
        {
            $_SESSION['wszystko_ok'] = false;
            $_SESSION['e_check'] = "Musisz zaakceptować regulamin"; 
        }
        
        //easy for people hard for bots
        $secret = "6LezonIUAAAAAFW2pvAHPlb-vKOUEuGkvjjnSQBN"; 
        
        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']); 
        
        $odp = json_decode($sprawdz); 
        
        if ($odp->success==false)
        {
            $_SESSION['wszystko_ok'] = false;
            $_SESSION['e_cap'] = "Potwierdź, że nie jesteś botem"; 
        }
        
        require_once "../baza/db_connect.php"; 
        mysqli_report(MYSQLI_REPORT_STRICT); // sprawia że funkcja mysqli nie wyrzuca błędów
        
        try
        {
            //Czy email już istnieje
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
                
            if (!$rezultat) throw new Exception($polaczenie->error); 
                
            $ile_maili = $rezultat->num_rows; 
                
            if ($ile_maili>0)   {
                $_SESSION['wszystko_ok'] = false;
                $_SESSION['e_mail'] = "Podany e-mail jest wykorzystywany przez innego gracza"; 
            }
                
            //Czy nick już istnieje
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
                
            if (!$rezultat) throw new Exception($polaczenie->error); 
                
            $ile_nickow = $rezultat->num_rows; 
                
            if ($ile_nickow>0)  {
                $_SESSION['wszystko_ok'] = false;
                $_SESSION['e_nick'] = "Podany nick jest wykorzystywany przez innego gracza"; 
            }
            
            //$polaczenie->close();
        }
        
        catch (Exception $e)
        {
            echo '<span style="color: red"> Błąd serwera. Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie </span> <br /> <br /> ';
            echo 'Informacja developerska: '.$e;
        }

    }
