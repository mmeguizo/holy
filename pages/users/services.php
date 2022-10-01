

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
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATETIME PICKER
                </h2>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <h2 class="card-inside-title">Vist Date Calendar</h2>
                                        <input type="text" class="datepicker form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <h2 class="card-inside-title">Vist Time Calendar</h2>
                                        <input type="text" class="timepicker form-control" placeholder="Please choose a time...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <h2 class="card-inside-title">Purposes</h2>
                                <select class="form-control show-tick">
                                    
                                    <option value="">-- Please select --</option>
                                    <option value="adoption">Adoption</option>
                                    <option value="visit">Visit</option>
                                </select>
                            </div>
                            <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" name="add" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
<?php 
    $y = $_GET['y'] ?  $_GET['y'] : date('Y');
    $m = $_GET['m'] ?  $_GET['m'] : date('m');
    //display 5 next and 5 previous years of selected year
    for ($i=$y-5; $i<=$y+5; $i++){
        echo '<a href="index.php?y='.$i.'&m='.$m.'">'.$i.'</a>&nbsp&nbsp;';  
    }
    echo "<br><br>";

    //months array just like Jan,Feb,Mar,Apr in short format
    $m_array = array('1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
?>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="header bg-blue-grey">
            <h2>
                Blue Grey - Title <small>Description text here...</small>
            </h2>
        </div>
        <div class="body">
            <h2 class="card-inside-title">Purposes</h2>
            <select class="form-control show-tick">
                <option value="">-- Please select --</option>
                <?php foreach ($m_array as $key=>$val){?>
                <option value="<?php  echo '<a href="services.php?y='.$y.'&m='.$key.'">'.$val.'</a>';?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<?php
    //display months
    foreach ($m_array as $key=>$val){
        echo '<a href="services.php?y='.$y.'&m='.$key.'">'.$val.'</a>&nbsp&nbsp;';      
    }
    echo "<br><br>";

    $d_array = array('1'=>31, '2'=>28, '3'=>31, '4'=>30, '5'=>31, '6'=>30, '7'=>31, '8'=>31, '9'=>30, '10'=>31, '11'=>30, '12'=>31);
    $d_m = ($m==2 && $y%4==0)?29:$d_array[$m];
    echo '<table><tr><th colspan="7">'.$m_array[$m].'&nbsp'.$y.'</th></tr><tr>';
    //days array
    $days_array = array('1'=>'Mon', '2'=>'Tue', '3'=>'Wed', '4'=>'Thu', '5'=>'Fri', '6'=>'Sat', '7'=>'Sun');
    //display days
    foreach ($days_array as $key=>$val){
        echo '<th>'.$val.'</th>';      
    }
    echo "</tr></tr>";
    $date = $y.'-'.$m.'-01';
    //find start day of the month
    $startday = array_search(date('D',strtotime($date)), $days_array);
    //daisplay month dates
    for($i=0; $i<($d_m+$startday); $i++){
        $day = ($i-$startday+1<=9)?'0'.($i-$startday+1):$i-$startday+1;
        echo ($i<$startday)?'<td></td>':'<td>'.$day.'</td>';
        echo ($i%7==0)?'</tr><tr>':''; 
    }
    //calculate next & prev month
    $next_y=(($m+1)>12)?($y+1):$y;
    $next_m=(($m+1)>12)?1:($m+1);
    $prev_y=(($m-1)<=0)?($y-1):$y;
    $prev_m=(($m-1)<=0)?12:($m-1);
    //daisplay next prev
    echo '<tr><td><a href="services.php?y='.$prev_y.'&m='.$prev_m.'">Prev</a></td><td></td><td></td><td></td><td></td><td></td><td><a href="services.php?y='.$next_y.'&m='.$next_m.'">Next</a></td></tr>';
?>
    </div>
 
</div>
 <!--#END# DateTime Picker -->

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";

?>