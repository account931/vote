<?php

	include ("dbconnect.php");
	include ("functions.php");
	
?>

<html>
<head>




<!--  START  COUNTDOWN  FILES  -->   <!-- Time  is  set  in = asserts/js/script.js-->
<!--  Files  those  uses    for  creating countdown  are  stored  in FOLDER  ASSERTS-->

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
        <link rel="stylesheet" href="assets/css/styles.css" />
        <link rel="stylesheet" href="assets/countdown/jquery.countdown.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
<!--  END  COUNTDOWN  FILES  -->






<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">

<script src="showcontent.js" type="text/javascript"></script>
<script>	
	function getRadioGroupValue(radioGroupObj)
	{
		for (var i=0; i < radioGroupObj.length; i++)
			if (radioGroupObj[i].checked) return radioGroupObj[i].value;

		return null;
	}	
	


//Function  that   form the  URL  with $_Get[]  trigger to  delete  an option (clicked  in  function.php)
function JSRedirect(i){
if(confirm('Delete?')){window.location.assign("http://example4.esy.es/vote/?action=delete&id="+i+"")} else {window.location.assign("http://example4.esy.es/vote")}   
                       }
</script>




<!--  Toggle  Hidden/Visible-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $("#open").click(function(){
        $("#hidden").toggle(1000);
         //delaying appear of img  fade out-Find  new  job
             //$("#fade").hide();
              //setTimeout(function(){ $("#fade").show(1000); }, 2000);
             setTimeout(function(){ $("#fade").hide(2000); }, 6000);
    });
//
$("#close").click(function(){
        $("#hidden").hide("slow"); });
});
</script>



<?php
// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
// ** 
// Record Statistics
     $date=date("d.m.y.H:i");  //get date  and  User Agent and browser;
     $uAgent=$_SERVER['HTTP_USER_AGENT'];//$browser = get_browser(); //$browser not  working;
     $ip = $_SERVER['REMOTE_ADDR']; 
      file_put_contents(voteStatistics, "\n \n-----------------------\n".$date. " - " .$ip. "\n".$uAgent,FILE_APPEND); //save  date,ip and  UsAgent; 
//End  Record;
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

?>




</head>

<body style="background-color:white;">

<center>
<div class="white" style="font-size:53px;color:black;margin-top:-153px;">Social  Questioner�</div>

<p style="color:red;cursor:pointer" id="open">Click here to add your  variant</p>



<!-- Adding Form  to  add  yout item  to  voting list-->
<div id="hidden" style="display:none;">
<form action="" method="get">
  Add your name  to  participate  in  voting:
  <input type="text" name="candidate" value="" required  >
    <input type="submit" value="Go" name="pressed">
</form>

</br><img id="fade" src="http://i1323.photobucket.com/albums/u581/Ze6ru/2014/05/537d9907d843c_zpscdd383f0.jpg"/>
<p id="close" style="color:red;cursor:pointer"> Close</>
</div>
<!-- End  adding-->

<hr style="height:5px; width:40%; background-color:red;"/>
</center>




<!---------------------------------------------------------------------------------------------COUNT------------------------------------------------------------>
<!-- START COUNTDOND--><!--  ALL  FILES  ARE  IN ASSERTS  folder --> <!-- Time  is  set  in = asserts/js/script.js-->
<div id="countdown" style=""></div>
<!--<p id="note"></p>--><!--  This  shows  text   info  , like  u  have  5  days  left-->
<!-- END  COUNTDOWN -->
<!------------------------------------------------------------------------------------------END COUNT------------------------------------------------------------>








        <!--HERE goes  Votes  sql Selection-->
	<div id="contentBody" style="margin-top:22px;margin-left:12px;font-size:19px;color:black;border:0px solid  black">
	
		<?php

		if ($_COOKIE['codething_vote']=='1') 	// если уже голосовали, то 
			drawResults();						// выводим результаты,
		else
			drawForm();							// иначе форму для голосования
		?>	
	
	</div>

	<div id="loading" style="display: none">
	Идет загрузка...
	</div>
	
</body>
</html>





<?php
          include ("dbconnect.php");
	//include ("functions.php");

        if(isset($_GET['pressed'])){
	       $select = $_GET['candidate']; $val=0;
                
//WORKING!!!!!!!!!!!!
$db = new PDO('mysql:host='.HOST.'; dbname='.DATABASE, MYSQL_USER, MYSQL_PASS); 
$sthI = $db->prepare("INSERT INTO vote (title, votes) VALUES (:user, :item)");
          $sthI->bindValue(':user' ,$select);
          $sthI->bindValue(':item', $val);
          $sthI->execute();
header("Location: http://example4.esy.es/vote");







                  //
                   /*$resultIn = "INSERT INTO `vote` (title,votes) VALUES ($select,$val)";
                  $resultt= mysql_query($resultIn);
   //$result2 = mysql_query("INSERT INTO users  VALUES (NULL, '$login','$password','$avatar')",$db); //  try  this
                if(!$resultt)  {echo"ERRORRR";}*/
                 //

         // mysql_query (INSERT INTO `vote` (title,votes) VALUES ('e','0') );
        //mysql_query ("UPDATE vote SET votes = votes + 1 WHERE id = '$select'");
        }

?>




<!--  JS  Countdown--> <!--Located  in header  causes  Non-working-->
         <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	 <script src="assets/countdown/jquery.countdown.js"></script>
	 <script src="assets/js/script.js"></script>  

