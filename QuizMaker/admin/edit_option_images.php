<?php
require "includes/dbhandler.inc.php";
$eno=$_GET['id'];
$id1=$_GET['id1'];
$lfque='';
$fo1='';
$fo2='';
$fo3='';
$fo4='';
$lfans='';
$res=mysqli_query($conn, "select * from questions where id='$eno' ");
while($row=mysqli_fetch_array($res)){
	$lfque=$row['question'];
	$fo1=$row['opt1'];
	$fo2=$row['opt2'];
	$fo3=$row['opt3'];
	$fo4=$row['opt4'];
	$lfans=$row['answer'];
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">Admin Panel</a>
               <!-- <a class="navbar-brand hidden" href="./">
				  Admin Panel
				</a>-->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admindex.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
						     <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Questions</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
						
                            <div class="card-body">
                              <div class="col-lg-12">
							  <form name="" action="" method="post" enctype="multipart/form-data">
											<div class = "card">
                            <div class="card-header"><strong>Update Question with images</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Add question</label><input type="text" name="nfque" placeholder="Add question" value="<?php echo $lfque;?>" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 1</label><input type="file" name="nfopt1" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 2</label><input type="file" name="nfopt2" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 3</label><input type="file" name="nfopt3" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 4</label><input type="file" name="nfopt4" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Answer</label><input type="file" name="nfans" value="" class="form-control"></div>
								<!--<div class="form-group"><label  class=" form-control-label">Category</label><input type="text" name="e_cat" placeholder="" value="" class="form-control"></div>-->
                                        <div>
										    <input type="submit" name="updimg-submit" class="btn btn-success" value="Update Question"></div>
                                                    </div>
                                                </div>
                                        			</form>								
										   </div>
						
                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
</div>
                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php
     if(isset($_POST["updimg-submit"])){
		 $nf_que=$_POST['nfque'];
		 $fnm1=$_FILES['nfopt1']['name'];
		 $fnm2=$_FILES['nfopt2']['name'];
		 $fnm3=$_FILES['nfopt3']['name'];
		 $fnm4=$_FILES['nfopt4']['name'];
		 $fnm5=$_FILES['nfans']['name'];
		 
		 $tm=md5(time());
		 
		 $dst1="../opt_images/".$tm.$fnm1;
	  $dst_db1="opt_images/".$tm.$fnm1;
	  move_uploaded_file($_FILES['nfopt1']['name'],$dst_db1);
	  
	  $dst2="../opt_images/".$tm.$fnm2;
	  $dst_db2="opt_images/".$tm.$fnm2;
	  move_uploaded_file($_FILES['nfopt2']['name'],$dst_db2);
	  
	  $dst3="../opt_images/".$tm.$fnm3;
	  $dst_db3="opt_images/".$tm.$fnm3;
	  move_uploaded_file($_FILES['nfopt3']['name'],$dst_db3);
	  
	  $dst4="../opt_images/".$tm.$fnm4;
	  $dst_db4="opt_images/".$tm.$fnm4;
	  move_uploaded_file($_FILES['nfopt4']['name'],$dst_db4);
	  
	  $dst5="../opt_images/".$tm.$fnm5;
	  $dst_db5="opt_images/".$tm.$fnm5;
	  move_uploaded_file($_FILES['nfans']['name'],$dst_db5);
		 
		 
		$qry = "update questions set question='$nf_que', opt1='$dst_db1', opt2='$dst_db2', opt3='$dst_db3', opt4='$dst_db4', answer='$dst_db5' where id=$eno";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $qry)){
				header("Location: edit_option_images.php?error=sqlerror");
				exit();
			}
			else {
		        mysqli_stmt_execute($stmt);
				?>
			<script type="text/javascript">
			alert("Question updated successfully");
			window.location="add_edit_ques.php?no=<?php echo $id1?>";
			</script>
			<?php
			   }
	 }
	 
?>
