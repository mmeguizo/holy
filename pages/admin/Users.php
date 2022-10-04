<<<<<<< HEAD


<?php 
$path = "C:/xampp/htdocs/orphan/pages";



?>

<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/header.php";

?>

<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/nav.php";

?>

<?php 
// include "admin_includes/navigation.php";
include dirname($path) . "../include/body.php";
?>
<?php
    $status = "";
    if(isset($_POST['add'])){
        $user = $_POST['username'];
        mysqli_query($connection,"DELETE FROM users WHERE id ='".$_POST['id']."'");
        $query = "SELECT * FROM `users` WHERE username ='$user'";
        $add = "INSERT INTO `users`(`id`, `username`, `name`, `lastname`, `password`, `role`, `status`) VALUES ('". $_POST['id']."','". $_POST['username']."','". $_POST['name']."','". $_POST['lastname']."','". $_POST['password']."','admin','". $_POST['status']."')";
        mysqli_query($connection,$add);
        $noti = "Record Add Successfully";
        echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }

    if (isset($_POST['update'])) {

       $updatedata = "UPDATE `users` SET 

       `id`='".$_POST['id']."',

       `username`='".$_POST['username']."',

       `name`='".$_POST['name']."',

       `lastname`='".$_POST['lastname']."',

       `password`='".$_POST['password']."',

       `role`='admin',

       `status`='".$_POST['status']."'

       WHERE `id`= '".$_POST['id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       
       $noti = "Record Updated Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
    if (isset($_POST['delete_user'])) {

       $updatedata = "DELETE FROM users WHERE `id`= '".$_POST['id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       $noti = "User Inactive Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Exportable Table -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
	        <div class="header">
	            <h2>
	                Manage User
	            </h2>
	        </div>

	        <div class="body">
	            <!-- Nav tabs -->
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                 <div class="row clearfix">
	                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
	                        <a href="/Orphan/pages/admin/Users.php" data-toggle="tab">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation" class="active">
	                                    <div class="info-box bg-pink hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Admin</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                    $sql = "SELECT role, COUNT(*) AS COUNT FROM `users` WHERE `role`= 'admin'";
	                                                    $counts = mysqli_query($connection,$sql);
	                                                    $row = mysqli_fetch_assoc($counts);
	                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                        <a href="/Orphan/pages/admin/Foster.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-cyan hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Foster</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT role, COUNT(*) AS COUNT FROM `users` WHERE `role`= 'users'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                    </ul>
	                </div>
	            </div>
	        </div>
			<div class="row clearfix">
				  <div class="body">
			    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			        <div class="card">
			            <div class="header">
			                <h2>Admin</h2>
			            </div>

			            <div class="body">
			                <form id="form_validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			                    <div class="form-group form-float">
			                         <div class="form-line focused">
			                            <input type="text" class="form-control" name="id" value="<?php echo $_GET['id']; ?>" required>
			                            <label class="form-label">id</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="username" value="<?php echo $_GET['username']; ?>" required>
			                            <label class="form-label">username</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="name" value="<?php echo $_GET['name']; ?>" required>
			                            <label class="form-label">first name</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="lastname" value="<?php echo $_GET['lastname']; ?>" required>
			                            <label class="form-label">lastname</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-group">
                                    <input type="radio" name="status" value="inactive" id="Activation" class="with-gap">
                                    <label for="Activation">Deactivate</label>

                                    <input type="radio" name="status" value="active" id="Deactivation" class="with-gap">
                                    <label for="Deactivation" class="m-l-20">Activate</label>
                                </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" id="password"  value="<?php echo $_GET['password']; ?>" name="password" required>
			                            <label class="form-label">Password</label>
			                       </div>
			                   </div>
			                    <button type="button"  class="btn material-icons" onclick="myFunction()" >remove_red_eye</button>
			                        <button type="button" class="btn material-icons" onclick="GetRandom()" >autorenew</button>
			                                <script>
			                                    function myFunction() {
			                                          var x = document.getElementById("password");
			                                          if (x.type === "password") {
			                                            x.type = "text";
			                                          } else {
			                                            x.type = "password";
			                                          }
			                                       }
			                                       function GetRandom()
			                                        {
			                                            var myElement = document.getElementById("password");
			                                            myElement.value = Math.random().toString(36).slice(-8);
			                                        }
			                                </script>
			                    <input type="text" class="form-control invisible" name="role" value="Dean">
                                <button name="delete_user" class="btn btn-primary m-t-15 waves-effect" style="float: left;">Delete</button>
                                <button name="add" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Add</button>
                                <center><button name="update" class="btn btn-primary m-t-15 waves-effect" >Update</button></center>
			               </form>
			           </div>
			       </div>
			   </div>
<!-- #END# Basic Validation -->
<?php  ?>

			    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

			            <div class="header">
			                <h2>
			                    EXPORTABLE TABLE
			                </h2>
			            </div>
			            <div class="body">
			                <div class="table-responsive">
			                	<?php 
			                        $id = $_SESSION['id'];
			                        $sql  = "SELECT * FROM users where role = 'admin'";
			                        $res = mysqli_query($connection,$sql);
			                        if(isset($_GET['delete'])){
			                            $del = $_GET['delete'];
			                            $insersession = "UPDATE `users` SET `status`='inactive' WHERE `id`= {$del}";
			                            $resultinsersession = mysqli_query($connection,$insersession);
			                            header("Location:/Orphan/pages/admin/Users.php");
			                        }
			                     ?>
			                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Password</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         while($row = mysqli_fetch_assoc($res)){
                                         ?>
                                        <tr> 
                                            <td><a href="/Orphan/pages/admin/Users.php?id=<?php  echo $row['id']; ?>&username=<?php  echo $row['username']; ?>&name=<?php  echo $row['name']; ?>&lastname=<?php  echo $row['lastname']; ?>&password=<?php  echo $row['password']; ?>"><?php  echo $row['id']; ?></a></td>
                                            <td><?php  echo $row['username']; ?></td>
                                            <td><?php  echo $row['name']; ?></td>
                                            <td><?php  echo $row['lastname']; ?></td>
                                            <td><?php  echo $row['password']; ?></td>
                                            <td><?php  echo $row['status']; ?></td>
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
	    </div>
	</div>
</div>
<!-- #END# Exportable Table -->

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";
?>
=======
<?php 
$path = "C:/xampp/htdocs/orphan/pages";
?>

<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/header.php";

?>

<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/nav.php";

?>

<?php 
// include "admin_includes/navigation.php";
include dirname($path) . "../include/body.php";
?>
<?php
    $status = "";
    if(isset($_POST['add'])){
        $user = $_POST['username'];
        mysqli_query($connection,"DELETE FROM users WHERE id ='".$_POST['id']."'");
        $query = "SELECT * FROM `users` WHERE username ='$user'";
        $add = "INSERT INTO `users`(`id`, `username`, `name`, `lastname`, `password`, `role`, `status`) VALUES ('". $_POST['id']."','". $_POST['username']."','". $_POST['name']."','". $_POST['lastname']."','". $_POST['password']."','admin','". $_POST['status']."')";
        mysqli_query($connection,$add);
        $noti = "Record Add Successfully";
        echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }

    if (isset($_POST['update'])) {

       $updatedata = "UPDATE `users` SET 

       `id`='".$_POST['id']."',

       `username`='".$_POST['username']."',

       `name`='".$_POST['name']."',

       `lastname`='".$_POST['lastname']."',

       `password`='".$_POST['password']."',

       `role`='admin',

       `status`='".$_POST['status']."'

       WHERE `id`= '".$_POST['id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       
       $noti = "Record Updated Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
    if (isset($_POST['delete_user'])) {

       $updatedata = "DELETE FROM users WHERE `id`= '".$_POST['id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       $noti = "User Inactive Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Exportable Table -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
	        <div class="header">
	            <h2>
	                Manage User
	            </h2>
	        </div>

	        <div class="body">
	            <!-- Nav tabs -->
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                 <div class="row clearfix">
	                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
	                        <a href="/Orphan/pages/admin/Users.php" data-toggle="tab">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation" class="active">
	                                    <div class="info-box bg-pink hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Admin</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                    $sql = "SELECT role, COUNT(*) AS COUNT FROM `users` WHERE `role`= 'admin'";
	                                                    $counts = mysqli_query($connection,$sql);
	                                                    $row = mysqli_fetch_assoc($counts);
	                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                        <a href="/Orphan/pages/admin/Foster.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-cyan hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Foster</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT role, COUNT(*) AS COUNT FROM `users` WHERE `role`= 'users'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                    </ul>
	                </div>
	            </div>
	        </div>
			<div class="row clearfix">
				  <div class="body">
			    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			        <div class="card">
			            <div class="header">
			                <h2>Admin</h2>
			            </div>

			            <div class="body">
			                <form id="form_validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			                    <div class="form-group form-float">
			                         <div class="form-line focused">
			                            <input type="text" class="form-control" name="id" value="<?php echo $_GET['id']; ?>" required>
			                            <label class="form-label">id</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="username" value="<?php echo $_GET['username']; ?>" required>
			                            <label class="form-label">username</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="name" value="<?php echo $_GET['name']; ?>" required>
			                            <label class="form-label">first name</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="lastname" value="<?php echo $_GET['lastname']; ?>" required>
			                            <label class="form-label">lastname</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-group">
                                    <input type="radio" name="status" value="inactive" id="Activation" class="with-gap">
                                    <label for="Activation">Deactivate</label>

                                    <input type="radio" name="status" value="active" id="Deactivation" class="with-gap">
                                    <label for="Deactivation" class="m-l-20">Activate</label>
                                </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" id="password"  value="<?php echo $_GET['password']; ?>" name="password" required>
			                            <label class="form-label">Password</label>
			                       </div>
			                   </div>
			                    <button type="button"  class="btn material-icons" onclick="myFunction()" >remove_red_eye</button>
			                        <button type="button" class="btn material-icons" onclick="GetRandom()" >autorenew</button>
			                                <script>
			                                    function myFunction() {
			                                          var x = document.getElementById("password");
			                                          if (x.type === "password") {
			                                            x.type = "text";
			                                          } else {
			                                            x.type = "password";
			                                          }
			                                       }
			                                       function GetRandom()
			                                        {
			                                            var myElement = document.getElementById("password");
			                                            myElement.value = Math.random().toString(36).slice(-8);
			                                        }
			                                </script>
			                    <input type="text" class="form-control invisible" name="role" value="Dean">
                                <button name="delete_user" class="btn btn-primary m-t-15 waves-effect" style="float: left;">Delete</button>
                                <button name="add" class="btn btn-primary m-t-15 waves-effect" style="float: right;">Add</button>
                                <center><button name="update" class="btn btn-primary m-t-15 waves-effect" >Update</button></center>
			               </form>
			           </div>
			       </div>
			   </div>
<!-- #END# Basic Validation -->
<?php  ?>

			    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

			            <div class="header">
			                <h2>
			                    EXPORTABLE TABLE
			                </h2>
			            </div>
			            <div class="body">
			                <div class="table-responsive">
			                	<?php 
			                        $id = $_SESSION['id'];
			                        $sql  = "SELECT * FROM users where role = 'admin'";
			                        $res = mysqli_query($connection,$sql);
			                        if(isset($_GET['delete'])){
			                            $del = $_GET['delete'];
			                            $insersession = "UPDATE `users` SET `status`='inactive' WHERE `id`= {$del}";
			                            $resultinsersession = mysqli_query($connection,$insersession);
			                            header("Location:/Orphan/pages/admin/Users.php");
			                        }
			                     ?>
			                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Password</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         while($row = mysqli_fetch_assoc($res)){
                                         ?>
                                        <tr> 
                                            <td><a href="/Orphan/pages/admin/Users.php?id=<?php  echo $row['id']; ?>&username=<?php  echo $row['username']; ?>&name=<?php  echo $row['name']; ?>&lastname=<?php  echo $row['lastname']; ?>&password=<?php  echo $row['password']; ?>"><?php  echo $row['id']; ?></a></td>
                                            <td><?php  echo $row['username']; ?></td>
                                            <td><?php  echo $row['name']; ?></td>
                                            <td><?php  echo $row['lastname']; ?></td>
                                            <td><?php  echo $row['password']; ?></td>
                                            <td><?php  echo $row['status']; ?></td>
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
	    </div>
	</div>
</div>
<!-- #END# Exportable Table -->

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";

?>
>>>>>>> b56f99e5208141e368d71c0794aae94dbb787796
