<?php
if(isset($_POST['signup-submit'])){
	
	require 'dbhandler.inc.php';
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$uname = $_POST['uid'];
	$password = $_POST['pwd'];
	$email = $_POST['mail'];
	
	
	if(empty($fname)|| empty($lname)|| empty($uname)|| empty($password)|| empty($email)){
		header("Location: ../uidregister.php?error=emptyfield&uid=".$uname."&mail=".$email);
		exit;
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uname)){
		header("Location: ../uidregister.php?error=invaliduidmail");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../uidregister.php?error=invalidmail&uid=".$uname);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
		header("Location: ../uidregister.php?error=invaliduid&mail=".$email);
		exit();
    }
	else{
		
		$sql = "SELECT username FROM registration WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../uidregister.php?error=sqlerror");
		exit();
		}
	    else{
		  mysqli_stmt_bind_param($stmt, "s", $uname);
		  mysqli_stmt_execute($stmt);
		  mysqli_stmt_store_result($stmt);
		  $resultCheck = mysqli_stmt_num_rows($stmt);
		  if($resultCheck==1){
			header("Location: ../uidregister.php?error=usertaken&mail=".$email);
		  exit();
		   }
		  else{
			$sql = "INSERT INTO registration(firstname, lastname, username, password, email) VALUES(?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../uidregister.php?error=sqlerror");
				exit();
			}
			else{
				$hashedpwd = password_hash($password, PASSWORD_DEFAULT);
				
				mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $uname, $hashedpwd, $email);
		        mysqli_stmt_execute($stmt);
		        header("Location: ../login.php?msgsignup=success");
		        exit();
			   }
		  }
	  }
	
  }	
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
	header("Location: ../uidregister.php");
		        exit();
}