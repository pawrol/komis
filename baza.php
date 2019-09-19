<?php 
 //adres ip serwera mysql który zawiera bazê danych i tabele 
$adres_ip_serwera_mysql_z_baza_danych = 'localhost';
 //nazwa bazy danych z tabel± auta
 $nazwa_bazy_danych = 'komis';
 //nazwa uzytkownika bazy danych $nazwa_bazy_danych
 $login_bazy_danych = 'root';
 //haslo uzytkownika bazy danych $nazwa_bazy_danych
 $haslo_bazy_danych = 'krasnal';
 echo '<img src="logo.jpg"/> <br />';
echo '<h2>Baza samochodów</h2>';
//Ustanawiamy po³±czenie z serwerem mysql
 if ( !mysql_connect($adres_ip_serwera_mysql_z_baza_danych,
              $login_bazy_danych,$haslo_bazy_danych) ) {
    echo 'Nie moge polaczyc sie z baza danych';
 	 exit (0);
 }
 //Wybieramy baze danych na serwerze mysql ktora zawiera tabele auta
 if ( !mysql_select_db($nazwa_bazy_danych) ) {
    echo 'Blad otwarcia bazy danych';
 	 exit (0);
 }
//Definiujemy zapytanie pobieraj±ce wszystkie wiersze z wszystkimi polami z tabeli auta
 $zapytanie = "SELECT * FROM `auta`";
 //wykonujemy zdefiniowane zapytanie na bazie mysql
 $wynik = mysql_query($zapytanie);
//Wy¶wietlamy w tabeli html dane pobrane z tabeli 
 //Najpierw definiujemy nag³ówek tabeli html
 echo "<p>";
 echo "<table boder=\"1\"><tr>";
 echo "<td bgcolor=\"ffff00\"><strong>Marka</strong></td>";
 echo "<td bgcolor=\"ffff99\"><strong>Model</strong></td>";
 echo "<td bgcolor=\"ffff00\"><strong>Typ</strong></td>";
 echo "<td bgcolor=\"ffff99\"><strong>Pojemnosc</strong></td>";
 echo "<td bgcolor=\"ffff00\"><strong>Moc</strong></td>";
 echo "<td bgcolor=\"ffff99\"><strong>Przebieg</strong></td>";
 echo "<td bgcolor=\"ffff00\"><strong>Rok</strong></td>";
  echo "<td bgcolor=\"ffff99\"><strong>Telefon</strong></td>";
 echo "</tr>";
 //Teraz wy¶wietlamy kolejne wiersze z tabeli auta
while ( $row = mysql_fetch_row($wynik) ) {
    echo "</tr>";
    echo "<td bgcolor=\"ffff99\">" . $row[1] . "</td>";
    echo "<td bgcolor=\"ffff00\">" . $row[2] . "</td>";
    echo "<td bgcolor=\"ffff99\">" . $row[3] . "</td>";
		 echo "<td bgcolor=\"ffff00\">" . $row[4] . "</td>";
    echo "<td bgcolor=\"ffff99\">" . $row[5] . "</td>";
    echo "<td bgcolor=\"ffff00\">" . $row[6] . "</td>";
    echo "<td bgcolor=\"ffff99\">" . $row[7] . "</td>";
		 echo "<td bgcolor=\"ffff00\">" . $row[8] . "</td>";	
    echo "</tr>";
 }
 echo "</table>";
//Zamykamy po³±czenie z baz± danych
 if ( !mysql_close() ) {
    echo 'Nie moge zakonczyc polaczenia z baza danych';
    exit (0);
 }{
  echo 'Aby powrocic na moje konto'; echo '<a href="index.php">wejdz tu</a>';
	echo '<br><a href="logout.php">WYLOGUJ</a><br />';}
?>

<style type="text/css">
	
	* {margin: 5; padding: 10;}
	body {
		width: 1050px; 
		margin: auto;	
		color: red;
		background-color: black;
		font: 18px/23px Tahoma, Helvetica, sans-serif;
		}

		
	</style>
	