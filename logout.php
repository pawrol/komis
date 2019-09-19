<?php
// rozpoczêcie buforowania (jest to potrzebne by nie mieæ b³êdów typu headers already sent)
ob_start();

// start sesji
session_start();

// nag³ówek
echo '<img src="logo.jpg"/> <br />';
echo '<h2>Wylogowywanie</h2>';

// jeœli user jest zalogowany
if($_SESSION['logged'])
{

     // to go wylogowujemy i usuwamy jego dane z sesji
     $_SESSION['logged'] = false;
     $_SESSION['nick'] = '';
     $_SESSION['id'] = '';
     echo 'Zosta³es poprawnie wylogowany! <a href="index.php">wróæ</a>';
     }
      
     // jeœli nie jest zalogowany
      else
     {
          echo 'Nie by³es zalogowany! <a href="index.php">wróæ</a>';
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
	