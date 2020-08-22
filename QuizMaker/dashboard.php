<?php
require "header.php";
  !isset($_SESSION['uid']) ? header("location:index.php"):null;
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
			<br>
			<div class="row">
			  <br>
			     <div class="col-lg-2 col-lg-push-10">
				   <div id="current_que" style="float:left">0</div>
				   <div style="float:left">/</div>
				   <div id="total_que" style="float:left">0</div>
				 </div>
				 <div class="row" style="margin-top:30px">
				    <div class="row">
					  <div class="col-lg-10 col-lg-push-1" style="min-height:300px; background-color:white" id="load_ques"></div>
					</div>
				 </div>
				 <div class="row" style="margin-top:10px">
				    <div class="col-lg-6 col-lg-push-3" style="min-height:50px">
					  <div class="col-lg-12 text-center">
					    <input type="button" class="btn btn-warning" value="Previous" onclick="load_prev();">&nbsp;
						<input type="button" class="btn btn-success" value="Next" onclick="load_next();">
					  </div>
					</div>
				 </div>
			</div>
			</div>

        </div>
<script type="text/javascript">
    function load_total_que(){
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById("total_que").innerHTML=xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "forajax/load_total_que.php", true);
		xmlhttp.send();
	}
	var quesno=1;
	load_ques(quesno);
	
	function load_ques(quesno){
		document.getElementById("current_que").innerHTML=quesno;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				if(xmlhttp.responseText=="Over"){
					//alert("NO Questions");
					window.location="Result.php";
				}
				else{
					document.getElementById("load_ques").innerHTML=xmlhttp.responseText;
					load_total_que();
				}
			}
		};
		xmlhttp.open("GET", "forajax/loadques.php?qno="+quesno, true);
		xmlhttp.send();
	}
	function radioclick(radiovalue, questionno){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				
			}
		};
		xmlhttp.open("GET", "forajax/saveans_insession.php?qno="+questionno+"&value1="+radiovalue, true);
		xmlhttp.send();
	}
	
	function load_prev(){
		if(quesno==1){
			load_ques(quesno);
		}
		else{
			quesno=quesno-1;
			load_ques(quesno);
		}
	}
	function load_next(){
		quesno=quesno+1;
			load_ques(quesno);
	}
	
</script>

<?php
  require "footer.php";
?>