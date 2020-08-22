<?php 
   require "header.php";
	require "includes/dbhandler.inc.php";
	
?>
<div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
	     <span class="w3-bar-item w3-container w3-center">View Invitation</span>
		 <span class="w3-bar-item w3-container w3-right"> <form action="includes/logout.inc.php" method="post">
				 <button class="bttn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a></span>
	   </div>
        <div class="card">
		<div class="container2">
		  <?php 
		 $no=$_GET['no'];
		  $u_user=$_SESSION['useruid'];
		  //session_start();
		  //$no=$_SESSION['noinvite'];
		  $sql="SELECT events.dispheader,events.hostname,events.username, events.venuename, events.evetdate, events.eventtime,events.dispfooter, invites.recepient,invites.Inviteid FROM events  JOIN invites ON events.eventid=invites.event_id WHERE invites.Inviteid='$no' ";
		      $result= mysqli_query($conn,$sql);
			  if($result){
				  while($rows=mysqli_fetch_assoc($result)){
				  if($rows["recepient"]==$u_user){?>
					  <span ><p>
					  <p class="headin"><b><?php echo htmlspecialchars($rows['dispheader']);?></p><br />
					  <p class="details"><b>Host: <?php echo htmlspecialchars($rows['hostname']);?><br /><br />
					  <b>Date: <?php echo htmlspecialchars($rows['evetdate']);?><br /><br />
					  <b>Venue: <?php echo htmlspecialchars($rows['venuename']);?><br /><br />
					  <b>Time: <?php echo htmlspecialchars($rows['eventtime']);?><br /><br /></p>
					  <p class="headin2"><b><?php echo htmlspecialchars($rows['dispfooter']);?></p><br />
					  <form action='includes/Events2.inc.php?no=<?php echo $no; ?>' method="post" class="headin3"><input type="submit" name="response-submit" value="accept" id="acc" style="background-color: green; color: white; position:relative;left:400px">
		                <input type="submit" name="response-submit" value="reject" style="background-color:red;color: white;position:relative;left:430px" id="reject"></form>
					  </p>
				  <?php 
				  }
				  }
			  }
			  else{
				  echo "Oops! Something went wrong 2. Please try again later.";
				  }
				 ?>
		  </span>
		   
		</div>
		</div>
		


<?php
    require "footer.php";
?>