<?php
$sql_conn = mysql_connect('localhost', 'root', 'krasnal') or die('Nie mo�na nawi�za� po��czenia z baza');
mysql_select_db('komis') or die("Nie uda�o si� wybra� bazy danych");;
mysql_query("SET NAMES 'utf8'");
?>