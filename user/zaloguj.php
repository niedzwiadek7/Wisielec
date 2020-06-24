<?php
    
    session_start(); 
    
    // automatyczne logowanie po rejestracji
    if (isset($_SESSION['z1'])) {
        $_POST['login'] = $_SESSION['z1'];
        $_POST['haslo'] = $_SESSION['z2'];
        unset($_SESSION['z1']);
        unset($_SESSION['z2']);
    }

    if ((!isset($_POST['login']))||(!isset($_POST['haslo'])))
    {
        header ('Location: ../index.php');
        exit();
    }   

    require_once "../baza/db_connect.php";
        
    $login = $_POST['login']; 
    $haslo = $_POST['haslo'];
        
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    
    try {
        $rezultat = $polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
                                           mysqli_real_escape_string($polaczenie, $login)));
        if (!$rezultat) throw new exception($polaczenie->error);
        
        $ilu_userow = $rezultat->num_rows;
        
        if ($ilu_userow>0)  {
            $wiersz = $rezultat->fetch_assoc();
            
            if (password_verify($haslo, $wiersz['pass']))   {
                $_SESSION['zalogowany'] = true;
                $_SESSION['user'] = $wiersz['user'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['punkty'] = $wiersz['punkty'];
                $_SESSION['admin'] = $wiersz['admin'];
                    
                $rezultat->free_result(); 

                header('Location: ../index.php');
            }   else {
                $_SESSION['komunikat'] = '<p style="color: red;"> Nieprawidłowy login lub hasło! </p>';
                header ('Location: ../index.php');
            }
        }   else {
            $_SESSION['komunikat'] = '<p style="color: red;"> Nieprawidłowy login lub hasło! </p>';
            header ('Location: ../index.php');
        }
        
    } catch (Exception $e) {
        echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
        echo "Komentarz deweloperski: ".$e;
        exit();
    }
        
    $polaczenie->close(); 