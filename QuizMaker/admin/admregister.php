<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Registration</title>
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

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo" style="color:white">
                    Admin Register
                </div>
                <div class="login-form">
                    <form action="includes/admregister.inc.php" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="usrname" class="form-control" placeholder="User Name">
                        </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="mail" class="form-control" placeholder="Email">
                        </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pwd" class="form-control" placeholder="Password">
                        </div>
                                    
                                    <button type="submit" name="adm-submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                    
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>