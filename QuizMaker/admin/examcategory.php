
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
						<a href="selectquescat.php"> <i class="menu-icon fa fa-dashboard"></i>Select and Create </a>
						<a href="admexam_results.php"> <i class="menu-icon fa fa-dashboard"></i>Results </a>
						<a href="codingquiz.php"> <i class="menu-icon fa fa-dashboard"></i>Cpp Coding Quiz </a>
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
                        <h1>Add Exam</h1>
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
                              <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Add Exam</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Exam Category</label><input type="text" name="examname" placeholder="Add Exam Category" class="form-control"></div>
                                    <div class="form-group"><label  class=" form-control-label">Exam time in minutes</label><input type="text" name="examtime" placeholder="In Minutes" class="form-control"></div>
                                        <div>
										    <input type="submit" name="submit1" class="btn btn-success" value="Add exam"></div>
                                                    </div>
                                                </div>
                                            </div>  
                                <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Exam Categories</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">S no.</th>
                                            <th scope="col">Exam Name</th>
                                            <th scope="col">Exam time</th>
                                            <th scope="col">Edit</th>
											<th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
									require "includes/dbhandler.inc.php";
									$count=0;
									$res=mysqli_query($conn, "select * from exam_category");
									while($row=mysqli_fetch_array($res)){
										$count=$count+1;
										?>
										 <tr>
                                            <th scope="row"><?php echo $count;?></th>
                                            <td><?php echo $row['category'];?></td>
                                            <td><?php echo $row['examTime'];?></td>
                                            <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
											<td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
                                        </tr>
										<?php
									}
									?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        </div>
						</form>
                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
		  if(isset($_GET['added'])){
			  if($_GET['added']=="successfully"){
		?><script type="text/javascript">
		    alert("Exam added successfully");
			//window.location.href=window.location.href;
		</script><?php
		  }
		  }
		  ?>

                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>