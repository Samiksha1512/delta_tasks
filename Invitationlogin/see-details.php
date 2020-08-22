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
        <div class="card1">
		<div class="container2">
		  <?php 
		 $eno=$_GET['eno'];
		  $u_user=$_SESSION['useruid'];
		  //session_start();
		  //$no=$_SESSION['noinvite'];
		  $sql="SELECT events.dispheader,events.hostname,events.username, events.venuename, events.evetdate, events.eventtime,events.dispfooter, invites.recepient,invites.Inviteid,invites.response FROM events  JOIN invites ON events.eventid=invites.event_id WHERE events.eventid='$eno' ";
		      $result= mysqli_query($conn,$sql);
			  if($result){
				  while($rows=mysqli_fetch_assoc($result)){
				  if($rows["username"]==$u_user){?>
					  <span ><p>
					  <p class="details1"><b>Host: <?php echo htmlspecialchars($rows['hostname']);?><br /><br />
					  <b>Date : <?php echo htmlspecialchars($rows['evetdate']);?><br /><br />
					  <b>Venue : <?php echo htmlspecialchars($rows['venuename']);?><br /><br />
					  <b>Time : <?php echo htmlspecialchars($rows['eventtime']);?><br /><br />
					  <p class="details2"><b>GuestName : <?php echo htmlspecialchars($rows['recepient']);?>, Response : <?php echo htmlspecialchars($rows['response']);?><br /></p>
					  </p>
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