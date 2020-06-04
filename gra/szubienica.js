//tablica liter
const litery = [65, 260, 66, 67, 262, 68, 69, 280, 70, 71, 72, 73, 74, 75, 76, 321, 77, 78, 323, 79, 211, 80, 81, 82, 83, 346, 84, 85, 86, 87, 88, 89, 90, 377, 379];

/*litery[0] = "A";
litery[1] = "Ą";
litery[2] = "B";
litery[3] = "C";
litery[4] = "Ć";
litery[5] = "D";
litery[6] = "E";
litery[7] = "Ę";
litery[8] = "F";
litery[9] = "G";
litery[10] = "H";
litery[11] = "I";
litery[12] = "J";
litery[13] = "K";
litery[14] = "L";
litery[15] = "Ł";
litery[16] = "M";
litery[17] = "N";
litery[18] = "Ń";
litery[19] = "O";
litery[20] = "Ó";
litery[21] = "P";
litery[22] = "Q";
litery[23] = "R";
litery[24] = "S";
litery[25] = "Ś";
litery[26] = "T";
litery[27] = "U";
litery[28] = "V";
litery[29] = "W";
litery[30] = "X";
litery[31] = "Y";
litery[32] = "Z";
litery[33] = "Ż";
litery[34] = "Ź";*/


var haslo;
var dlugosc;
var haslo1 = "";

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
    document.getElementById("plansza").innerHTML = gdzie;
    przekieruj(gdzie);
}

function nieodgadniete()
{
    var zmienna = "";
    for (i=0; i<dlugosc; i++)
        if (haslo1.charAt(i)=="-") zmienna+= '<span style="color: red;">' + haslo.charAt(i) + '</span>'; 
        else zmienna+= '<span style="color: green;">' + haslo.charAt(i) + '</span>'; 

    document.getElementById("plansza").innerHTML = zmienna;
    document.getElementById("alfabet").innerHTML = "Niestety! Nie udało ci się podać prawidłowego hasła <br /> <br />" + '<span class="resetn" onclick="od_nowa();"> JESZCZE RAZ? </span> <br /> <span class="toindex" onclick="przekieruj(\'../index.php\')"> PRZEJDŹ DO MENU </span>';
    punkty--;
    document.getElementById("punkty").innerHTML = "Punkty: " + punkty;
}

function sprawdz (nr)
{
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
        yes.play();
        var element = "lit" + nr; 
        document.getElementById(element).style.background = "#003300"; 
        document.getElementById(element).style.color = "#00C000"; 
        document.getElementById(element).style.border = "3px solid #00C000"; 
        document.getElementById(element).style.cursor = "default"; 
        wypisz_haslo(); 
        
        if (haslo==haslo1)
        {
            zgadniete();
        }
    }
    
    else
    {
        no.play(); 
        var element = "lit" + nr; 
        document.getElementById(element).style.background = "#330000"; 
        document.getElementById(element).style.color = "#C00000"; 
        document.getElementById(element).style.border = "3px solid #C00000"; 
        document.getElementById(element).style.cursor = "default";
        document.getElementById(element).setAttribute("onclick", ";");
        
        ile_skuch++; 
        document.getElementById("szubienica").innerHTML = '<img src="wisielec/s' + ile_skuch + '.jpg" alt="" /> ';
        
        if (ile_skuch>=9)
        {
            nieodgadniete();
        }
    }
}

/*window.onbeforeunload = function () {
    console.log('text');
    return "text";
}*/
