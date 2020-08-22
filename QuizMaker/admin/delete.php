<?php 
require "includes/dbhandler.inc.php";
$id=$_GET['id'];
mysqli_query($conn, "delete from exam_category where id=$id");
header("Location: examcategory.php");
				exit();