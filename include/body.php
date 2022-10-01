<?php 
$id = $_SESSION['id'];
$sql  = "SELECT * FROM users WHERE id = {$id} ";
$res = mysqli_query($connection,$sql);

while($row = mysqli_fetch_assoc($res)){


?>
<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../images/<?php echo $row['image'];?>" width="48" height="48" alt="User" />
                    
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['name']," ",$row['lastname'];?></div>
                    <div class="email">ID NUMBER: <?php echo $row['id'];?></div>
                    <?php } ?>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="Profile.php"><i class="material-icons">person</i>Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                       <?php 
                            if ($_SESSION['role'] == 'admin' ) {
                        ?>
                        <li>
                            <a href="/orphan/pages/admin/Users.php">
                                <i class="material-icons">home</i>
                                <span>User Manager</span>
                            </a>
                        </li>
                        <?php 
                           }
                        ?>
                       <?php 
                            if ($_SESSION['role'] == 'admin' ) {
                        ?>
                        <li>
                            <a href="/orphan/pages/admin/services.php">
                                <i class="material-icons">home</i>
                                <span>Services</span>
                            </a>
                        </li>
                        <?php 
                           }
                        ?>
                       <?php 
                            if ($_SESSION['role'] == 'admin' ) {
                        ?>
                        <li>
                            <a href="/orphan/pages/dean/dean.php">
                                <i class="material-icons">home</i>
                                <span>Orphan</span>
                            </a>
                        </li>
                        <?php 
                           }
                        ?>
                        <?php 
                            if ($_SESSION['role'] == 'admin' ) {
                        ?>
                        <li>
                            <a href="/orphan/pages/dean/dean.php">
                                <i class="material-icons">home</i>
                                <span>Adopted</span>
                            </a>
                        </li>
                        <?php 
                           }
                        ?>
                        <?php 
                            if ($_SESSION['role'] == 'admin' ) {
                        ?>
                        <li>
                            <a href="/orphan/pages/dean/dean.php">
                                <i class="material-icons">home</i>
                                <span>About</span>
                            </a>
                        </li>
                        <?php 
                           }
                        ?>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
          <!--   <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div> -->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li class="pull-right" style="list-style: none; padding: 10px;"><a href="logout.php"> <button type="button" class="btn btn-danger waves-effect">Sign out</button></a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red">
                            <div class="red"></div>
                            <span style="letter-spacing:2px;"><b>Mission</b> <br><br>A leading green institution in higher and continuing education committed to engage in quality instruction, development-oriented research, sustainable lucrative economic enterprise, and responsive extension and training services through relevant academic programs to empower a human resource that responds effectively to challenges in life and act as catalyst in the holistic development of a humane society.</span><br>
                        </li>
                        <li data-theme="red">
                            <div class="red"></div>
                            <span style="letter-spacing: 2px;"><b>Vision</b> <br><br>GREEN CHMSC EXCELS <br>Excellence, Competence, and Educational Leadership in Science and Technology.</span><br>
                        </li>
                    </ul>
                </div>
                
            </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">