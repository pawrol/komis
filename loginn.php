<?php
// rozpocz�cie buforowania (jest to potrzebne by nie mie� b��d�w typu headers already sent)
ob_start();

// start sesji
session_start();

// po��czenie z mysql
mysql_connect('localhost', 'root', 'krasnal')
    or die('Nieudane polaczenie z baza danych...');

// wyb�r bazy danych
mysql_select_db('komis')
    or die('Nie udalo sie wybrac bazy danych...');
 

// nag��wek
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Logowanie</h2>';

// sprawdzamy czy user jest ju� zalogowany
if($_SESSION['logged']) echo 'Ju� jestes zalogowany!';
else
{
    // tworzymy prosty formularz
    echo '<form action="loginn.php" method="POST">
    Nick: <br />
    <input type="text" name="nick"><br />
    Has�o: <br />
    <input type="password" name="pass"><br />
    <input type="submit" name="ok" value="Zaloguj">
    </form>';
     // je�li zostanie naci�ni�ty przycisk "Zaloguj"
     if(isset($_POST['ok']))
     {
        $nick = trim($_POST['nick']);
        $pass = trim($_POST['pass']);
      
        // sprawdzamy czy wszystkie dane zosta�y podane
        if(empty($nick) || empty($pass)) echo 'Wpisz wszystkie pola!';
       
         // je�li tak...
        else
        {
            // filtrujemy dane
            $nick = strip_tags( mysql_real_escape_string( HTMLSpecialChars($nick)));
            $pass = strip_tags( mysql_real_escape_string( HTMLSpecialChars($pass)));
           
             // kodujemy has�o
            $pass = md5($pass);
            
            // sprawdzamy czy istnieje u�ytkownik z takim loginem i has�em
            $result = mysql_query("SELECT * FROM users WHERE nick='$nick' AND pass='$pass'");
           
             // je�li nie istnieje
            if(mysql_num_rows($result)==0) echo 'Niestety poda�es niepoprawne dane!';
         
             // je�li tak...
            else
            {
                // dodajemy wynik zapytania do tablicy
                $row = mysql_fetch_array($result);
           
                 // ustawianie sesji �e u�ytkownik jest zalogowany
                $_SESSION['logged'] = true;

                // dodawanie do sesji id u�ytkownika, login oraz dat� rejestracji
                $_SESSION['id'] = $row['id'];
                $_SESSION['nick'] = $row['nick'];
                $_SESSION['data_rejestracji'] = $row['data_rejestracji'];
               
                 // wy�wietlenie komunikatu oznaczaj�cego poprawne logowanie
                echo 'Zosta�es poprawnie zalogowany! Mo�esz teraz przejs� na <a href="index.php">stron� g��wna</a>';
                }
            }
        }
    }
// roz��czenie z baz� danych
mysql_close();

// koniec buforowania
ob_end_flush();
?>

<style type="text/css">
	
	* {margin: 5; padding: 10;}
	body {
		width: 1050px; 
		margin: auto;	
		color: yellow;
		background-color: black;
		font: 18px/23px Tahoma, Helvetica, sans-serif;
		}

		
	</style>
