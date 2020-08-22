<?php
session_start();
if(isset($_POST['login-submit'])){
	
	require 'dbhandler.inc.php';
	$uid = $_POST['u_name'];
	$password = $_POST['upwd'];
	
	if(empty($uid) || empty($password)){
		header("Location: ../login.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM registration WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../login.php?error=sqlerror");
		    exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $param_uid);
			$param_uid=$uid;
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($password, $row['password']);
				if($pwdCheck == false){
					header("Location: ../login.php?error=wrongpassword");
		            exit();
				}
				else if($pwdCheck == true){
					$_SESSION['uid'] = $uid;
					/*$_SESSION['useruid']=$row['uidUsers'];
					$_SESSION['useremail'] = $row['emailUsers'];
					$_SESSION['invitees'] = $row['recepient'];
					$_SESSION['answer'] = $row['response'];
					$_SESSION['noinvite'] = $row['Inviteid'];*/
					header("Location: ../select_exam.php?succees=loginsucces");
		            exit();
				}
				else{
					header("Location: ../login.php?error=wrongpassword");
		            exit();
				}
			}
			else{
				header("Location: ../login.php?error=nouser");
		        exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
	header("Location: ../login.php");
	exit();
}
?>
