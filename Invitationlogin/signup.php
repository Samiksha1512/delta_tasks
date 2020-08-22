<?php 
    require "header.php";
?>

<main>
   <div class="wrapper-main">
     <section class="section-default">
        <h1 class="wrapper-signup">SignUp</h1>
		<?php
		  if(isset($_GET['error'])){
			  if($_GET['error']=="emptyfields"){
			  echo'<p class="signuperror"> FILL IN ALL FIELDS..!</p>';
		  }
		  else if($_GET['error']=="invaliduidmail"){
			  echo'<p class="signuperror"> INVALID USERNAME AND E-MAIL..!</p>';
		  }
		  else if($_GET['error']=="invaliduid"){
			  echo'<p class="signuperror"> INVALID USERNAME ..!</p>';
		  }
		  else if($_GET['error']=="invalidmail"){
			  echo'<p class="signuperror"> INVALID E-MAIL..!</p>';
		  }
		  else if($_GET['error']=="passwordcheck"){
			  echo'<p class="signuperror"> YOUR PASSWORD DO NOT MATCH..!</p>';
		  }
		  else if($_GET['error']=="usertaken"){
			  echo'<p class="signuperror"> USERNAME IS ALREADY TAKEN..!</p>';
		  }
		 }
		  elseif(isset($_GET['signup'])){
			  if($_GET['signup']=="success"){
			 echo'<p class="signupsuccess"> SIGNUP SUCCESSFUL..!</p>';
		 }
		  }
		?>
		<form class="form-signup" action="includes/signup.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username"></br>
		<input type="text" name="mail" placeholder="E-mail"></br>
		<input type="password" name="pwd" placeholder="Password"></br>
		<input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <button type="submit"  name="signup-submit">SignUp</button>
		</form>
     </section>
   </div>
</main>
     
  
<?php
    require "footer.php";
?>