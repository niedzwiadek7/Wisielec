<?php
    
    session_start();
    if (!(isset($_SESSION['udanarejestracja']))) 
    {
        header ('Location: rejestracja.php');
        exit();
    }
    else 
    {
        unset ($_SESSION['udanarejestracja']); 
    }

    if (isset($_SESSION['e_nick'])) unset ($_SESSION['e_nick']); 
    if (isset($_SESSION['e_mail'])) unset ($_SESSION['e_mail']); 
    if (isset($_SESSION['e_pass'])) unset ($_SESSION['e_pass']); 
    if (isset($_SESSION['e_check'])) unset ($_SESSION['e_check']); 
    if (isset($_SESSION['e_cap'])) unset ($_SESSION['e_cap']); 
    unset($_SESSION['wszystko_ok']);
    header('Location: zaloguj.php');

    