<?php 
    include('db.php');

//"DELETE FROM services WHERE `id`= '".$_POST['id']."'";

    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($connection,$_POST['id']);
    }

    $delete =  mysqli_query($connection ,"DELETE FROM services WHERE `id`= '".$id."'");

    if($delete){
        echo "success delete";
        exit;
    }else{
        echo "error delete";
        exit;
    }





 ?>