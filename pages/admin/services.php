

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

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->

<!--DateTime Picker -->
<?php 
$status_addition  = "SELECT * FROM services where `date`= '".$_POST['date']."'";
$res = mysqli_query($connection,$status_addition);
$row = mysqli_fetch_assoc($res);
if(isset($_POST['add'])){
    if($row['status'] < 10){
        if($row['date'] === $_POST['date']){
            $status = 1 + $row['status'];
            $sql  = "UPDATE `services` SET `status`= $status WHERE `date`= '".$_POST['date']."'";
            $res = mysqli_query($connection,$sql);
            $noti = "Record Add Successfully";
            echo '<p style="color:#2cb90a;">'.$noti.'</p>';
        }else{
            $add = "INSERT INTO `services`(`user_id`, `date`, `time`, `purposes`, `status`) VALUES (
                '". $_SESSION['id']."',
                '". $_POST['date']."',
                '".$_POST['time']."',
                '". $_POST['purposes']."','1')
                ";
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
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Schedule Visit
                </h2>
                    <div class="body">
                        <form id="form_validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="row clearfix">
                                <div class="col-xs-3">
                                    <h2 class="card-inside-title">Date of visit</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="text" name="date" class="form-control" placeholder="Please choose a date...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h2 class="card-inside-title">Time of visit (24 hour)</h2>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">access_time</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name= "time" class="form-control time24" placeholder="Ex: 23:59">
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-sm-2">
                                    <h2 class="card-inside-title">Purposes</h2>
                                    <select class="form-control show-tick" name="purposes">
                                        
                                        <option value="">-- Please select --</option>
                                        <option value="adoption">Adoption</option>
                                        <option value="visit">Visit</option>
                                    </select>
                                </div>
                                <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="submit" name="add" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            </div>
                        </form>

    

            <!-- TinyMCE -->
            <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Services
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="ckeditor">
                                
                            </textarea>
                        </div>

                    </div>
                </div>
            </div> -->
            <?php
                        $id = $_SESSION['id'];
                        $sql  = "SELECT * FROM `users` WHERE `user_id` = {$id}";
                        $res = mysqli_query($connection,$sql);
                        $row = mysqli_fetch_assoc($res);
                     ?> 
                     <?php 
                        while($row){
                     ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Booking Services
                                <small>Foster parents who submitted bookings</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table   id="example" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <th scope="row">1</th>
                                        <td><?php  echo $row['user_id']; ?></td>
                                        <td><?php  echo $row['name']; ?> <?php  echo $row['lastname']; ?></td>

                                        <td><?php  echo $row['status'] === 0 ? 'Pending' : 'Approved' ; ?></td>

                                        <td><i  class="material-icons" style="cursor:pointer;">mode_edit</i></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
           
<?php 
    $y = $_GET['y'] ?  $_GET['y'] : date('Y');
    $m = $_GET['m'] ?  $_GET['m'] : date('m');
    //months array just like Jan,Feb,Mar,Apr in short format
    $m_array = array('01'=>'Jan', '02'=>'Feb', '03'=>'Mar', '04'=>'Apr', '05'=>'May', '06'=>'Jun', '07'=>'Jul', '08'=>'Aug', '09'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header bg-blue-grey pager" >
        <h2>
            Date Visit Status
        </h2><br>
        <?php
               for ($i=$y; $i<=$y; $i++){
            ?>
                <li sytle ="border: 2px solid beige;"><?php  echo '<a href="services.php?y='.$i.'&m='.$m.'">'.$i.'</a>&nbsp&nbsp;'; ?></li>
            <?php
                }
            ?>
            <br>
            <?php
                foreach ($m_array as $key=>$val){
            ?>
                <li sytle ="border: 2px solid beige;"><?php echo '<a href="services.php?y='.$y.'&m='.$key.'">'.$val.'</a>'; ?></li>
            <?php
                }
            ?>
        </div>
        <?php
        $d_array = array('01'=>31, '02'=>28, '03'=>31, '04'=>30, '05'=>31, '06'=>30, '07'=>31, '08'=>31, '09'=>30, '10'=>31, '11'=>30, '12'=>31);
        $d_m = ($m==2 && $y%4==0)?29:$d_array[$m];
        ?>
        <div class="body">
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <tr>
                                <th><?php
                                    echo $m_array[$m].'&nbsp'.$y
                                ?></th>
                            </tr>
                            <?php
                            $days_array = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
                            foreach ($days_array as $key=>$val){
                            ?>
                            <th><?php
                            echo $val;
                            ?></th>
                            <?php
                             }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $date = $y.'-'.$m.'-01';
                        $Visitation  = "SELECT * FROM services where `user_id`= '".$_SESSION['id']."' ORDER BY `services`.`date` ASC";
                        $result = mysqli_query($connection,$Visitation);
                        
                        //find start day of the month
                        $startday = array_search(date('D',strtotime($date)), $days_array);
                        //daisplay month dates
                        for($i=0; $i<($d_m+$startday); $i++){
                            $day = ($i-$startday+1<=9)?'0'.($i-$startday+1):$i-$startday+1;
                            $date_validation = $m.'/'.$day.'/'.$y;
                            // if($rows['date'] === $date_validation){
                            //     $date_validation = 'display';
                            // }else{
                            //     $date_validation = '';
                            // }
                            echo ($i<$startday)?'<td></td>':'<td>'.$day.'</td>';
                            ?>
                            <?php
                            while($rows = mysqli_fetch_assoc($result)){
                                echo $rows['date'].'<br>';
                            }
                            ?>
                            <?php
                            echo ($i%7==0)?'</tr><tr>':''; 
                        }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php

?>
    </div>
</div>
 <!--#END# DateTime Picker -->


            <?php } ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";



?>

<!-- <script>
    table = $('#example').DataTable( {
    destroy: true,
} );

table.destroy();
</script> -->