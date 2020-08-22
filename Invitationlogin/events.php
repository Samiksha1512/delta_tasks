<?php 
        require 'header.php'; 
?>
       <div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
	     <span class="w3-bar-item w3-container w3-center">Choose Event</span>
		 <span class="w3-bar-item w3-container w3-right"> <form action="includes/logout.inc.php" method="post">
				 <button class="bttn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a></span>
	   </div>
	   
    <div class="btn-event">
	<form action ="" method="post">
	<a href="create_invitation.php" class="invite-bday" type="button" name="bday-submit"><p>Birthday Invitation</p></a>
	<a href="create_invitation.php" class="invite-funeral" type="button" name="funeral-submit"><p>Funeral Invitation</p></a>
	<a href="create_invitation.php" class="invite-wedding" type="button" name="wedding-submit"><p>Wedding Invitation</p></a>
	<a href="create_invitation.php" class="invite-inaug" type="button" name="inaug-submit"><p>Inaugration</p></a>
	<a href="create_invitation.php" class="invite-other" type="button" name="other-submit"><p>Others</p></a>
	</form>
	</div>
<?php 
        require 'footer.php';
?>