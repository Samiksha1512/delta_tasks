<?php
require "header.php";
require "includes/dbhandler.inc.php";
!isset($_SESSION['uid']) ? header("location:index.php"):null;
?>
           <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
			<?php
			   $rel=mysqli_query($conn,"select * from exam_category");
			   while($row=mysqli_fetch_array($rel)){
				   ?>
				      <input type="button" class="btn btn-success form-control" value="<?php echo $row['category'];?>" style="margin-top:10px;
					  background-color:blue; color:white" onclick="set_examtype_session(this.value);">
				   <?php
			   }
			?>
			<button type="submit" class="btn btn-success form-control" style="margin-top:10px; background-color:blue; color:white" name="cppquiz-submit"><a href="load_cppques.php" style="color:white">C++ Questions</a></button>
			</div>

        </div>


<script type="text/javascript">
    function set_examtype_session(e_cat){
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				window.location="dashboard.php";
			}
		};
		xmlhttp.open("GET", "forajax/set_exam_type_session.php?ecat="+e_cat, true);
		xmlhttp.send();
	}
	
</script>


        
<?php
require "footer.php";
?>

