<?php
require "header.php";
require "includes/dbhandler.inc.php";
?>



        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
			<?php
			  $correct=0;
			  $wrong=0;
			  if(isset($_SESSION["answer"])){
				  for($i=0; $i<=sizeof($_SESSION["answer"]); $i++){
					  $answer="";
					  $rel=mysqli_query($conn, "select * from questions where category='$_SESSION[catofexam]' && question_no='$i'");
					  while($row=mysqli_fetch_array($rel)){
						  $answer=$row['answer'];
					  }
					  if(isset($_SESSION["answer"][$i])){
						  if($answer==$_SESSION["answer"][$i]){
							  $correct=$correct+1;
						  }
						  else{
							  $wrong=$wrong+1;
						  }
					  }
					  else{
						  $wrong=$wrong+1;
					  }
				  }
			  }
			  $count=0;
			  $res=mysqli_query($conn, "select * from questions where category='$_SESSION[catofexam]'");
			  $count=mysqli_num_rows($res);
			  $wrong=$count-$correct;
			  echo"<br>";echo"<br>";
			  echo"<center>";
			     echo"Total Questions=".$count;
				 echo"<br>";
				 echo"Correct Answer=".$correct;
				 echo"<br>";
				  echo"Wrong Answer=".$wrong;
				  echo"<br>";
			  echo"</center>";
			?>
			</div>

        </div>
<?php
    if($_SESSION['exam_start']=='yes'){
		date_default_timezone_set('Asia/Kolkata');
		$date=date("Y-m-d H:i:s");
		mysqli_query($conn, "insert into exam_results(user,exam_type,total_question,correct_answer,wrong_answer,exam_time) values('$_SESSION[uid]', '$_SESSION[catofexam]','$count','$correct','$wrong','$date')");
	}
	if(isset($_SESSION['exam_start'])){
		unset($_SESSION['exam_start']);
		?>
		<script type="text/javascript">
		  window.location.href=" ";
		</script>
		<?php
	}
	
?>


<?php
require "footer.php";
?>

