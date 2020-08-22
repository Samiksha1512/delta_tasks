<?php
if(isset($_POST["submit1"])){

	 require 'dbhandler.inc.php';
	 $e_name=$_POST['examname'];
	 $e_time=$_POST['examtime'];
	/*$u_user = $_SESSION['useruid'];
	  $Disp_header = $_POST['header'];
	  $Host_Name = $_POST['host'];
	  $Venue_Name = $_POST['venue'];
	  $Event_Date = $_POST['date'];
	  $Event_Time = $_POST['e-time'];
	  $Disp_footer = $_POST['footer'];*/
	  if(empty($e_name)|| empty($e_time)){
		header("Location: ../examcategory.php?error=emptyfield");
		exit;
	}
	else{
			$qry = "INSERT INTO exam_category(category,examTime) VALUES('$e_name','$e_time')";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $qry)){
				header("Location: ../examcategory.php?error=sqlerror");
				exit();
			}
			else {
				//mysqli_stmt_bind_param($stmt, "ssssssss", $u_user, $Disp_header, $Host_Name, $Venue_Name, $Event_Date, $Event_Time, $Event_Desp);
		        mysqli_stmt_execute($stmt);
				header("Location: ../examcategory.php?added=successfully");
				exit();
			   }
	}
}
/*else if(isset($_POST["upd-submit"])){
	require 'dbhandler.inc.php';
	$id=$_GET['id'];
	$editname=$_POST['newname'];
	$edittime=$_POST['newtime'];
	$res="UPDATE exam_category SET category='$editname', examTime='$edittime' WHERE id='$id ";
	if(mysqli_query($conn,$res)){
	header("Location: ../examcategory.php");
	}
	else{
		echo"Not updated";
	}
}*/
?>								
