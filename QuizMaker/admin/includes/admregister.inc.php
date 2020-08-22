<?php
if(isset($_POST['adm-submit'])){
	
	require 'dbhandler.inc.php';
	$uname = $_POST['usrname'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	
	if(empty($uname)|| empty($email)|| empty($password)){
		header("Location: ../admregister.php?error=emptyfield&uid=".$uname."&mail=".$email);
		exit;
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uname)){
		header("Location: ../admregister.php?error=invaliduidmail");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../admregister.php?error=invalidmail&uid=".$uname);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
		header("Location: ../admregister.php?error=invaliduid&mail=".$email);
		exit();
    }
	else{
		
		$sql = "SELECT username FROM adminLogin WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../admregister.php?error=sqlerror");
		exit();
		}
	    else{
		  mysqli_stmt_bind_param($stmt, "s", $uname);
		  mysqli_stmt_execute($stmt);
		  mysqli_stmt_store_result($stmt);
		  $resultCheck = mysqli_stmt_num_rows($stmt);
		  if($resultCheck==1){
			header("Location: ../admregister.php?error=usertaken&mail=".$email);
		  exit();
		   }
		  else{
			$sql = "INSERT INTO adminLogin( username,email,password) VALUES(?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../admregister.php?error=sqlerror");
				exit();
			}
			else{
				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
				
				mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $hashedpwd);
		        mysqli_stmt_execute($stmt);
		        header("Location: ../admindex.php?msgsignup=success");
		        exit();
			   }
		  }
	  }
	
  }	
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
	header("Location: ../admregister.php");
		        exit();
}