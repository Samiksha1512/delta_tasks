<?php 
   require "header.php";
	require "includes/dbhandler.inc.php";
	
?>
<div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
	     <span class="w3-bar-item w3-container w3-center">Schedules</span>
		 <span class="w3-bar-item w3-container w3-right"> <form action="includes/logout.inc.php" method="post">
				 <button class="bttn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a></span>
	   </div>
	   <p class="msg">NO Scheduled Events Yet</p> 
	   
		  <?php 
		 //$no=$_GET['no'];
		  $u_user=$_SESSION['useruid'];
		  $sql="SELECT events.hostname,events.username, events.venuename, events.evetdate, events.eventtime, invites.recepient,invites.Inviteid, invites.response FROM events  JOIN invites ON events.eventid=invites.event_id WHERE invites.recepient='$u_user' AND invites.response='accept'";
		      $result= mysqli_query($conn,$sql);
			  if($result){
				  while($rows=mysqli_fetch_assoc($result)){
				  if($rows["recepient"]==$u_user){?>
					  <span><button class="inmsg1"><p><b>Host: <?php echo htmlspecialchars($rows['hostname']);?><br />
					  <b>Date: <?php echo htmlspecialchars($rows['evetdate']);?><br />
					  <b>Venue: <?php echo htmlspecialchars($rows['venuename']);?><br />
					  <b>Time: <?php echo htmlspecialchars($rows['eventtime']);?><br />
					  </p></button><br />
				  <?php 
				  }
				  }
			  }
			  else{
				  echo '<p>Oops! Something went wrong 2. Please try again later.</p>';
				  }
				 ?>
		  </span>