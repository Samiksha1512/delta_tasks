<?php 
    require "header.php";
	
	
?>

        <div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
	     <span class="w3-bar-item w3-container w3-left">Create invitation</span>
		 <span class="w3-bar-item w3-container w3-right"> <form action="includes/logout.inc.php" method="post">
				 <button class="bttn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a></span>
	    </div></br>
		<div>
		  <h1 class="wrapper-invite">PLEASE FILL THE FORM BELOW</h1>
		    <form  action="includes/Events2.inc.php" method="post">
			    <input class="form-invite" type="text" name="header" placeholder="Add-Header"></br>
			    <input class="form-invite" type="text" name="host" placeholder="HOST-NAME"></br>
		        <input class="form-invite" type="text" name="venue" placeholder="VENUE"></br>
		        <input class="form-invite" name="date" placeholder="DATE:DD/MM/YY"></br>
				<input class="form-invite" name="e-time"placeholder="Time : --:--"></br>
		        <input class="form-invite" type="text" name="footer" placeholder="Add-Footer">
				<p class="wrapper-invite">SELECT PEOPLE :</p>
			<!--	<button type="submit" name="create-submit">Next</button>  -->
			
<span><?php 
	require "includes/dbhandler.inc.php";	
	$sql = "SELECT uidUsers, idUsers FROM users where idUsers!=?"; 
    if($stmt=mysqli_prepare($conn, $sql)){
		mysqli_stmt_bind_param($stmt, "i", $param_id);
		$name=$u_id="";
		$param_id=$_SESSION['userId'];
		if(mysqli_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $name, $u_id);
           while(mysqli_stmt_fetch($stmt)){?></span>
			  <p class="name-chk"> <input  type="checkbox" name="people[]" value="<?php echo "$name";?>"><span><?php echo "   $u_id.$name </p> <br>";
		   }
		}
		   else{
			   echo'Error Occur!';
		   }
		   mysqli_stmt_close($stmt);
		   
			}mysqli_close($conn);
             ?> </span>
	    
		   <button class="bttn-invite" type="submit" name="invite-submit" >INVITE</button>
		   </div>
		   
<?php 
    require "footer.php";
	
?>