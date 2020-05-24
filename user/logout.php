<?php
    session_start();
    echo $_SESSION['punkty'];
    require_once "../baza/db_connect.php";
    
    try {
        $sql = "UPDATE uzytkownicy set punkty=".$_SESSION['punkty'].' WHERE user="'.$_SESSION['user'].'"';
        $rezultat = $polaczenie->query($sql);
        if (!$rezultat) throw new Exception ($polaczenie->error);
        
    } catch (Exception $e) {
        echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
        echo "Komentarz deweloperski: ".$e;
        exit();
    }
    
    $polaczenie->close();

    session_unset();
    header ('Location: ../index.php'); 
?>