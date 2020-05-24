<?php
    session_start();
    if (!isset($_GET['cel'])) {header ('Location: ../index.php'); exit();}
    if (isset($_SESSION['zalogowany'])) {
        $skuch = $_GET['skuch'];
        if ($skuch<=1) $_SESSION['punkty']+=4;
        else if ($skuch<=4) $_SESSION['punkty']+=3;
        else $_SESSION['punkty']+=2;
    }

    header ("winner.php");
    /*$cel = $_GET['cel'];
    if ($cel=="index") header('Location: ../index.php');
    else header ('Location: gra.php');*/