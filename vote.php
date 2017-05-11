<?php
	include ("dbconnect.php");
	include ("functions.php");
	
	// установка cookie для избежания повторного голосования с одного браузера.
	setcookie ("codething_vote","1");
	
	// добавление выбранного варианта
	$select = $_REQUEST['select'];
	mysql_query ("UPDATE vote SET votes = votes + 1 WHERE id = '$select'");

	// отображение результатов
	drawResults();


//   deleting  vote  variants  are  not  implemented  yet.  
// to implemenet  it  u have  to  
// if(  ISSET($_GET['action'])  and $_GET['action']=='delete' ){
          //  delete  from  db
     
	
	
?>
