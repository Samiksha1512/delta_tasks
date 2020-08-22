<?php
require 'dbhandler.inc.php';
$eno=$_GET['no'];
$res=mysqli_query($conn, "select * from exam_category where id='$eno' ");
while($row=mysqli_fetch_array($res)){
	$cat=$row['category'];
}
if(isset($_POST["ques-submit"])){
	 
	
	$loop=0;
		 $count=0;
		 $res=mysqli_query($conn, "select * from questions where category='$cat' order by id asc")or die(mysqli_error($conn)) ;  
		 $count=mysqli_num_rows($res);
		 if($count!=0){
			 while($row=mysqli_fetch_array($res)){
				 $loop=$loop+1;
				 mysqli_query($conn, "update questions set question_no='$loop' where id='$row[id]'");
			 }
		 }
		 $loop=$loop+1;
	
	  $e_que = $_POST['que'];
	  $e_opt1 = $_POST['opt1'];
	  $e_opt2 = $_POST['opt2'];
	  $e_opt3 = $_POST['opt3'];
	  $e_opt4 = $_POST['opt4'];
	  $e_ans = $_POST['ans'];
	  if(empty($e_que)|| empty($e_opt1)|| empty($e_opt2)|| empty($e_opt3)|| empty($e_opt4)|| empty($e_ans)){
		header("Location: ../add_edit_ques.php?no=$eno&&error=emptyfield");
		exit;
	}
	
	else{
		
			$qry = "INSERT INTO questions(question_no, question, opt1, opt2, opt3, opt4, answer, category) VALUES('$loop','$e_que','$e_opt1','$e_opt2','$e_opt3','$e_opt4','$e_ans','$cat')";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $qry)){
				header("Location: ../add_edit_ques.php?error=sqlerror");
				exit();
			}
			else {
		        mysqli_stmt_execute($stmt);
				header("Location: ../add_edit_ques.php?no=$eno&&added=successfully");
				exit();
			   }
	}
}

else if(isset($_POST['quesimg-submit'])){
	$loop=0;
		 $count=0;
		 $res=mysqli_query($conn, "select * from questions where category='$cat' order by id asc")or die(mysqli_error($conn)) ;  
		 $count=mysqli_num_rows($res);
		 if($count!=0){
			 while($row=mysqli_fetch_array($res)){
				 $loop=$loop+1;
				 mysqli_query($conn, "update questions set question_no='$loop' where id='$row[id]'");
			 }
		 }
		 $loop=$loop+1;
	  
	  $tm=md5(time());
	  $f_que = $_POST['fque'];
	  
	  $fnm1=$_FILES['fopt1']['name'];
	  $dst1="../opt_images/".$tm.$fnm1;
	  $dst_db1="opt_images/".$tm.$fnm1;
	  move_uploaded_file($_FILES['fopt1']['name'],$dst_db1);
	  
	  $fnm2=$_FILES['fopt2']['name'];
	  $dst2="../opt_images/".$tm.$fnm2;
	  $dst_db2="opt_images/".$tm.$fnm2;
	  move_uploaded_file($_FILES['fopt2']['name'],$dst_db2);
	  
	  $fnm3=$_FILES['fopt3']['name'];
	  $dst3="../opt_images/".$tm.$fnm3;
	  $dst_db3="opt_images/".$tm.$fnm3;
	  move_uploaded_file($_FILES['fopt3']['name'],$dst_db3);
	  
	  $fnm4=$_FILES['fopt4']['name'];
	  $dst4="../opt_images/".$tm.$fnm4;
	  $dst_db4="opt_images/".$tm.$fnm4;
	  move_uploaded_file($_FILES['fopt4']['name'],$dst_db4);
	  
	  $fnm5=$_FILES['fans']['name'];
	  $dst5="../opt_images/".$tm.$fnm5;
	  $dst_db5="opt_images/".$tm.$fnm5;
	  move_uploaded_file($_FILES['fans']['name'],$dst_db5);
	  
	  if(empty($f_que)|| empty($dst_db1)|| empty($dst_db2)|| empty($dst_db3)|| empty($dst_db4)|| empty($dst_db5)){
		header("Location: ../add_edit_ques.php?no=$eno&&error=emptyfield");
		exit;
	}
	
	else{
		
			$qry = "INSERT INTO questions(question_no, question, opt1, opt2, opt3, opt4, answer, category) VALUES('$loop','$f_que','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$cat')";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $qry)){
				header("Location: ../add_edit_ques.php?error=sqlerror");
				exit();
			}
			else {
		        mysqli_stmt_execute($stmt);
				header("Location: ../add_edit_ques.php?no=$eno&&added=successfully");
				exit();
			   }
	}
}
else if(isset($_POST['cppques-submit'])){
	 
	
	$loop=0;
		 $count=0;
		 $qry=mysqli_query($conn, "select * from coding-ques order by id asc")or die(mysqli_error($conn)) ;  
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
				header("Location: ../codingquiz.phpadded=successfully");
				exit();
			   }
	}
}
?>