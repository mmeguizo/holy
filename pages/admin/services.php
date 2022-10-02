

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