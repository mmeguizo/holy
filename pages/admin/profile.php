

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
<?php 
if (isset($_POST['update'])) {

   $updatedata = "UPDATE `users` SET 

   `id`='".$_POST['id']."',

   `username`='".$_POST['username']."',

   `name`='".$_POST['name']."',

   `lastname`='".$_POST['lastname']."',

   `password`='".$_POST['password']."',

   `role`= '".$_SESSION['role']."',

   `status`='".$_POST['status']."'

   WHERE `id`= '".$_POST['id']."'";
   mysqli_query($connection,$updatedata) or die(mysqli_error());
   
   $noti = "Record Updated Successfully";
   echo '<p style="color:#FF0000;">'.$noti.'</p>';
}
 ?>
<div class="col-xs-12 col-sm-12">
    <div class="card">
        <div class="body">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="panel panel-default panel-post">
                            <div class="panel-heading">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="../../images/user-lg.jpg" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">Marc K. Hammond</a>
                                        </h4>
                                        Shared publicly - 01 Oct 2018
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="post">
                                    <div class="post-heading">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="post-content">
                                        <iframe width="100%" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">thumb_up</i>
                                            <span>125 Likes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">comment</i>
                                            <span>8 Comments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="material-icons">share</i>
                                            <span>Share</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Type a comment" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $id = $_SESSION['id'];
                        $sql  = "SELECT * FROM users WHERE `id`= {$id}";
                        $res = mysqli_query($connection,$sql);
                     ?>
                     <?php 
                        while($row = mysqli_fetch_assoc($res)){
                     ?>
                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                        <div class="col-xs-12 col-sm-12">
                            <div class="card profile-card">
                                <div class="profile-header">&nbsp;</div>
                                <div class="profile-body">
                                    <div class="image-area">
                                        <img src="../../images/user-lg.jpg" alt="AdminBSB - Profile Image" />
                                    </div>
                                    <div class="content-area">
                                        <h3><?php  echo $row['name']; ?> <?php  echo $row['lastname']; ?></h3>
                                        <p><?php  echo $row['email']; ?></p>
                                        <p><?php  echo ucfirst($row['role']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="FirstName" class="col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="FirstName" name="NameSurname" placeholder="FirstName" value="<?php  echo $row['name']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="LastName" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="lastname" name="NameSurname" placeholder="lastname" value="<?php  echo $row['lastname']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="UserName" class="col-sm-2 control-label">User Name</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="UserName" name="NameSurname" placeholder="UserName" value="<?php  echo $row['username']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="Email" name="NameSurname" placeholder="Email" value="<?php  echo $row['email']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="Password" name="NameSurname" placeholder="Password" value="<?php  echo $row['password']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="update" class="btn btn-danger">Update</button>
                                </div>
                            </div>
                        </form>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";

?>