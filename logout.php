<?php
// rozpocz�cie buforowania (jest to potrzebne by nie mie� b��d�w typu headers already sent)
ob_start();

// start sesji
session_start();

// nag��wek
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Wylogowywanie</h2>';

// je�li user jest zalogowany
if($_SESSION['logged'])
{

     // to go wylogowujemy i usuwamy jego dane z sesji
     $_SESSION['logged'] = false;
     $_SESSION['nick'] = '';
     $_SESSION['id'] = '';
     echo 'Zosta�es poprawnie wylogowany! <a href="index.php">wr��</a>';
     }
      
     // je�li nie jest zalogowany
      else
     {
          echo 'Nie by�es zalogowany! <a href="index.php">wr��</a>';
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
	