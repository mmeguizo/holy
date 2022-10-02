

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
            <div class="row clearfix">
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
            </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
//include "admin_includes/header.php";
include dirname($path) . "../include/footer.php";

?>