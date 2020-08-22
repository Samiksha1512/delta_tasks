<?php 
   require "header.php";
	require "includes/dbhandler.inc.php";
	
?>
     <div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
	     <span class="w3-bar-item w3-container w3-left">Invitations</span>
	 </div>
	 
	    <fieldset>
		     <legend>You are Invited</legend>
			  <div ><?php 		
			  $u_user=$_SESSION['useruid'];
			  //$no=$_SESSION['noinvite'];
			  	 $sql="SELECT events.hostname, events.venuename, events.evetdate, invites.recepient,invites.Inviteid FROM events  JOIN invites ON events.eventid=invites.event_id AND invites.response IS NULL ";
				$result= mysqli_query($conn,$sql);
				if($result){
				while($rows=mysqli_fetch_assoc( $result)){
					if($rows["recepient"]==$u_user){
						$a=$rows['hostname'];
						$b=$rows['evetdate'];
						$c=$rows['Inviteid'];
						echo " <p><button class='inmsg'>From:$a<br>On: $b<br>
						<a href='view_invitation.php?no=$c' id=''>View Invitation</a></button></p>";
					
					}
				}
				}
			  ?></div>
			 
		</fieldset>
	
	
<?php
    require "footer.php";
?>