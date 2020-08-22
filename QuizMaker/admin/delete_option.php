<?php 
require "includes/dbhandler.inc.php";
$id=$_GET['id'];
$id1=$_GET['id1'];
mysqli_query($conn, "delete from questions where id='$id' ");
header("Location: add_edit_ques.php?no=$id1&&delete=successfully");
				exit();