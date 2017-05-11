<?php
// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
	function drawForm() // отображение формы для голосования
	{
		$r=mysql_query ("SELECT * FROM vote WHERE votes is NULL");
		$row=mysql_fetch_array($r);
		echo "<p>".$row['title']."</p>";
		echo "<form name='vote_form'>";
		$r=mysql_query ("SELECT * FROM vote WHERE votes is not NULL");
		while ($row=mysql_fetch_array($r)) { $id=$row['id'];
			echo "<input type='radio' name='vote' value='{$row['id']}'> {$row['title']} <a href='#' onclick='JSRedirect($id)' class='delSpan'>  <img src='images/delete1.png'></a><br/>";
//http://example4.esy.es/vote?action=delete&id=$id;
                                                    }
		echo "<br/><input type='button' onclick='showContent(\"vote.php?select=\"+getRadioGroupValue(document.vote_form.vote));' value='Проголосовать'>";
                		echo "</form>";
	}
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
	
// ADD  DELETE  ACTIONER  in some  othe r  file  if(isset($_GET['delete']))+ headers(location);








// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// **                                                                                  **
	function drawResults() // отображение результатов
	{
		$r=mysql_query ("SELECT * FROM vote WHERE votes is NULL");
		$row=mysql_fetch_array($r);
		echo "<p>".$row['title']."</p>";
		$r=mysql_query ("SELECT * FROM vote WHERE votes is not NULL");
		while ($row=mysql_fetch_array($r))  { $width="{$row['votes']}"*6;
		echo " {$row['title']}: {$row['votes']} votes <img src='http://www.w3schools.com/php/poll.gif' width='$width' height='10'/> <br>";
                //echo "<img src='http://www.w3schools.com/php/poll.gif' width='100*round($width)' height='5px'/>";
                                                     }//while end;
	}
	
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>