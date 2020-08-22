<?php 
    require "header.php";
?>

<main>
   <div class="wrapper-main">
     <section class="section-default">
	   <?php
	      if(isset($_SESSION['userId'])){
			  echo'<p class="welcome-status">PLEASE LOG-OUT</p>';
		  }
		  else{
			  echo'<p class="logout-status">You are logged out..!</p>';
		  }
		  if(isset($_GET['error'])){
		  if($_GET['error']=="wrongpassword"){
			  echo'<p class="signuperror"> Wrong password..!</p>';
		  }}
		 ?>
     </section>
   </div>
</main>

<?php
    require "footer.php";
?>