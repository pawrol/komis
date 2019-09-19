<?php

// rozpoczêcie buforowania (jest to potrzebne by nie mieæ b³êdów typu headers already sent)
ob_start();

// start sesji
session_start();

echo '<img src="logo.jpg"/> <br />';

// jeœli user jest zalogowany
if($_SESSION['logged'])
{		
     // wyœwietlamy userowi jego dane
     echo 'Witaj '.$_SESSION['nick'].'!<br />';
     echo 'Jestes naszym uzytkownikiem numer: '.$_SESSION['id'].'.<br />';
     echo 'Zarejestrowa³es siê u nas: '.date("d.m.Y, H:i", $_SESSION['data_rejestracji']).'<br />';
      echo 'Aby zobaczyæ baze samochodow to'; echo '<a href="baza.php">wejdz tu</a> jesli chcesz dodac nowe oferty to <a href="dodaj2.php">wejdz tu</a>';
	echo '<br><a href="logout.php">WYLOGUJ</a><br />';}
     // jeœli nie jest zalogowany
     else
     { 
     echo 'Witaj! Aby zobaczyæ ofertê naszego komisu<br />'; echo '<a href="loginn.php">Zaloguj siê</a> jesli nie masz konta to <a href="reje.php">zarejestruj nowe konto</a>';
      }

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
	
