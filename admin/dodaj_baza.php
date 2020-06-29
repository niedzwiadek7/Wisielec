<?php 
    session_start(); 
    if (isset($_POST['pytanie'])==false) {header('Location: addquest.php'); exit(); }
    
    require_once "../baza/db_connect.php";

    try {
        
        $sql = 'SELECT id_pyt FROM pytania WHERE pytanie="'.$_POST['pytanie'].'"';
        $rezultat = $polaczenie->query($sql);
        if (!$rezultat) throw new Exception ($polaczenie->error);
        
        $wynik = $rezultat->num_rows;
        if ($wynik==0) {
            if (preg_match('@ [[:alpha:]]+ @iu', $_POST['pytanie'])) {
            $sql = "INSERT INTO pytania VALUE (NULL, '$_POST[pytanie]', 1)"; 
            $rezultat = $polaczenie->query($sql);
            $_SESSION['ustawione'] = 'Udało się dodać nowe hasło';
            } else  {
                $_SESSION['ustawione'] = 'Niestety twoje hasło nie spełania wymagań, by mogło zostać dodane do bazy danych!';
                $_SESSION['info'] = false;
            }
            if (!$rezultat) throw new Exception ($polaczenie->error);
        }   else  {
                $_SESSION['ustawione'] = 'Podane przez ciebie hasło już istnieje';
                $_SESSION['info'] = false;
            }
    } catch (Exception $e) {
        echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
        echo "Komentarz deweloperski: ".$e;
        exit();
    } 
    
    $polaczenie->close();
    header ('Location: addquest.php'); 
         
	