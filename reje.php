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
 
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Rejestracja</h2>';
 
// tworzymy prosty formularz
echo '<form action="reje.php" method="POST">
Nick: <br />
<input type="text" name="nick"><br />
Has�o: <br />
<input type="password" name="pass"><br />
<input type="submit" name="ok" value="Rejestruj">
</form>';    
 
// je�li zostanie naci�ni�ty przycisk "Rejestruj"
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
        $nick = strip_tags( mysql_real_escape_string(HTMLSpecialChars($nick)));
        $pass = strip_tags( mysql_real_escape_string(HTMLSpecialChars($pass)));
 
        // sprawdzamy czy jest ju� u�ytkownik o takim loginie
        $result = mysql_query("SELECT * FROM users WHERE nick='$nick'");
 
        // je�li ju� istnieje
        if(mysql_num_rows($result)!=0) echo 'Ju� istnieje konto z takim loginem!';
        // je�li nie...
        else
        {
            // pobieramy aktualn� dat�
            $data = time();
 
            // kodujemy has�o
            $pass = md5($pass);
 
            // tworzymy zapytanie
            $query = "INSERT INTO `users` (`nick` , `pass`, `data_rejestracji`) VALUES ('$nick', '$pass', '$data')";
 
            // je�li zapytanie wykona si� poprawnie to zostanie wy�wietlony stosowny komunikat
            if(mysql_query($query)) echo 'Zosta�es poprawnie zarejestrowany! Mo�esz si� teraz <a href="loginn.php">zalogowa�</a>';
        }
    }
}
 
// roz��czenie z baz� danych
mysql_close(); 
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
	
