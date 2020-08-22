<?php
if(isset($_POST['cppques-submit'])){
	 require 'dbhandler.inc.php';
	$loop=0;
		 $count=0;
		 $qry=mysqli_query($conn, "select * from coding_ques order by id asc")or die(mysqli_error($conn)) ;  
		 $count=mysqli_num_rows($qry);
		 if($count!=0){
			 while($row=mysqli_fetch_array($qry)){
				 $loop=$loop+1;
				 mysqli_query($conn, "update coding_ques set question_no='$loop' where id='$row[id]'");
			 }
		 }
		 $loop=$loop+1;
	
	  $c_que = $_POST['que'];
	  $c_opt1 = $_POST['opt1'];
	  $c_opt2 = $_POST['opt2'];
	  $c_time = $_POST['quiztime'];
	  if(empty($c_que)|| empty($c_opt1)|| empty($c_opt2)|| empty($c_time)){
		header("Location: ../coding_quiz.php?error=emptyfield");
		exit;
	}
	
	else{
		
			$sql= "INSERT INTO coding_ques(question_no, question, inputcases, outputcases, timeinmin) VALUES('$loop','$c_que','$c_opt1','$c_opt2','$c_time')";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../codingquiz.php?error=sqlerror");
				exit();
			}
			else {
		        mysqli_stmt_execute($stmt);
				header("Location: ../codingquiz.php?added=successfully");
				exit();
			   }
	}
}
?>