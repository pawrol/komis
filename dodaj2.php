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
 
if($_SESSION['logged'])
{
// nag³ówek
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Dodawanie samochodu</h2>';
 
// tworzymy prosty formularz
     echo '<form action="dodaj2.php" method="POST">
    Marka: <br />
    <input type="text" name="marka"><br />
    Model: <br />
    <input type="text" name="model"><br />
    Typ: <br />
    <input type="text" name="typ"><br />
		Pojemnosc: <br />
    <input type="text" name="poj"><br />
		Moc: <br />
    <input type="text" name="moc"><br />
		Przebieg: <br />
    <input type="text" name="przeb"><br />
		Rok: <br />
    <input type="text" name="rok"><br />
			Telefon: <br />
    <input type="text" name="tel"><br />
		<input type="submit" name="ok" value="Dodaj nowy">
    </form>';    
  

// je¶li zostanie naci¶niêty przycisk "Rejestruj"
if(isset($_POST['ok']))
{
   $marka = trim($_POST['marka']);
        $model = trim($_POST['model']);
				$typ = trim($_POST['typ']);
				$poj = trim($_POST['poj']);
				$moc = trim($_POST['moc']);
				$przeb = trim($_POST['przeb']);
				$rok = trim($_POST['rok']);
				$tel = trim($_POST['tel']);
 
    // sprawdzamy czy wszystkie dane zosta³y podane
    if(empty($marka) || empty($model) || empty($typ) || empty($poj) || empty($moc) || empty($przeb) || empty($rok) || empty($tel)) echo 'Wpisz wszystkie pola!';
    // je¶li tak...
    else
    {
        // filtrujemy dane
        		$marka = strip_tags( mysql_real_escape_string( HTMLSpecialChars($marka)));
            $model = strip_tags( mysql_real_escape_string( HTMLSpecialChars($model)));
						$typ = strip_tags( mysql_real_escape_string( HTMLSpecialChars($typ)));
            $poj = strip_tags( mysql_real_escape_string( HTMLSpecialChars($poj)));
						$moc = strip_tags( mysql_real_escape_string( HTMLSpecialChars($moc)));
            $przeb = strip_tags( mysql_real_escape_string( HTMLSpecialChars($przeb)));
						$rok = strip_tags( mysql_real_escape_string( HTMLSpecialChars($rok)));
						$tel = strip_tags( mysql_real_escape_string( HTMLSpecialChars($tel)));
 
     
            // tworzymy zapytanie
            $query = "INSERT INTO `auta` (`marka` , `model`, `typ`, `pojemnosc`, `moc`, `przebieg`, `rok`, `telefon`) VALUES ('$marka', '$model', '$typ', '$poj', '$moc', '$przeb', '$rok', '$tel')";
 
            // je¶li zapytanie wykona siê poprawnie to zostanie wy¶wietlony stosowny komunikat
            if(mysql_query($query)) echo 'Jesli juz dodales wszystkie swoje oferty, wroc na <a href="index.php">strone glowna</a>';
    
				}
				}
    }

 
// roz³±czenie z baz± danych
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
	
