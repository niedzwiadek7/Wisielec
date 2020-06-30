//tablica liter
const litery = [65, 260, 66, 67, 262, 68, 69, 280, 70, 71, 72, 73, 74, 75, 76, 321, 77, 78, 323, 79, 211, 80, 81, 82, 83, 346, 84, 85, 86, 87, 88, 89, 90, 377, 379];

var haslo;
var dlugosc;
var haslo1 = "";
var koniec = false; // zmiena zapobiegająca wyświetleniu komikatu po zakończonej grze

function ustaw_haslo()
{
    haslo = haslo.toUpperCase(); 
    dlugosc = haslo.length;
    
    for (i=0; i<dlugosc; i++)
        if (haslo.charAt(i)==" ") haslo1+= " "; 
        else haslo1+= "-"; 
}

var ile_skuch = 0; 

var yes = new Audio("yes.wav");
var no = new Audio("no.wav"); 

function wypisz_haslo()
{
    document.getElementById("plansza").innerHTML = haslo1; 
}

function start()
{
    //console.log(haslo);
    ustaw_haslo();
    wypisz_haslo(); 
    
    var tresc_diva = ""; 
    
    for (i=0; i<35; i++)
    {
        if (i%7==0) tresc_diva+= '<div style="clear: both;"> </div>'; 
        tresc_diva += '<div class="litera" onclick=sprawdz(' + litery[i] + ') id="lit' + litery[i] + '">' + String.fromCharCode(litery[i]) + '</div>'; // wypisanie pojedyńczej literki do zgadywania
    }
    
    document.getElementById("alfabet").innerHTML = tresc_diva; 
}

String.prototype.ustawZnak = function (miejsce, znak)
{
    if (miejsce>=this.length) return this.toString();
    else return this.substr(0, miejsce) + znak + this.substr(miejsce+1); 
}

function zgadniete()
{
    var gdzie = 'punkty.php?skuch=' + ile_skuch;
    // document.getElementById("plansza").innerHTML = gdzie;
    koniec = true;
    przekieruj(gdzie);
}

function nieodgadniete()
{
    koniec = true;
    var zmienna = "";
    for (i=0; i<dlugosc; i++)
        if (haslo1.charAt(i)=="-") zmienna+= '<span style="color: red;">' + haslo.charAt(i) + '</span>'; 
        else zmienna+= '<span style="color: green;">' + haslo.charAt(i) + '</span>'; 

    document.getElementById("plansza").innerHTML = zmienna;
    document.getElementById("alfabet").innerHTML = '<div class="miss mt-4 mb-0 mt-lg-0"> Niestety! Nie udało ci się podać prawidłowego hasła </div>' + '<div class="resetn" onclick="od_nowa();"> JESZCZE RAZ? </div> <div class="toindex" onclick="przekieruj(\'../index.php\')"> PRZEJDŹ DO MENU </div>';
    punkty--;
    document.getElementById("punkty").innerHTML = "Punkty: " + punkty;
    document.getElementById("footer").innerHTML = '';
}

function sprawdz (nr)
{
    var element = "lit" + nr;
    if(!document.getElementById(element).classList.contains("stop")) { // zabezpieczenie przed wpisywaniem niedozwolonych znaków 
        var trafiona = false;
        var now = String.fromCharCode(nr);
        //console.log(now);

        for (i=0; i<dlugosc; i++)
        {
             if (haslo.charAt(i)==now) //porownanie litery w hasle z wybrana litera
             {
                 haslo1 = haslo1.ustawZnak (i, now); 
                 trafiona = true; 
             }
        }

        if (trafiona==true)
        {
            document.getElementById(element).classList.add("stop");
            yes.play();
            document.getElementById(element).classList.add("pos");
            wypisz_haslo(); 

            if (haslo==haslo1)
            {
                zgadniete();
            }
        }

        else
        {
            document.getElementById(element).classList.add("stop");
            no.play(); 
            document.getElementById(element).classList.add("neg");

            ile_skuch++; 
            document.getElementById("szubienica").innerHTML = '<img src="wisielec/s' + ile_skuch + '.jpg" alt="" /> ';

            if (ile_skuch>=9)
            {
                nieodgadniete();
            }
        }
    }
}

function button(event) {
    if(document.activeElement.tagName=="BODY") { // zapobiega odgadywaniu hasła podczas logowania użytkownika
        var znak = event.key.toUpperCase();
        var pom = znak.charCodeAt();
        if (String.fromCharCode(pom)==znak) sprawdz(znak.charCodeAt()); // zabezpieczenie przed pomyleniem przez program klawiszy funkcyjnych z literami
    }
}

/*window.onbeforeunload = function () {
    console.log('text');
    return "text";
}*/
