<?php

echo<<<END

    <header class="sticky-top">

        <nav class="navbar navbar-dark navbar-expand-xl">
             <div> </div>
             <a class="navbar-brand mr-4" href="/wisielec/"> <img src="/wisielec/img/logo.png" alt="" width="30" class="d-inline-block mr-1 align-middle"> SZUBIENICA </a>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">

                 <span class="navbar-toggler-icon"> </span>

             </button>

             <div class="collapse navbar-collapse" id="mainmenu">

                 <ul class="navbar-nav mr-auto">

                     <li class="nav-item dropdown mr-3">
                         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true" > Kategorie </a>

                         <div class="dropdown-menu" aria-labelledby="submenu">
                             <div class="dropdown-divider"> </div>
                             <a class="dropdown-item" href= "#"> Kategoria 1 </a>
                             <a class="dropdown-item" href= "#"> Kategoria 2 </a>
                             <a class="dropdown-item" href= "#"> Kategoria 3 </a>
                             <div class="dropdown-divider"> </div>
                             <a class="dropdown-item" href= "#"> Wszystkie kategorie </a>
                         </div>
                     </li>

                     <li class="nav-item mr-3">
                         <a href="#" class="nav-link"> Ranking </a>
                     </li>

                     <li class="nav-item">
                         <a href="#" class="nav-link"> O autorze </a>
                     </li>

                 </ul>
END;

	if ((isset($_SESSION['zalogowany'])==true)&&($_SESSION['zalogowany']==true))
    {
        echo '<div class="my-2 my-lg-0">';
            echo '<span class="mr-4"> Witaj, '.$_SESSION['user'].'</span>';
            if ($_SESSION['punkty']>=0) echo '<span id="punkty" class="mr-4 text-success"> Punkty: '.$_SESSION['punkty'].'</span>';
            else echo '<span id="punkty" class="mr-4 text-danger"> Punkty: '.$_SESSION['punkty'].'</span>';
            if ($_SESSION['admin']==1) echo ' </div> <div> <button class="btn btn-dark mr-2 mt-1" type="button" onclick="przekieruj(\'/wisielec/admin/index.php\');"> Panel administratora </button>';
            echo '<button class="btn btn-dark mt-1" onclick="przekieruj(\'/wisielec/user/logout.php\');"> Wyloguj się </button>';
        echo '</div>';
    }

	else
    {
        echo '<form class="form-inline" action="/wisielec/user/zaloguj.php" method="post">';
        echo '    <input class="form-control mr-1 mt-3 " type="text" placeholder="login" aria-label="login" name="login">';
        echo '    <input class="form-control mr-1 mt-3" type="password" placeholder="hasło" aria-label="hasło" name="haslo">';
        echo '    <input type="submit" class="btn btn-dark mr-1 mt-3" value="Zaloguj się"> ';
        echo '    <input type="button" class="btn btn-dark mt-3" value="Zarejestruj się" onclick="przekieruj(\'/wisielec/user/rejestracja.php\');">';
        echo '</form>';
	}

    echo "</div></nav></header>";

if (isset($_SESSION['komunikat'])) {
    echo $_SESSION['komunikat'];
    unset ($_SESSION['komunikat']);
}
