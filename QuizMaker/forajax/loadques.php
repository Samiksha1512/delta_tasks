<?php
session_start();
require "../includes/dbhandler.inc.php";
$que_no="";
$que="";
$op1="";
$op2="";
$op3="";
$op4="";
$answer="";
$count=0;
$ans="";


$quesnmb=$_GET["qno"];
if(isset($_SESSION["answer"][$quesnmb])){
	$ans=$_SESSION["answer"][$quesnmb];
}
$res=mysqli_query($conn, "select * from questions where category='$_SESSION[catofexam]' && question_no='$quesnmb'");
$count=mysqli_num_rows($res);

if($count==0){
	echo "Over";
}
else{
	while($row=mysqli_fetch_array($res)){
		$que_no=$row['question_no'];
$que=$row['question'];
$op1=$row['opt1'];
$op2=$row['opt2'];
$op3=$row['opt3'];
$op4=$row['opt4'];
	}
	?>
	
	<br>
	
	   <table>
	    <tr>
		  <td style="font-weight:bold; font-size:18px; padding-left:5px" colspan="2">
		    <?php
			  echo "(".$que_no.")".$que;
			?>
		  </td>
		</tr>
	   </table>
	   
	   <table style="margin-left:20px">
	    <tr>
		  <td>
		    <input type="radio" name="r1" id="r1" value="<?php echo $op1;?>" onclick="radioclick(this.value,<?php echo $que_no?>)"
			<?php
			   if($ans==$op1){
				   echo "checked";
			   }
			?>>
		  </td>
		  <td style="padding-left:10px">
		   <?php
		    if(strpos($op1, 'opt_images/')!=false){
				?>
				  <img src="<?php echo $op1;?>" height="30" width="30">
				<?php
			}
			else{
				echo $op1;
			}
		   ?>
		  </td>
		</tr>
		<tr>
		  <td>
		    <input type="radio" name="r1" id="r1" value="<?php echo $op2;?>" onclick="radioclick(this.value,<?php echo $que_no?>)"
			<?php
			   if($ans==$op2){
				   echo "checked";
			   }
			?>>
		  </td>
		  <td style="padding-left:10px">
		   <?php
		    if(strpos($op2, 'opt_images/')!=false){
				?>
				  <img src="<?php echo $op2;?>" height="30" width="30">
				<?php
			}
			else{
				echo $op2;
			}
		   ?>
		  </td>
		</tr>
		<tr>
		  <td>
		    <input type="radio" name="r1" id="r1" value="<?php echo $op3;?>"onclick="radioclick(this.value,<?php echo $que_no?>)"
			<?php
			   if($ans==$op3){
				   echo "checked";
			   }
			?>>
		  </td>
		  <td style="padding-left:10px">
		   <?php
		    if(strpos($op3, 'opt_images/')!=false){
				?>
				  <img src="<?php echo $op1;?>" height="30" width="30">
				<?php
			}
			else{
				echo $op3;
			}
		   ?>
		  </td>
		</tr>
		<tr>
		  <td>
		    <input type="radio" name="r1" id="r1" value="<?php echo $op4;?>"onclick="radioclick(this.value,<?php echo $que_no?>)"
			<?php
			   if($ans==$op4){
				   echo "checked";
			   }
			?>>
		  </td>
		  <td style="padding-left:10px">
		   <?php
		    if(strpos($op4, 'opt_images/')!=false){
				?>
				  <img src="<?php echo $op4;?>" height="30" width="30">
				<?php
			}
			else{
				echo $op4;
			}
		   ?>
		  </td>
		</tr>
	   </table>
	   
	
	
	<?php
}

?>