<?php
require "includes/dbhandler.inc.php";
$id=$_GET['id'];
$res=mysqli_query($conn, "select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res)){
	$e_name=$row['category'];
	$e_time=$row['examTime'];
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
						<a href="logout.php"> <i class="menu-icon fa fa-dashboard"></i>Logout </a>
                    </li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

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
                        <h1>Edit Exam</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
						<form name="form1" action="" method="post">
                            <div class="card-body">
                              <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Edit Exam</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label  class=" form-control-label">Exam Category</label><input type="text" name="newname" placeholder="Add Exam Category" value="<?php echo $e_name;?>" class="form-control"></div>
                                    <div class="form-group"><label  class=" form-control-label">Exam time</label><input type="text" name="newtime" placeholder="In Minutes" value="<?php echo $e_time;?>" class="form-control"></div>
                                        <div>
										    <input type="submit" name="upd-submit" class="btn btn-success" value="Update exam"></div>
                                                    </div>
                                                </div>
                                            </div>  
                                <div>
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
<?php
								    if(isset($_POST['upd-submit'])){
										mysqli_query($conn, "update exam_category set category='$_POST[newname]', examTime='$_POST[newtime]' where id=$id");
										?>
										<script type="text/javascript">
										alert("Exam updated successfully");
										window.location="examcategory.php";
										
										</script>
										
										<?php
										
									}
								?>