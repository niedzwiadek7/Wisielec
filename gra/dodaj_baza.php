<?php 
    session_start(); 
    if (isset($_POST['pytanie'])==false) {header('Location: dodaj.php'); exit; }
    
    require_once "../baza/db_connect.php";
    $_SESSION['pytanie'] = $_POST['pytanie']; 

    try {
        
        $sql = 'SELECT id_pyt FROM pytania WHERE pytanie="'.$_SESSION['pytanie'].'"';
        $rezultat = $polaczenie->query($sql);
        if (!$rezultat) throw new Exception ($polaczenie->error);
        
        $wynik = $rezultat->num_rows;
        if ($wynik==0) {
            if (preg_match('@ [[:alpha:]]+ @iu', $_POST['pytanie'])) {
            $sql = "INSERT INTO pytania VALUE (NULL, '$_POST[pytanie]', 0)"; 
            $rezultat = $polaczenie->query($sql);
            } else  { 
                $_SESSION['ustawione'] = 'Niestety twoje hasło nie spełania wymagań, by mogło zostać dodane do bazy danych!';
                header('Location: dodaj.php'); 
                exit();
            }
            if (!$rezultat) throw new Exception ($polaczenie->error);
        }
    } catch (Exception $e) {
        echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
        echo "Komentarz deweloperski: ".$e;
        exit();
    }

    $_SESSION['ustawione_p'] = true;
        
    $polaczenie->close();
    header ('Location: gra.php'); 
         
	