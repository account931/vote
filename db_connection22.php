<?php
// NOT USED!!!!!!!!!!!!!!!!!!!!111
    //  Connecting   to  DAtabase     and  creating   database  if  there is  no  any 
    //  Defining  Login and  password  access to  database 

   
	// название  сервера БД
	define ("HOST", "mysql.hostinger.com.ua");
	// название базы данных
	define ("DATABASE", "*******");
	// пользователь MySQL
	define ("MYSQL_USER", "*******");
	// пароль к MYSQL
	define ("MYSQL_PASS", "*****");
	
	
	// создаем базу данных и таблицу  gb
	$link1=mysql_connect(HOST, MYSQL_USER, MYSQL_PASS) or die("Нет соединения с MySQL сервером!");
	mysql_query ("CREATE DATABASE IF NOT EXISTS ".DATABASE) or die ("Не могу создать базу данных!");
	mysql_select_db(DATABASE) or die("Нет содениения с требуемой базой данных!");
	mysql_query ("CREATE TABLE IF NOT EXISTS vote (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR (250), votes INT)") or die ("Не могу создать таблицу vote.");
	
	// если таблица пуста, заполним её начальными значениями
	$r=mysql_query ("SELECT * FROM vote");
	if (mysql_num_rows($r)==0)
	{
		mysql_query ("INSERT INTO vote (title) VALUES ('Что лучше сегодня  сделать ?')");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('Никуда',0)");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('В кино',0)");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('В клуб',0)");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('В магазин',0)");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('В спортзал',0)");
		mysql_query ("INSERT INTO vote (title, votes) VALUES ('Другое',0)");
	}
	
	
?>
