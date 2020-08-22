<?php
session_start();
require "../includes/dbhandler.inc.php";
$totalq=0;
$qry=mysqli_query($conn, "select * from questions where category='$_SESSION[catofexam]'");
$totalq=mysqli_num_rows($qry);
echo $totalq;
?>