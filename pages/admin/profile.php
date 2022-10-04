
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
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

<<<<<<< HEAD
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home"> 
                                        <div class="card profile-card">
                                            <div class="profile-header">&nbsp;</div>
                                            <div class="profile-body">
                                                <div class="image-area">
                                                    <img src="../../images/<?php echo $row['image'];?>"  width="200" height="200" alt="AdminBSB - Profile Image" />
                                                </div>
                                                <div class="content-area">
                                                    <h3><?php echo $row['name']," ",$row['lastname']; ?></h3>
                                                    
                                                    <p><?php echo $row['role'];?></p>
                                                </div>
                                            </div>
                                            <div class="profile-footer">

                                                <ul>
                                                    <li>
                                                        <span>Username</span>
                                                        <span><?php echo $row['username'];?></span>
                                                    </li>
                                                    <li>
                                                        <span>Name</span>
                                                        <span><?php echo $row['name'];?></span>
                                                    </li>
                                                    <li>
                                                        <span>Last Name</span>
                                                        <span><?php echo $row['lastname'];?></span>
                                                    </li>
                                                    <li>
                                                        <span>Role</span>
                                                        <span><?php echo $row['role'];?></span>
                                                    </li>
                                                    <li>
                                                        <span>status</span>
                                                        <span><?php echo $row['status'];?></span>
                                                    </li>
                                                </ul>
                                              <?php } ?>
                                            </div>
                                        </div>
                                    </div>
 <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
    <?php
        $status = "";
        if(isset($_POST['add'])){
        // $update ="INSERT INTO `users`(`id`, `username`, `name`, `lastname`, `password`, `role`, `status`) VALUES ('". $_POST['ID']."','". $_POST['Username']."','". $_POST['Name']."','". $_POST['Lastname']."','". $_POST['Password']."','". $_POST['role']."','". $_POST['Status']."')";

        $post_image         = $_FILES['image']['name'];
        $post_image_tmp     = $_FILES['image']['tmp_name'];

        move_uploaded_file($post_image_tmp, "../../images/$post_image");
        if (empty($post_image)) {

                    $query = "SELECT * FROM users WHERE username = '{$_SESSION['image']}' ";

                    $results = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($results)) {

                        $post_image = $row['image'];
                    }

                    $post_image = $row['image'];
                    
                }else {

                    $row['image'] = $post_image;
                }   


        $id=$_SESSION['id'];
        $update ="UPDATE `users` SET username='".$_POST['username']."', name='".$_POST['name']."', lastname='".$_POST['lastname']."', password='".$_POST['password']."', image='".$post_image."'  where id='".$id."'";

        header("Location:/Orphan/pages/admin/profile.php");
        mysqli_query($connection,$update) or die(mysqli_error());
        $status = "Record add Successfully. </br>";
        echo '<center><p style="color:#FF0000;">'.$status.'</p><center>';

}
?>

<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
 <!-- ------------------------------------------------------------------------------------------------------------------------------- -->
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                        <?php 
                                            $id = $_SESSION['id'];
                                            $sql  = "SELECT * FROM users WHERE id = {$id} ";
                                            $res = mysqli_query($connection,$sql);
                            
                                            while($row = mysqli_fetch_assoc($res)){
                                         

                                         ?>
                                            <div class="body">
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="email_address_2">username</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="username" class="form-control" name="username" placeholder="" value="<?= $row['username'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="email_address_2">First Name</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text"class="form-control" name="name" placeholder="" value="<?= $row['name'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="email_address_2">Last Name</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text"class="form-control" name="lastname" placeholder="" value="<?= $row['lastname'] ?>">
                                                                    <input type="hidden"class="form-control" name="role" placeholder="" value="<?= $row['role'] ?>">
                                                                    <input type="hidden"class="form-control" name="status" placeholder="" value="<?= $row['status'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 form-control-label">
                                                            <label for="password_2">Password</label>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="password" id="password_2" name="password" class="form-control" placeholder="" value="<?= $row['password'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <i class="material-icons" onclick="myFunction()" >remove_red_eye</i>
                                                            <script>
                                                                function myFunction() {
                                                                      var x = document.getElementById("password_2");
                                                                      if (x.type === "password") {
                                                                        x.type = "text";
                                                                      } else {
                                                                        x.type = "password";
                                                                      }
                                                                    }
                                                            </script>
                                                        </div> 
                                                    </div>
                                                   
                                                    <div class="row clearfix">
                                                        <div class="form-group">
                                                          <label for="post_image">Image</label> <br>
                                                          <img src="../../images/<?= $row['image'] ?>" id="blah" width=100>
                                                          <!-- <input type="file"  name="image"> -->
                                                          <input type="file" name="image"  onchange="readURL(this);"  >
                                                        </div> 
                                                    </div>                                              
                                                    <div class="row clearfix">
                                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                            <button type="submit" name="add" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                    <?php } ?>
                                            </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
=======
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Type a comment" />
>>>>>>> 5f3d070597dd2e04f3e1d50b18299acbd89c5bec
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
?>