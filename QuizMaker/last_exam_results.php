<?php
require "includes/dbhandler.inc.php";
require "header.php";
!isset($_SESSION['uid']) ? header("location:index.php"):null;

?>



        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
			<center><h2> Previous Results</h2></center>
			<?php
			$count=0;
			  $sql=mysqli_query($conn, "select * from exam_results where user='$_SESSION[uid]' order by id desc");
			  $count=mysqli_num_rows($sql);
			  
			  if($count==0){
				  ?>
				  <center><h5> No Results Found</h5></center>
				  <?php
			  }
			  else{
				  echo"<table class='table table-bordered'>";
				  echo"<tr style='background-color:#006df0; color:white; text-size:20px;'>";
				  echo"<th>";echo"username"; echo"</th>";
				  echo"<th>";echo"exam type";echo"</th>";
				  echo"<th>";echo"total question"; echo"</th>";
				  echo"<th>";echo"correct answer"; echo"</th>";
				  echo"<th>";echo"wrong answer"; echo"</th>";
				  echo"<th>";echo"exam time";echo"</th>";
				  echo"</tr>";
				  
				  while($row=mysqli_fetch_array($sql)){
				  echo"<tr>";
				  echo"<td>";echo $row["user"]; echo"</td>";
				  echo"<td>";echo $row["exam_type"];echo"</td>";
				  echo"<td>";echo $row["total_question"]; echo"</td>";
				  echo"<td>";echo $row["correct_answer"]; echo"</td>";
				  echo"<td>";echo $row["wrong_answer"]; echo"</td>";
				  echo"<td>";echo $row["exam_time"];echo"</td>";
				  echo"</tr>";
				  }
				  echo"</table>";
			  }
			?>
			</div>

        </div>



<?php
require "footer.php";
?>

