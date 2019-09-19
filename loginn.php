<?php
// rozpoczêcie buforowania (jest to potrzebne by nie mieæ b³êdów typu headers already sent)
ob_start();

// start sesji
session_start();

// po³±czenie z mysql
mysql_connect('localhost', 'root', 'krasnal')
    or die('Nieudane polaczenie z baza danych...');

// wybór bazy danych
mysql_select_db('komis')
    or die('Nie udalo sie wybrac bazy danych...');
 

// nag³ówek
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Logowanie</h2>';

// sprawdzamy czy user jest ju¿ zalogowany
if($_SESSION['logged']) echo 'Ju¿ jestes zalogowany!';
else
{
    // tworzymy prosty formularz
    echo '<form action="loginn.php" method="POST">
    Nick: <br />
    <input type="text" name="nick"><br />
    Has³o: <br />
    <input type="password" name="pass"><br />
    <input type="submit" name="ok" value="Zaloguj">
    </form>';
     // je¶li zostanie naci¶niêty przycisk "Zaloguj"
     if(isset($_POST['ok']))
     {
        $nick = trim($_POST['nick']);
        $pass = trim($_POST['pass']);
      
        // sprawdzamy czy wszystkie dane zosta³y podane
        if(empty($nick) || empty($pass)) echo 'Wpisz wszystkie pola!';
       
         // je¶li tak...
        else
        {
            // filtrujemy dane
            $nick = strip_tags( mysql_real_escape_string( HTMLSpecialChars($nick)));
            $pass = strip_tags( mysql_real_escape_string( HTMLSpecialChars($pass)));
           
             // kodujemy has³o
            $pass = md5($pass);
            
            // sprawdzamy czy istnieje u¿ytkownik z takim loginem i has³em
            $result = mysql_query("SELECT * FROM users WHERE nick='$nick' AND pass='$pass'");
           
             // je¶li nie istnieje
            if(mysql_num_rows($result)==0) echo 'Niestety poda³es niepoprawne dane!';
         
             // je¶li tak...
            else
            {
                // dodajemy wynik zapytania do tablicy
                $row = mysql_fetch_array($result);
           
                 // ustawianie sesji ¿e u¿ytkownik jest zalogowany
                $_SESSION['logged'] = true;

                // dodawanie do sesji id u¿ytkownika, login oraz datê rejestracji
                $_SESSION['id'] = $row['id'];
                $_SESSION['nick'] = $row['nick'];
                $_SESSION['data_rejestracji'] = $row['data_rejestracji'];
               
                 // wy¶wietlenie komunikatu oznaczaj±cego poprawne logowanie
                echo 'Zosta³es poprawnie zalogowany! Mo¿esz teraz przejsæ na <a href="index.php">stronê g³ówna</a>';
                }
            }
        }
    }
// roz³±czenie z baz± danych
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
