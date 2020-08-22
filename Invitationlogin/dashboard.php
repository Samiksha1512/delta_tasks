<?php 
        require 'header.php'; 
		
        !isset($_SESSION['userId']) ? header("location:index.php"):null;
?>
  
   <div class="w3-bar w3-top w3-black w3-xxlarge" style="z-index:4">
   <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
   <span class="w3-bar-item w3-right"><?php $user = explode("@", $_SESSION['useruid']) ?>
            Welcome, <b><?=isset($user[0]) ? $user[0] : ''?></span>
   </div>
   
	<nav class="w3-sidebar w3-collapse w3-red w3-animate-left" style="z-index:4; width:270px; height:700px" id="mySidebar"><br>
	<div class="w3-container w3-row">
	<div class="w3-col s5">
	<img src="https://www.getmdl.io/templates/dashboard/images/user.jpg" class="w3-circle w3-margin-right" style="width:46px"></div>
	<div class="w3-col s10 w3-bar">
	  <span><?php 
			$usermail = explode("@", $_SESSION['useremail']) ?>
            <?= isset($usermail[0]) ? $usermail[0] : '' ?></span><br>
		</div>
		</div>
	<hr>
	<div class="w3-bar-block">
	<a href="" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close();" title="close menu"><i class="fa fa-remove fa-fw"></i>
    Close Menu</a>
    <a href="events.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Create Events</a>
    <a href="evnts_created.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Created Events</a>
    <a href="invites.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Events Invites</a>
    <a href="schedule.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> Scheduled Events</a>
	<a  class="w3-bar-item w3-button w3-padding"> <form action="includes/logout.inc.php" method="post">
				 <button class="btn-logout" type="submit" name="logout-submit">Logout</button>
				 </form></a>
   <br><br>
  </div>
 </nav>  
   <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
	<div class="w3-main" style="margin-left:300px; margin-top:43px;">
	</div>
	<div class = "bg-img">
	</div>
	<script>
	      var mySidebar = document.getElementById("mySidebar");
		  var overlayBg = document.getElementById("myOverlay");
		 
		  function w3_open(){
			  if(mySidebar.style.display==='block'){
				  mySidebar.style.display='none';
				  overlayBg.style.display='none';
			  }
			  else{
				  mySidebar.style.display='block';
				  overlayBg.style.display='block';
			  }
		  }
		  function w3_close(){
			 
				  mySidebar.style.display='none';
				  overlayBg.style.display='none';
	      }  
		  
	</script>
	
<?php 
        require 'footer.php'; 
        
?>			