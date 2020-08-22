<?php 
require "includes/dbhandler.inc.php";
$qno=$_GET['q_no'];
mysqli_query($conn, "delete from coding_ques where question_no='$qno' ");
header("Location: codingquiz.php?delete=successfully");
				exit();