<?php

    //  Connecting   to  DAtabase     and  creating   database  if  there is  no  any 
    //  Defining  Login and  password  access to  database 

   
	// server  name
	define ("HOST", "mysql.hostinger.com.ua");
	// DB
	define ("DATABASE", "u904568481*****");
	// define  SQL USER
	define ("MYSQL_USER", "***");
	// pass
	define ("MYSQL_PASS", "***");
	
	
	//create  DB  and   table  
	$link1=mysql_connect(HOST, MYSQL_USER, MYSQL_PASS) or die("No  SQL SERVER  connection!");
	mysql_query ("CREATE DATABASE IF NOT EXISTS ".DATABASE) or die ("CAn not  create  database!");
	mysql_select_db(DATABASE) or die("No connection with  required   database!");
	mysql_query ("CREATE TABLE IF NOT EXISTS vote (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, title VARCHAR (250), votes INT)") or die ("Can not  create dataBase vote ");
	
	// if  database is  empty , isert  some  start  values
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
