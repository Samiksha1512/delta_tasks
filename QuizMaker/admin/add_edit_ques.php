<?php
require "includes/dbhandler.inc.php";
$eno=$_GET['no'];
$cat='';
$res=mysqli_query($conn, "select * from exam_category where id='$eno' ");
while($row=mysqli_fetch_array($res)){
	$cat=$row["category"];
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
                        <a href="examcategory.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
						<a href="examcategory.php"> <i class="menu-icon fa fa-dashboard"></i>Examcategory </a>
						<a href="selectquescat.php"> <i class="menu-icon fa fa-dashboard"></i>Select and Create </a>
						<a href="logout.php"> <i class="menu-icon fa fa-dashboard"></i>Logout </a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">

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

        </header>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Questions</h1>
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
							<form name="form1" action="includes/ques.inc.php?no=<?php echo $eno;?>" method="post" enctype="multipart/form-data">
                               <div class="col-lg-6">
							   
                        <div class="card">
                            <div class="card-header"><strong>Add New Questions with text</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Add question</label><input type="text" name="que" placeholder="Add question" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 1</label><input type="text" name="opt1" placeholder="Add opt1" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 2</label><input type="text" name="opt2" placeholder="Add opt2" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 3</label><input type="text" name="opt3" placeholder="Add opt3" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 4</label><input type="text" name="opt4" placeholder="Add opt4" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Answer</label><input type="text" name="ans" placeholder="Add answer" value="" class="form-control"></div>
								<!--<div class="form-group"><label  class=" form-control-label">Category</label><input type="text" name="e_cat" placeholder="" value="" class="form-control"></div>-->
                                        <div>
										    <input type="submit" name="ques-submit" class="btn btn-success" value="Add Question"></div>
                                                    </div>
                                                </div>
                                            </div> 
											<div class="col-lg-6">
											<div class="card">
                            <div class="card-header"><strong>Add New Questions with images</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Add question</label><input type="text" name="fque" placeholder="Add question" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 1</label><input type="file" name="fopt1" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 2</label><input type="file" name="fopt2" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 3</label><input type="file" name="fopt3" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Option 4</label><input type="file" name="fopt4" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Add Answer</label><input type="file" name="fans" value="" class="form-control"></div>
								<!--<div class="form-group"><label  class=" form-control-label">Category</label><input type="text" name="e_cat" placeholder="" value="" class="form-control"></div>-->
                                        <div>
										    <input type="submit" name="quesimg-submit" class="btn btn-success" value="Add Question"></div>
                                                    </div>
                                                </div>
                                        											
										   </div>
                                              </form>											   
                    </div>
                                            </div>
                                        </div>
                                    </div>
							
							 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
							<table class="table table-bordered">
							      <tr>
								      <th>No</th>
									  <th>Question</th>
									  <th>Opt1</th>
									  <th>Opt2</th>
									  <th>Opt3</th>
									  <th>Opt4</th>
									  <th>Answer</th>
									  <th>Edit</th>
									  <th>Delete</th>
								  </tr>
							<?php
							   $rel=mysqli_query($conn, "select * from questions where category='$cat' ");
							   while($row=mysqli_fetch_array($rel)){
								   ?>
										 <tr>
                                            <th><?php echo $row['question_no']?></th>
                                            <td><?php echo $row['question'];?></td>
                                            <td>
											     <?php
                                                       if(strpos($row['opt1'],'opt_images/')!==false){
														   ?>
														   <img src="<?php echo $row['opt1'];?>" height="50" width="50">
														   <?php
													   }
                                                       else{
														   echo $row['opt1'];
													   }													   
												 ?>
											</td>
											<td><?php if(strpos($row['opt2'],'opt_images/')!==false){
														   ?>
														   <img src="<?php echo $row['opt2'];?>" height="50" width="50">
														   <?php
													   }
                                                       else{
														   echo $row['opt2'];
													   }?></td>
											<td><?php if(strpos($row['opt3'],'opt_images/')!==false){
														   ?>
														   <img src="<?php echo $row['opt3'];?>" height="50" width="50">
														   <?php
													   }
                                                       else{
														   echo $row['opt3'];
													   }?></td>
											<td><?php if(strpos($row['opt4'],'opt_images/')!==false){
														   ?>
														   <img src="<?php echo $row['opt4'];?>" height="50" width="50">
														   <?php
													   }
                                                       else{
														   echo $row['opt4'];
													   }?></td>
											<td>
											        <?php if(strpos($row['answer'],'opt_images/')!==false){
														   ?>
														   <img src="<?php echo $row['answer'];?>" height="50" width="50">
														   <?php
													   }
                                                       else{
														   echo $row['answer'];
													   }?>
											</td>
											<td><a href="edit_option.php?id=<?php echo $row['id'];?>&&id1=<?php echo $eno;?>">Edit</a></td>
											<td><a href="delete_option.php?id=<?php echo $row['id'];?>&&id1=<?php echo $eno;?>">Delete</a></td>
                                        </tr>
										<?php
							   }
							?>
							</table>
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
