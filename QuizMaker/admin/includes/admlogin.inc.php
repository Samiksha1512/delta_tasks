<?php
if(isset($_POST['adm-login'])){
	
	require 'dbhandler.inc.php';
	$uid = $_POST['username'];
	$pwd = $_POST['password'];
	
	if(empty($uid) || empty($pwd)){
		header("Location: ../admindex.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM adminlogin WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../admindex.php?error=sqlerror");
		    exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $param_uid);
			$param_uid=$uid;
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($pwd, $row['password']);
				if($pwdCheck == false){
					header("Location: ../admindex.php?error=wrongpassword");
		            exit();
				}
				else if($pwdCheck == true){
					//session_start();
					$_SESSION['userId'] = $uid;
					/*$_SESSION['useruid']=$row['uidUsers'];
					$_SESSION['useremail'] = $row['emailUsers'];
					$_SESSION['invitees'] = $row['recepient'];
					$_SESSION['answer'] = $row['response'];
					$_SESSION['noinvite'] = $row['Inviteid'];*/
					header("Location: ../examcategory.php?succees=loginsucces");
		            exit();
				}
				else{
					header("Location: ../admindex.php?error=wrongpassword");
		            exit();
				}
			}
			else{
				header("Location: ../admindex.php?error=nouser");
		        exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
	header("Location: ../admindex.php");
	exit();
}
