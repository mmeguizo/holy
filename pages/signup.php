<<<<<<< HEAD
<?php ob_start(); ?>
<?php session_start(); ?>
<?php  include "../include/db.php"; ?>


<?php 


       if (isset($_POST['submit'])) {
           #echo "submit click";


                    $username = $_POST['username'];
                    $name = $_POST['name'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $username = trim($username);
                    $password = trim($password);

                    $username = mysqli_real_escape_string($connection, $username);
                    $password = mysqli_real_escape_string($connection, $password);


                    // $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $checkDuplicateUsername = "SELECT * FROM `users` WHERE username ='$username'";
                    $runcheckDuplicateUsername = mysqli_query($connection, $checkDuplicateUsername);

                    
                    if (mysqli_num_rows($runcheckDuplicateUsername) > 0){

                        echo"<center><div class=\"alert alert-danger alert-dismissable\" style=\"width:28%;padding-top: 15px;margin-top: 14px;margin-bottom: 0px;padding-bottom: 9px;\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Username used
                            </div></center>";
                        
                    }else{

                        $query = "INSERT INTO `users`(`username`, `name`, `lastname`,`email`, `password`, `role`, `status`, `image`) VALUES ('". $_POST['username']."','". $_POST['name']."','". $_POST['lastname']."','". $_POST['email']."','". $_POST['password']."','users','active','dummy.png')";

                        $registerUser = mysqli_query($connection, $query);

                        if($registerUser){
                            echo"<center><div class=\"alert alert-success alert-dismissable\" style=\"width:28%;padding-top: 15px;margin-top: 14px;margin-bottom: 0px;padding-bottom: 9px;\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Success
                                </div></center>";
                                header("location: index.php");
                        }else{
                            die("QUERY FAILED". mysqli_error($connection));
                        }
                    }
    }


    



       


    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/chmsc.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../template/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">orphan<b>System</b></a>
            <small>Holy orphanage</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder=" Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect"  name="submit" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="http://localhost:8080/orphan/pages/index.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../template/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../template/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../template/js/admin.js"></script>
    <script src="../template/js/pages/examples/sign-in.js"></script>
</body>

=======
<?php ob_start(); ?>
<?php session_start(); ?>
<?php  include "../include/db.php"; ?>


<?php 


       if (isset($_POST['submit'])) {
           #echo "submit click";


                    $username = $_POST['username'];
                    $name = $_POST['name'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $username = trim($username);
                    $password = trim($password);

                    $username = mysqli_real_escape_string($connection, $username);
                    $password = mysqli_real_escape_string($connection, $password);


                    // $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $checkDuplicateUsername = "SELECT * FROM `users` WHERE username ='$username'";
                    $runcheckDuplicateUsername = mysqli_query($connection, $checkDuplicateUsername);

                    
                    if (mysqli_num_rows($runcheckDuplicateUsername) > 0){

                        echo"<center><div class=\"alert alert-danger alert-dismissable\" style=\"width:28%;padding-top: 15px;margin-top: 14px;margin-bottom: 0px;padding-bottom: 9px;\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Username used
                            </div></center>";
                        
                    }else{

                        $query = "INSERT INTO `users`(`username`, `name`, `lastname`,`email`, `password`, `role`, `status`, `image`) VALUES ('". $_POST['username']."','". $_POST['name']."','". $_POST['lastname']."','". $_POST['email']."','". $_POST['password']."','users','active','dummy.png')";

                        $registerUser = mysqli_query($connection, $query);

                        if($registerUser){
                            echo"<center><div class=\"alert alert-success alert-dismissable\" style=\"width:28%;padding-top: 15px;margin-top: 14px;margin-bottom: 0px;padding-bottom: 9px;\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Success
                                </div></center>";
                                header("location: index.php");
                        }else{
                            die("QUERY FAILED". mysqli_error($connection));
                        }
                    }
    }


    



       


    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/chmsc.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../template/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../template/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../template/css/style.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">orphan<b>System</b></a>
            <small>Holy orphanage</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder=" Surname" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect"  name="submit" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="http://localhost:8080/orphan/pages/index.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../template/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../template/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../template/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../template/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../template/js/admin.js"></script>
    <script src="../template/js/pages/examples/sign-in.js"></script>
</body>

>>>>>>> 4ac3eb39f66cd12bd537b7fd1eeb5ae2bf0e397c
</html>