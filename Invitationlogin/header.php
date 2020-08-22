<?php
   session_start();
   
?>
<!DOCTYPE html>
<html lang=en>
  <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta charset="utf-8" http-equiv="encoding">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styled.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Handlee">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js">
  </script>
  </head>
  <body>
      <header>
	     
		     <a href="index.php">
			    <img hidden src="https://gifimage.net/wp-content/uploads/2018/04/login-gif-images-12.gif" class="logo">
			 </a>
		
			 <div class="header-login">
			 
			   <?php
			     if(isset($_SESSION['userId'])){
			        echo'<form action="includes/logout.inc.php" method="post">
				 <button class="btn-logout" type="submit" name="logout-submit">Logout</button>
				 </form>';
		         }
		         else{
			        echo'<h1 class="wrapper-login">LOGIN</h1><form action="includes/login.inc.php" method="post">
				 <input type="text" name="mail_uid" placeholder="Username/e-mail..."></br>
				 <input type="password" name="pwd" placeholder="Password...">
				 <button class="b-login" type="submit" name="login-submit">Login</button>
				 <a href="signup.php" id="myReg">Register</a>
				 </form>';
		         }
			   ?>
			 </div>
		 
	  </header>
	  