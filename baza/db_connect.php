<?php  
    mysqli_report(MYSQLI_REPORT_STRICT); // sprawia że funkcja mysqli nie wyrzuca błędów
    try {
        require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        
        $polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        $polaczenie->query("SET CHARSET utf8");
        
        if($polaczenie->connect_errno!=0) {
            throw new Exception (mysqli_connect_errno());
        } 
        
    } catch (Exception $e){
        echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
        echo "Komentarz deweloperski: ".$e;
        exit();
    }