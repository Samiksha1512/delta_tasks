<?php
session_start();
require "../includes/dbhandler.inc.php";
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['endtime'])){
	$date=date("H:i:s");
	echo "00:00:00";
	echo"<br>";
	//echo $date;
}
else{
	 $time1=gmdate("H:i:s", strtotime($_SESSION['endtime'])-strtotime(date("Y-m-d H:i:s")));
	 
	 if(strtotime($_SESSION['endtime']) < strtotime(date("Y-m-d H:i:s"))){
		 echo"Time:";
		 echo $time1;
		 
	 }
}
?>