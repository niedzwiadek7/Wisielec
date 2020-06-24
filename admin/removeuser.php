<!DOCTYPE HTML> 
<html lang="pl">
    <head>
        <?php
            include_once "../user/head.php";
        ?>
        <meta charset="utf-8" /> 
        <title> Usuń administratora </title>
        <link rel="stylesheet" type="text/css" href="/./style.css" />
        <link rel="stylesheet" type="text/css" href="/./fontello/css/fontello.css" />
        <script src="/./wymagany.js"> </script>
    </head>
    
    <body>
        <?php
            include_once "../user/user.php";
        ?>
        <div id="pojemnik">
            <div id="plansza">
                Usuń administratora
            </div>

            <?php
                require_once "../connect.php"; 

                $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

                if ($polaczenie->connect_errno!=0)
                 echo "Error: ".$polaczenie->connect_errno;

                else 
                {
                    $sql = "SELECT id, user, email FROM uzytkownicy WHERE admin=1"; 
                    
                    if ($rezultat = $polaczenie->query($sql))
                    {   
                        if ($rezultat->num_rows > 0)
                            while ($wiersz = $rezultat->fetch_assoc())
                            {
                                $id = $wiersz['id']; 
                                $user = $wiersz['user'];
                                $email = $wiersz['email'];

echo <<<koniec
                                <div class="rekord">
                                    <div class="obrazek">
                                        <i class="icon-user-plus"> </i>
                                    </div>

                                    <div class="id">
                                        $id
                                    </div>

                                    <div class="nazwa">
                                        $user
                                    </div>

                                    <div class="mail">
                                        $email
                                    </div>
                                    
                                    <div class="button">
                                        USUŃ PRAWA 
                                    </div>
                                    <div style="clear: both;"> </div>
                                </div>
koniec;
                            }

                        else 
                        {
                            echo "Nie ma administratorów, których możnaby usunąć";
                        }
                    }

                    $polaczenie->close();
                }
            ?>

            <div id="footer">
                <a href="index.php"> Powrót do menu administratora </a>
            </div>
        </div>
    </body>
</html>