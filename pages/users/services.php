
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
$status_addition  = "SELECT * FROM services where `date`= '".$_POST['date']."'";
$res = mysqli_query($connection,$status_addition);
$row = mysqli_fetch_assoc($res);
if(isset($_POST['add'])){
    if($row['count_status'] < 10){
        if($row['date'] === $_POST['date']){
            $status = 1 + $row['count_status'];
            $sql  = "UPDATE `services` SET `count_status`= $status WHERE `date`= '".$_POST['date']."'";
            $res = mysqli_query($connection,$sql);
            $noti = "Record Add 1 Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }else{
          $add = "INSERT INTO `services`(`user_id`, `name`, `lastname`, `date`, `time`, `purposes`, `count_status`, `status`) VALUES  (
				'".$_POST['user_id']."',
				'".$_POST['name']."',
				'".$_POST['lastname']."',
				'".$_POST['date']."',
				'".$_POST['time']."',
				'".$_POST['purposes']."',
				'1',
				'".$_POST['status']."'
				)";
            mysqli_query($connection,$add);
            $noti = "Record Add Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }
    }else{
        $noti = "Visitation is fully loaded";
        echo '<p style="color:#2cb90a;">'.$noti.'</p>';
    }
}
?>
<?php
    if (isset($_POST['update'])) {
      $updatedata = "UPDATE `services` SET 
	   `user_id`='".$_POST['user_id']."',
	   `name`='".$_POST['name']."',
	   `lastname`='".$_POST['lastname']."',
	   `date`='".$_POST['date']."',
	   `time`='".$_POST['time']."',
	   `purposes`='".$_POST['purposes']."',
	   `count_status`='".$_POST['count_status']."',
	   `status`='".$_POST['status']."'
       WHERE `user_id`= '".$_POST['user_id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       
       $noti = "Record Updated Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
    if (isset($_POST['delete_user'])) {
       $updatedata = "DELETE FROM services WHERE `user_id`= '".$_POST['user_id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       $noti = "Booking has been deleted";
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
	                Booking management
	            </h2>
	        </div>

	        <div class="body">
	            <!-- Nav tabs -->
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                 <div class="row clearfix">
	                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
	                        <a href="/orphan/pages/admin/booking_approve.php" data-toggle="tab">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation" class="active">
	                                    <div class="info-box bg-light-green hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Approve</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                    $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Approve'";
	                                                    $counts = mysqli_query($connection,$sql);
	                                                    $row = mysqli_fetch_assoc($counts);
	                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                        <a href="/orphan/pages/admin/booking_pending.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-cyan hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Pending</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Pending'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
                            <a href="/orphan/pages/admin/booking_cancelled.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-deep-orange hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Cancelled</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Cancelled'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
                            <a href="/orphan/pages/admin/booking_history.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-blue-grey hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Visit History</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services`";
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
			                <h2>Approve booking</h2>
			            </div>

			            <div class="body">
			                <form id="form_validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			                    <div class="form-group form-float">
			                         <div class="form-line focused">
			                            <input type="text" class="form-control" name="user_id" value="<?php echo $_GET['id']; ?>" required>
			                            <label class="form-label">id</label>
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
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="date" value="<?php echo $_GET['date']; ?>" required>
			                            <label class="form-label">Date</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="time" value="<?php echo $_GET['time']; ?>" required>
			                            <label class="form-label">Time</label>
			                        </div>
			                    </div>
                                <div class="form-group form-float">
                                <label class="form-label">Visit Purposes</label>
			                        <div class="form-line focused">
                                    <select class="form-control show-tick" name="purposes">
                                        <option value="">-- Purposes --</option>
                                        <option value="adoption">Adoption</option>
                                        <option value="visit">Visit</option>
                                    </select>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
                                <label class="form-label">Status</label>
			                        <div class="form-group">
                                    <input type="radio" name="status" value="Approve" id="Approve" class="with-gap">
                                    <label for="Approve">Approve</label>

                                    <input type="radio" name="status" value="Pending" id="Pending" class="with-gap">
                                    <label for="Pending" class="m-l-20">Pending</label>

                                    <input type="radio" name="status" value="Cancelled" id="Cancelled" class="with-gap">
                                    <label for="Cancelled" class="m-l-20">Cancelled</label>
                                </div>
			                    
                                </div>
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
			                        $sql  = "SELECT * FROM services where `status` = 'approve'";
			                        $res = mysqli_query($connection,$sql);
			                     ?>
			                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Lastname</th>
											<th>Date</th>
                                            <th>Time</th>
                                            <th>Purpose</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         while($row = mysqli_fetch_assoc($res)){
                                         ?>
                                        <tr> 
                                            <td><a href="/orphan/pages/admin/booking_approve.php?id=<?php  echo $row['user_id']; ?>&username=<?php  echo $row['username']; ?>&name=<?php  echo $row['name']; ?>&lastname=<?php  echo $row['lastname']; ?>&date=<?php  echo $row['date']; ?>&time=<?php  echo $row['time']; ?>&purposes=<?php  echo $row['purposes']; ?>"><?php  echo $row['user_id']; ?></a></td>
                                            <td><?php  echo $row['name']; ?></td>
                                            <td><?php  echo $row['lastname']; ?></td>
											<td><?php  echo $row['date']; ?></td>
                                            <td><?php  echo $row['time']; ?></td>
                                            <td><?php  echo $row['purposes']; ?></td>
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
$status_addition  = "SELECT * FROM services where `date`= '".$_POST['date']."'";
$res = mysqli_query($connection,$status_addition);
$row = mysqli_fetch_assoc($res);
if(isset($_POST['add'])){
    if($row['count_status'] < 10){
        if($row['date'] === $_POST['date']){
            $status = 1 + $row['count_status'];
            $sql  = "UPDATE `services` SET `count_status`= $status WHERE `date`= '".$_POST['date']."'";
            $res = mysqli_query($connection,$sql);
            $noti = "Record Add 1 Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }else{
          $add = "INSERT INTO `services`(`user_id`, `name`, `lastname`, `date`, `time`, `purposes`, `count_status`, `status`) VALUES  (
				'".$_POST['user_id']."',
				'".$_POST['name']."',
				'".$_POST['lastname']."',
				'".$_POST['date']."',
				'".$_POST['time']."',
				'".$_POST['purposes']."',
				'1',
				'".$_POST['status']."'
				)";
            mysqli_query($connection,$add);
            $noti = "Record Add Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }
    }else{
        $noti = "Visitation is fully loaded";
        echo '<p style="color:#2cb90a;">'.$noti.'</p>';
    }
}
?>
<?php
    if (isset($_POST['update'])) {
      $updatedata = "UPDATE `services` SET 
	   `user_id`='".$_POST['user_id']."',
	   `name`='".$_POST['name']."',
	   `lastname`='".$_POST['lastname']."',
	   `date`='".$_POST['date']."',
	   `time`='".$_POST['time']."',
	   `purposes`='".$_POST['purposes']."',
	   `count_status`='".$_POST['count_status']."',
	   `status`='".$_POST['status']."'
       WHERE `user_id`= '".$_POST['user_id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       
       $noti = "Record Updated Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
    if (isset($_POST['delete_user'])) {
       $updatedata = "DELETE FROM services WHERE `user_id`= '".$_POST['user_id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       $noti = "Booking has been deleted";
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
	                Booking management
	            </h2>
	        </div>

	        <div class="body">
	            <!-- Nav tabs -->
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                 <div class="row clearfix">
	                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
	                        <a href="/orphan/pages/admin/booking_approve.php" data-toggle="tab">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation" class="active">
	                                    <div class="info-box bg-light-green hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Approve</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                    $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Approve'";
	                                                    $counts = mysqli_query($connection,$sql);
	                                                    $row = mysqli_fetch_assoc($counts);
	                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
	                        <a href="/orphan/pages/admin/booking_pending.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-cyan hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Pending</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Pending'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
                            <a href="/orphan/pages/admin/booking_cancelled.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-deep-orange hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Cancelled</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services` WHERE `status`= 'Cancelled'";
                                                    $counts = mysqli_query($connection,$sql);
                                                    $row = mysqli_fetch_assoc($counts);
                                                    echo $row['COUNT'];?>" data-speed="1000" data-fresh-interval="20">
	                                            </div>
	                                        </div>
	                                    </div>
	                                </li>
	                            </div>
	                        </a>
                            <a href="/orphan/pages/admin/booking_history.php">
	                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                                <li role="presentation">
	                                    <div class="info-box bg-blue-grey hover-expand-effect">
	                                        <div class="icon ">
	                                            <i class="material-icons">face</i>
	                                        </div>
	                                        <div class="content">
	                                            <div class="text">Visit History</div>
	                                            <div class="number count-to" data-from="0" data-to="<?php 
	                                                $sql = "SELECT status, COUNT(*) AS COUNT FROM `services`";
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
			                <h2>Approve booking</h2>
			            </div>

			            <div class="body">
			                <form id="form_validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			                    <div class="form-group form-float">
			                         <div class="form-line focused">
			                            <input type="text" class="form-control" name="user_id" value="<?php echo $_GET['id']; ?>" required>
			                            <label class="form-label">id</label>
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
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="date" value="<?php echo $_GET['date']; ?>" required>
			                            <label class="form-label">Date</label>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
			                        <div class="form-line focused">
			                            <input type="text" class="form-control" name="time" value="<?php echo $_GET['time']; ?>" required>
			                            <label class="form-label">Time</label>
			                        </div>
			                    </div>
                                <div class="form-group form-float">
                                <label class="form-label">Visit Purposes</label>
			                        <div class="form-line focused">
                                    <select class="form-control show-tick" name="purposes">
                                        <option value="">-- Purposes --</option>
                                        <option value="adoption">Adoption</option>
                                        <option value="visit">Visit</option>
                                    </select>
			                        </div>
			                    </div>
			                    <div class="form-group form-float">
                                <label class="form-label">Status</label>
			                        <div class="form-group">
                                    <input type="radio" name="status" value="Approve" id="Approve" class="with-gap">
                                    <label for="Approve">Approve</label>

                                    <input type="radio" name="status" value="Pending" id="Pending" class="with-gap">
                                    <label for="Pending" class="m-l-20">Pending</label>

                                    <input type="radio" name="status" value="Cancelled" id="Cancelled" class="with-gap">
                                    <label for="Cancelled" class="m-l-20">Cancelled</label>
                                </div>
			                    
                                </div>
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
			                        $sql  = "SELECT * FROM services where `status` = 'approve'";
			                        $res = mysqli_query($connection,$sql);
			                     ?>
			                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Lastname</th>
											<th>Date</th>
                                            <th>Time</th>
                                            <th>Purpose</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         while($row = mysqli_fetch_assoc($res)){
                                         ?>
                                        <tr> 
                                            <td><a href="/orphan/pages/admin/booking_approve.php?id=<?php  echo $row['user_id']; ?>&username=<?php  echo $row['username']; ?>&name=<?php  echo $row['name']; ?>&lastname=<?php  echo $row['lastname']; ?>&date=<?php  echo $row['date']; ?>&time=<?php  echo $row['time']; ?>&purposes=<?php  echo $row['purposes']; ?>"><?php  echo $row['user_id']; ?></a></td>
                                            <td><?php  echo $row['name']; ?></td>
                                            <td><?php  echo $row['lastname']; ?></td>
											<td><?php  echo $row['date']; ?></td>
                                            <td><?php  echo $row['time']; ?></td>
                                            <td><?php  echo $row['purposes']; ?></td>
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

>>>>>>> 4ac3eb39f66cd12bd537b7fd1eeb5ae2bf0e397c
?>