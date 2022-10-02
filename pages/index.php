<?php ob_start(); ?>
<?php session_start(); ?>
<?php  include "../include/db.php"; ?>


<?php 


       if (isset($_POST['submit'])) {
           #echo "submit click";
                $db_user_id = '';
                $db_username = '';
                $db_user_password = '';
                $db_user_firstname = '';
                $db_user_lastname = '';
                $db_user_role = '';
                $db_user_status = '';
                $db_user_image = '';

                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $username = trim($username);
                    $password = trim($password);

                    $username = mysqli_real_escape_string($connection, $username);
                    $password = mysqli_real_escape_string($connection, $password);

                    $query = "SELECT * FROM users WHERE username = '{$username}' ";
                    $select_user_query = mysqli_query($connection, $query);
                    if(!$select_user_query) {

                        die("QUERY FAILED". mysqli_error($connection));

                    }

                    while($row = mysqli_fetch_assoc($select_user_query)) {
                          
                        $db_user_id = $row['id'];
                        $db_username = $row['username'];
                        $db_user_password = $row['password'];
                        $db_user_firstname = $row['name'];
                        $db_user_lastname = $row['lastname'];
                        $db_user_role = $row['role'];
                        $db_user_status = $row['status'];
                        $db_user_image = $row['image'];
                      
                      } 


                      if(!empty($username) && !empty($password)){

                                if($username == $db_username && $password == $db_user_password &&  $db_user_status == 'active'){


                                    $_SESSION['id'] = $db_user_id;
                                    $_SESSION['username'] = $db_username;
                                    $_SESSION['name'] = $db_user_firstname;
                                    $_SESSION['password'] = $db_user_password;
                                    $_SESSION['name'] = $db_user_firstname;
                                    $_SESSION['lastname'] = $db_user_lastname;
                                    $_SESSION['role'] = $db_user_role;
                                    $_SESSION['status'] = $db_user_status;
                                    $_SESSION['image'] = $db_user_image;

                                    if ($_SESSION['role'] === 'admin') {
                                            header("location: admin/Profile.php");
                                            die();
                                    } elseif($_SESSION['role'] === 'users') {
                                             header("location: users/Profile.php");
                                    }else {

                                         header("location:index.php");
                                            die();
                                    }
                                }
                                else{
                                   

                                    //echo "Invalid User....";


                                  echo"<center><div class=\"alert alert-danger alert-dismissable\" style=\"width:28%;padding-top: 15px;margin-top: 14px;margin-bottom: 0px;padding-bottom: 9px;\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Invalid user / Inactive user
                                    </div></center>";
                                }
                        }
                        else{
                            
                           echo"<center><div class=\"alert alert-danger alert-dismissable\" style=\" width:28%;padding-top:30px;margin-top: 30px;\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\" style=\" width:30%;\">&times;</button>Field Must not be empty..
                                    </div></center>";
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

<body class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="body">
                <form id="sign_in" action="" method="POST">
                    <div class="msg">Carlos Hilado Memorial State College <br> <h6>Orphanage System</h6></div>
                    <div class="msg"></div>
                    <div class="msg"><img src="../images/chmsc.jpg" alt="" width="236" height="242" /></div>
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
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

</html>