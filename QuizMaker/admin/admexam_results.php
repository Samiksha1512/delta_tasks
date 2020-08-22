<?php
session_start();
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

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Exam Results</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
						<form name="form1" action="includes/addexam.inc.php" method="post">
                            <div class="card-body">
                             <center><h2> Previous Results</h2></center>
			<?php
			$count=0;
			  $sql=mysqli_query($conn, "select * from exam_results order by id desc");
			  $count=mysqli_num_rows($sql);
			  
			  if($count==0){
				  ?>
				  <center><h5> No Results Found</h5></center>
				  <?php
			  }
			  else{
				  echo"<table class='table table-bordered'>";
				  echo"<trstyle='background-color:#006df0; color:white'>";
				  echo"<th>";"user name"; echo"</th>";
				  echo"<th>";"exam type";echo"</th>";
				  echo"<th>";"total question"; echo"</th>";
				  echo"<th>";"correct answer"; echo"</th>";
				  echo"<th>";"wrong answer"; echo"</th>";
				  echo"<th>";"exam time";echo"</th>";
				  echo"</tr>";
				  
				  while($row=mysqli_fetch_array($sql)){
				  echo"<tr>";
				  echo"<td>";echo $row["user"]; echo"</td>";
				  echo"<td>";echo $row["exam_type"];echo"</td>";
				  echo"<td>";echo $row["total_question"]; echo"</td>";
				  echo"<td>";echo $row["correct_answer"]; echo"</td>";
				  echo"<td>";echo $row["wrong_answer"]; echo"</td>";
				  echo"<td>";echo $row["exam_time"];echo"</td>";
				  echo"</tr>";
				  }
				  echo"</table>";
			  }
			?>
                                
                        </div>
						</form>
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