<?php

	if ((isset($_SESSION['zalogowany'])==true)&&($_SESSION['zalogowany']==true)) 
	{
		echo '<div id="konta" style="width: 1000px">';
		echo '<div id="nazwa">';
		echo 'Witaj, '.$_SESSION['user'] ;
		echo '</div>';
		echo '<div id="punkty">';
		echo 'Punkty: '.$_SESSION['punkty'] ;
		echo '</div>';
                if ($_SESSION['admin']==1) echo '<div class="dostep" onclick="przekieruj(\'admin/index.php\');"> Panel administratora </div>';
		echo '<div class="dostep" onclick="przekieruj(\'/wisielec/user/logout.php\');"> Wyloguj się </div>';
		echo '<div style="clear: both;"> </div>';
		echo '</div>';
	}

	else
	{
    		echo '<div id="konta">';
        	echo '<form action="/wisielec/user/zaloguj.php" method="post">';
            	echo '<input type="text" placeholder="Login" name="login" class="dostep2" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Login\'"/>';
            	echo '<input type="password" placeholder="Hasło" name="haslo" class="dostep2" onfocus="this.placeholder=\'\'" onblur="this.placeholder=\'Hasło\'"/> ';
            	echo '<input type="submit" value="Zaloguj się" class="dostep" />';
        	echo '</form>';
        	echo '<div class="dostep" onclick="przekieruj(\'/wisielec/user/rejestracja.php\');"> Zarejestruj się </div>';
        	echo '<div style="clear: both;"> </div>';
        
		if (isset($_SESSION['komunikat'])==true)
		{
			echo $_SESSION['komunikat'];
			unset ($_SESSION['komunikat']);
		}
   		echo '</div>';
	}
    ?>	