<?php
require "header.php";
require "includes/dbhandler.inc.php";
!isset($_SESSION['uid']) ? header("location:index.php"):null;
?>
 <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
			<?php
			   $rel=mysqli_query($conn,"select * from coding_ques order by id asc");
			   while($row=mysqli_fetch_array($rel)){
				   ?>
				      <button type="submit" class="btn btn-success form-control" value="" style="margin-top:10px;
					  background-color:blue; color:white"><a href="codeit.php?id=<?php echo $row['id']?>" style="margin-top:10px; background-color:blue; color:white"><?php echo $row['question'];
					  ?></a></button>
				   <?php
			   }
			?>
			</div>

        </div>

<?php
require "footer.php";?>