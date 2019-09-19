
<?php
// po³±czenie z baza
$connect = mysql_connect("localhost", "root", "krasnal") or
	die ("Sprawd¼ po³±czenie z serwerem.");
	
// utworzenie bazy
$create = mysql_query("CREATE DATABASE IF NOT EXISTS komis") or
	die (mysql_error());
	
//wybieranie bazy
mysql_select_db("komis");
	 
//tworzenie tabeli
$users = "CREATE TABLE users 
	(
	id int(11) NOT NULL auto_increment,
	nick varchar(30) NOT NULL,
	pass varchar(60) NOT NULL,
	data_rejestracji int(11) NOT NULL default 0,
	PRIMARY KEY (id)
	)";

$results = mysql_query($users) or
	die (mysql_error());
	
//utworz tabele movietype
$auta = "CREATE TABLE auta 
	(
	id_samochodu int(11) NOT NULL auto_increment,
	Marka varchar(10) NOT NULL,
	Model varchar(10) NOT NULL,
	Typ varchar(10) NOT NULL,
	Pojemnosc varchar(4) NOT NULL,
	Moc varchar(4) NOT NULL,
	Przebieg varchar(9) NOT NULL,
	Rok year(4) NOT NULL,
	Telefon varchar(10) NOT NULL,
	PRIMARY KEY (id_samochodu)
	)";

$results = mysql_query($auta) or
	die (mysql_error());
	
	//je¶li wszystko wysz³o poprawnie pominien pokazaæ siê poni¿szy komunikat

echo "Poprawnie utworzono bazê danych komisu!";		





?>

