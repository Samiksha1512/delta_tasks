<?php

if(isset($_POST['login-submit'])){
	
	require 'dbhandler.inc.php';
	$mailuid =$_POST['mail_uid'];
	$password= $_POST['pwd'];
	
	if(empty($mailuid) || empty($password)){
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?error=sqlerror");
		    exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $param_mailuid);
			$param_mailuid=$mailuid;
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				if($pwdCheck == false){
					header("Location: ../index.php?error=wrongpassword");
		            exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['useruid']=$row['uidUsers'];
					$_SESSION['useremail'] = $row['emailUsers'];
					$_SESSION['invitees'] = $row['recepient'];
					$_SESSION['answer'] = $row['response'];
					$_SESSION['noinvite'] = $row['Inviteid'];
					header("Location: ../dashboard.php?succees=loginsucces");
		            exit();
				}
				else{
					header("Location: ../index.php?error=wrongpassword");
		            exit();
				}
			}
			else{
				header("Location: ../index.php?error=nouser");
		        exit();
			}
		}
	}
}
else{
	header("Location: ../index.php");
	exit();
}
