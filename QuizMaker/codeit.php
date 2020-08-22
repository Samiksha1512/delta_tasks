<?php
require "header.php";
require "includes/dbhandler.inc.php";
!isset($_SESSION['uid']) ? header("location:index.php"):null;
$id=$_GET['id'];

$qry=mysqli_query($conn,"select * from coding_ques where id='$id'");
while($row=mysqli_fetch_array($qry)){
	$time=$row['timeinmin'];
	$que=$row['question'];
	$input=$row['inputcases'];
	$output=$row['outputcases'];
}
$_SESSION['cpptime']=$time;

$handle = fopen('input.txt', 'w') or die('Cannot open file');
$data = $input;
fwrite($handle, $data);
$current="";
$answer="";
if(!empty($_POST)){
	$current=$_POST['cppcode'];
	$file="hello.cpp";
	file_put_contents($file,$current);
	putenv("PATH=C:\Users\hp\Desktop\Dev-Cpp\MinGW64\bin");
	shell_exec("g++ hello.cpp -o hello.exe");
	$answer=shell_exec("hello.exe < input.txt");
}

if(isset($_POST['cpp-submit'])){
	if($answer==$output){
		?>
		<script>
		alert("Code is correct");
		window.location="load_cppques.php";
		</script>
		<?php
	}
	else{
		?>
		<script>
		alert("PLEASE CHECK YOUR CODE ONCE");
		</script>
		<?php
	}
}
?>

 <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
          <table>
	    <tr>
		  <td style="font-weight:normal; font-size:20px; padding-left:50px; padding-bottom:50px" colspan="2">
		   Q. <?php
			  echo $que;?>. Take input as <?php echo $input; ?>
		  </td>
		</tr>
	   </table>
		  
		  <form method="post">
		   <textarea name="cppcode" placeholder="Enter c++ code here" style="width:300px; height:400px; border:3px solid #cccccc; background-color:black; color:white; padding:5px"><?php echo $current;?></textarea>
			<input type="submit" class="btn btn-success" value="Run">
			<textarea name="cppcode2" placeholder="see result" style="width:300px; height:400px; border:3px solid #cccccc; background-color:black; color:white; padding:5px"><?php echo $answer;?></textarea></br>
			<input type="submit" class="btn btn-success" name="cpp-submit" value="Submit">
		  </form>
		  
			</div>

        </div>

<?php
require "footer.php";?>