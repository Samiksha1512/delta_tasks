<?php 
if(isset($_POST["invite-submit"])){
	
	session_start();
	 require 'dbhandler.inc.php';
	 
	$u_user = $_SESSION['useruid'];
	  $Disp_header = $_POST['header'];
	  $Host_Name = $_POST['host'];
	  $Venue_Name = $_POST['venue'];
	  $Event_Date = $_POST['date'];
	  $Event_Time = $_POST['e-time'];
	  $Disp_footer = $_POST['footer'];
	  if(empty($Disp_header)|| empty($Host_Name)|| empty($Venue_Name)|| empty($Event_Date)|| empty($Event_Time)|| empty($Disp_footer)){
		header("Location: ../create_invitation.php?error=emptyfield");
		exit;
	}
	else{
			$qry = "INSERT INTO events(username, dispheader, hostname, venuename, evetdate, eventtime, dispfooter) VALUES('$u_user','$Disp_header','$Host_Name','$Venue_Name','$Event_Date','$Event_Time','$Disp_footer')";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $qry)){
				header("Location: ../create_invitation.php?error=sqlerror");
				exit();
			}
			else {
				//mysqli_stmt_bind_param($stmt, "ssssssss", $u_user, $Disp_header, $Host_Name, $Venue_Name, $Event_Date, $Event_Time, $Event_Desp);
		        mysqli_stmt_execute($stmt);
				$last_id=mysqli_insert_id($conn);
			   }
	}
		$peep =$_POST['people'];
	     if(empty($peep)){
		  echo('<p> Please Select People</p>');
	  }
	  else{
		 $N=count($peep);
		 
	   for($i=0; $i < $N; $i++){
		   $var1=$peep[$i];
            $ins = "INSERT INTO invites(recepient,event_id) VALUES('$var1','$last_id')";
            mysqli_query($conn,$ins);
	   }
		 header("Location: ../dashboard.php?invitation=sent");
		 exit();
		 
	  }
			}
			
else if(isset($_POST["response-submit"])){
	require 'dbhandler.inc.php';
	$no=$_GET['no'];
	$status=$_POST["response-submit"];
	$res="UPDATE invites SET response='$status' WHERE Inviteid='$no' ";
	if(mysqli_query($conn,$res)){
	header("Location: ../dashboard.php");}
	else{
		echo"Not updated";
	}
}
	
