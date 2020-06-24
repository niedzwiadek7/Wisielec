<?php
    session_start();
?>

<html lang="pl"> 
    <head> 
        <meta charset = "utf-8" /> 
        <title> Szubienica </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata:400,700&amp;subset=latin-ext" rel="stylesheet">
        
        <style>
            .nav-link {
                font-size: 20px;
            }
        </style>
    </head>
    
    <body>
    <?php
        /*include_once "user/user.php"; */
    ?> 
    
    <header> 
        
        <nav class="navbar navbar-dark navbar-expand-xl" style="background-color: #cf2929;"> 
        
             <a class="navbar-brand" href="#"> <img src="img/logo.png" alt="" width="20" class="d-inline-block mr-2 align-middle"> SZUBIENICA </a>
             
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji"> 
             
                 <span class="navbar-toggler-icon"> </span>
                                 
             </button>
             
             <div class="collapse navbar-collapse" id="mainmenu">
                 
                 <ul class="navbar-nav mr-auto">
                     
                     <li class="nav-item mr-3"> 
                         <a href="#" class="nav-link p-1"> Kategorie </a> 
                     </li>
                     
                     <li class="nav-item mr-3"> 
                         <a href="#" class="nav-link p-1"> Ranking </a> 
                     </li>
                     
                     <li class="nav-item"> 
                         <a href="#" class="nav-link p-1"> O autorze </a> 
                     </li>
                     
                 </ul>
                 
                 
                 <form class="form-inline"> 
                     
                     <input class="form-control mr-1 mt-4" type="text" placeholder="login" aria-label="login">
                     <input class="form-control mr-1 mt-4" type="password" placeholder="hasło" aria-label="hasło">
                     <input type="submit" class="btn btn-light mt-4" value="Zaloguj się"> 
                 </form>
             </div>          
        </nav>     
              
    </header>   
        
    <main>
      
       <div class="container-fluid">
           
            <div id="plansza"> 
                Miejsce na hasło :D
            </div>
           
            <button class="wybor col-12 mb-3" onclick="przekieruj('gra/gra.php');">
                <p> Wylosuj z bazy danych </p> 
            </button>
            
           <button class="wybor col-12" onclick="przekieruj('gra/dodaj.php');">
                    Zagraj z drugim graczem
           </button>
           
        </div>
    </main> 
        
    <script src="wymagany.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"> </script>
    
    </body>
</html>	