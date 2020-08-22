<?php
require "includes/dbhandler.inc.php";
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
							<form name="form1" action="includes/cppques.inc.php" method="post" enctype="multipart/form-data">
                               <div class="col-lg-12">
							   
                        <div class="card">
                            <div class="card-header"><strong>Add Questions</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Add question</label><input type="text" name="que" placeholder="Add question" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Inputcases</label><input type="text" name="opt1" placeholder="inputcases" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Outputcases</label><input type="text" name="opt2" placeholder="outputcases" value="" class="form-control"></div>
								<div class="form-group"><label  class=" form-control-label">Time</label><input type="text" name="quiztime" placeholder="time in minutes" value="" class="form-control"></div>
                                        <div>
										    <input type="submit" name="cppques-submit" class="btn btn-success" value="Add Question"></div>
                                                    </div>
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
									  <th>Inputcases</th>
									  <th>Outputcases</th>
									  <th>Delete</th>
								  </tr>
							<?php
							   $rel=mysqli_query($conn, "select * from coding_ques order by id asc");
							   while($row=mysqli_fetch_array($rel)){
								   $id=$row['id'];
								   ?>
								   <tr>
                                            <th><?php echo $row['question_no']?></th>
                                            <td><?php echo $row['question'];?></td>
                                            <td>
											     <?php echo $row['inputcases'];?>
											</td>
											<td>
											     <?php echo $row['outputcases'];?>
											</td>
											<td><a href="delete_cppques.php?q_no=<?php echo $row['question_no'];?>">Delete</a></td>
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
