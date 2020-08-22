<?php
 session_start();
 require "../includes/dbhandler.inc.php";
 $exam_cat=$_GET["ecat"];
 $_SESSION['catofexam']=$exam_cat;
 $res=mysqli_query($conn, "select * from exam_category where category='$exam_cat'");
 while($row=mysqli_fetch_array($res)){
	 $timeofexam=$row['examTime'];
 }
 $_SESSION['timeofexam']=$timeofexam;
 date_default_timezone_set('Asia/Kolkata');
 $date=date("Y-m-d H:i:s");
 $e_time= date('Y-m-d H:i:s',strtotime($date.+'$_SESSION["timeofexam"] minutes'));
 $_SESSION['endtime']=$e_time;
 $_SESSION['exam_start']="yes";
?>