<?php 
    require "header.php";
	require "includes/dbhandler.inc.php";
?>

            <div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
			<span class="w3-bar-item w3-container w3-left">Created Events</span>
			<span class="w3-bar-item w3-container w3-right"> <form action="includes/logout.inc.php" method="post">
				 <button class="bttn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a></span>
             </div>
			 <fieldset>
		     <legend>Your Events</legend>
			  <div>
			 <p class="msg">NO Events Created Yet..!!</p> 
			 <?php
			  $u_user=$_SESSION['useruid'];
					 $sql="SELECT eventid, venuename, evetdate FROM events where username='$u_user' ";
				$result= mysqli_query($conn,$sql);
				//$qry="SELECT events.hostname,events.username, events.venuename, events.evetdate, invites.recepient,invites.response FROM events  JOIN invites ON events.eventid=invites.event_id where events.username='$u_user'";
				//$result2= mysqli_query($conn,$qry);
				if($result){
				while($rows=mysqli_fetch_assoc($result)){
					$a=$rows['venuename'];
					$b=$rows['evetdate'];
					$c=$rows['eventid'];
					echo "<button class='inmsg'>Venue :  $a<br />
					Date : $b<br />
					<a href='see-details.php?eno=$c'>See Details</a>
					</button><br />";
				}
				  }
				/*if($result2){
						while($rows2=mysqli_fetch_assoc($result2)){
							if($rows2["recepient"]==$u_user){
							echo "<td>".$rows2["recepient"]."<td><br />";}
						}
					}*/
				
				 
			 ?></div>
			 
		</fieldset>



<?php
    require "footer.php";
?>