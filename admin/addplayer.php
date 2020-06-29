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
        <title> Zatwierdź pytania </title>
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
                    Dodaj pytania użytkowników
            </h1>
            
        </header>
           
        <main>
           <div class="container">
           
            <?php
                require_once "../baza/db_connect.php";

                if ($polaczenie->connect_errno!=0)
                 echo "Error: ".$polaczenie->connect_errno;

                else 
                {
                    $sql = "SELECT nazwa FROM KATEGORIE";
                    
                    $tabela = ''; 
                    
                    if ($rezultat = $polaczenie->query($sql)) {
                        if ($rezultat->num_rows > 0) 
                            while ($wiersz = $rezultat->fetch_assoc()) 
                                $tabela.='<div class="dropdown-item"> '.$wiersz['nazwa'].'</div>';
                    }
                    
                    $sql = "SELECT pytanie FROM pytania WHERE zaakceptowano=0"; 

                    if ($rezultat = $polaczenie->query($sql))
                    {
                        
                        if ($rezultat->num_rows > 0)
                            while ($wiersz = $rezultat->fetch_assoc())
                            {
                                $pytanie = $wiersz['pytanie']; 
                                
echo <<<koniec
                                <div class="rekord row mt-3 mt-md-1 " style="cursor: auto ;">

                                    <div class="col-5 col-md-7 mr-2 py-4 py-md-2">
                                        $pytanie
                                    </div>

                                    <div class="col-3 mr-3 py-4 py-md-2 dropdown">
                                        <div class="dropdown-toggle" data-toggle="dropdown" role="button" id="submenu" aria-haspopup="true"> KATEGORIA </div>
                                        
                                        <div class="dropdown-menu" arialabelledby="submenu">
                                           $tabela;
                                       </div>
                                    </div>

                                    <button class="col-2 col-md-1 py-4 py-md-2">
                                        <i class="icon-emo-shoot"> </i>
                                    </button>
                                </div>
koniec;
                            }
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