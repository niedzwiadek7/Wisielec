<?php
    if ((isset($_SESSION['ustawione_p'])==true)&&($_SESSION['ustawione_p']==true)) {
        unset($_SESSION['ustawione_p']);
    } else {
        require_once "../baza/db_connect.php"; 
        $polaczenie->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
        $polaczenie->query("SET CHARSET utf8");

        try {

            $sql = 'SELECT pytanie FROM `pytania` WHERE zaakceptowano = 1 ORDER by rand() LIMIT 1'; 
            $rezultat = $polaczenie->query($sql);
            if (!$rezultat) throw new exception($polaczenie->error);

            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['pytanie'] = $wiersz['pytanie'];

        }   catch (Exception $e) {

            echo "Brak odbioru ze strony serwera. Przepraszamy za utrudnienia <br>";
            echo "Komentarz deweloperski: ".$e;
            exit();

        }
        $polaczenie->close();
    }