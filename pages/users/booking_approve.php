l<?php 
$path = "C:/xampp/htdocs/orphan/pages";
include dirname($path) . '../pages/Calendar.php';
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
$status_addition  = "SELECT * FROM services where `date`= '".$_POST['date']."' ";
$res = mysqli_query($connection,$status_addition);
$row = mysqli_fetch_assoc($res);
if(isset($_POST['add'])){
    if($row['count_status'] < 10){
          $add = "INSERT INTO `services`(`user_id`, `date`, `purposes`, `status`) VALUES  (
				'".$_SESSION['id']."',
				'".$_POST['date']."',
				'".$_POST['purposes']."',
				'pending'
				)";
            mysqli_query($connection,$add);
            $noti = "Record Add Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        
    }else{
        $noti = "Visitation is fully loaded";
        echo '<p style="color:#2cb90a;">'.$noti.'</p>';
    }
}
?>
<?php
    if (isset($_POST['update'])) {
      $updatedata = "UPDATE `services` SET 
	   `id`='".$_POST['id']."',
	   `date`='".$_POST['date']."',
	   `purposes`='".$_POST['purposes']."',
	   `status`='".$_POST['status']."'
       WHERE `id`= '".$_POST['id']."'";
       mysqli_query($connection,$updatedata) or die(mysqli_error());
       
       $noti = "Record Updated Successfully";
       echo '<p style="color:#FF0000;">'.$noti.'</p>';
    }
    if (isset($_POST['delete_booking'])) {
       $updatedata = "DELETE FROM services WHERE `id`= '".$_POST['id']."'";
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
			                            <input type="text" class="form-control" name="date" id="datepicker" value="<?php echo $_GET['date']; ?>" required>
			                            <label class="form-label">Date</label>
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
			                    
                                </div>
                                <button style="padding:-20px" name='add' class="btn btn-block btn-lg btn-primary waves-effect">Add</button>
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
			                        $sql  = "SELECT * FROM services where `user_id` =  '".$_SESSION['id']."' ";
			                        $res = mysqli_query($connection,$sql);
			                     ?>
			                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
			                        <thead>
                                        <tr>
                                            <th>ID</th>
											<th>Date</th>
                                            <th>Purpose</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         while($row = mysqli_fetch_assoc($res)){
                                         ?>
                                        <tr> 
											<td><?php  echo $row['id']; ?></td>
											<td><?php  echo $row['date'] ?></td>
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
<?php 

	$calendar = new Calendar();
	
	$queryCalendar  = "SELECT * FROM services where `user_id` =  '".$_SESSION['id']."' ";
	$res = mysqli_query($connection,$queryCalendar);
	while($row = mysqli_fetch_assoc($res)){ 

		$original_date = $row['date'];
		$timestamp = strtotime($original_date);
		$new_date = date("Y-m-d", $timestamp);

		if($row['status'] == 'Approve'){
			$calendar->add_event('Approved', $new_date,1,'green');	
		}
		if($row['status'] == 'Cancelled'){
			$calendar->add_event('Cancelled', $new_date,1,'red');
		}
		if($row['status'] == 'Pending'){
			$calendar->add_event('Pending', $new_date,);
		}
	}

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="row clearfix">
		<div class="content home">
			<?=$calendar?>
		</div>
	</div>
</div>

<?
	
?>

<!-- #END# Exportable Table -->
<script>

$( function() {
    $( "#datepicker" ).datepicker({
		dateFormat: "yyyy-mm-dd"
	});
  } );


</script>



<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";

?>