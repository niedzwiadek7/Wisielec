<!DOCTYPE HTML> 
<html lang="pl">
    <head>
        <?php
            session_start();
            include_once "../user/head.php";
            if (!isset($_SESSION['zalogowany'])) header ('Location: ../'); 
            else if ($_SESSION['admin']!=1) header ('Location: ../');
        ?>
        <meta charset="utf-8"> 
        <title> Usuń administratora </title>
        <link rel="stylesheet" type="text/css" href="/wisielec/style.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="/wisielec/fontello/css/fontello.css">
        <script src="/wisielec/wymagany.js"> </script>
    </head>
    
    <body>
        <?php
            include_once "../user/user.php";
        ?>
        
        <header>
            <h1 class="h1 text-center text-uppercase mt-5 mb-2 my-lg-5"> 
                    Usuń administratora
            </h1>
            
        </header>
           
        <main>
           <div class="container">

            <?php
                require_once "../baza/db_connect.php"; 

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
                                <div class="rekord row mt-2 mt-md-1 m-auto">
                                    <div class="col-1 fontello mr-2 py-4 py-md-2">
                                        <i class="icon-user-times"> </i>
                                    </div>

                                    <div class="id col-1 mr-2 py-4 py-md-2">
                                        $id
                                    </div>

                                    <div class="col-5 col-md-4 mr-3 py-4 py-md-2">
                                        $user
                                    </div>

                                    <div class="col-6 col-sm-5 py-4 py-md-2">
                                        $email
                                    </div>
                                </div>
koniec;                }

                    }

                    $polaczenie->close();
                }
            ?>

             </div>
        </main>
            
        <footer class="text-center mt-2 p-3 p-lg-5">
            <a href="index.php"> Powrót do menu administratora </a>
        </footer>
    </body>
</html>